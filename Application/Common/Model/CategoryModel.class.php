<?php

namespace Common\Model;
use Common\Model\CommonModel;

class CategoryModel extends CommonModel {

    /**
     * 验证规则
     */
    public $validateRules = array(
        'name'      =>  array('name', '/^.{2,8}$/u', '分类名称必须为2～8个字符！', 1, 'regex'),
        'remark'    =>  array('remark', '/^[\s\S]{0,255}$/', '分类描述应该少于255个字符', 1, 'regex'),
        'parent_id' =>  array('parent_id', '/^\d+$/', '分类的上一级id必须为数字', 1, 'regex'),
    );

    public function editOneLevelCategory($inputs, $files) {
        $rules = array(
            $this->validateRules['name'],
            $this->validateRules['remark'],
        );

        // 验证输入
        if (!$this->validate($rules)->create($inputs)) {
            return $this->getError();
        }

        // 插入操作或者更新操作需要修改logo图片时，检验图片合法性
        if (empty($inputs['id']) || isset($files['logo'])) {
            list($filepath, $err) = \Util\Upload::handleImgUpload(
                $files['logo'], 2*1024*1024, UPLOAD_PATH.'category/', array(100, 100)
            );

            if ($err !== null) {
                return $err;
            }

            $this->pic_path = $filepath;
        }

        if (empty($inputs['id'])) {
            // 插入操作
            $result = $this->add();
        } else {
            // 更新操作
            $result = $this->save();
        }

        if ($result === false) {
            return '数据库出错';
        }

        return true;
    }

    /**
     * 处理新增或更新分类的操作
     */
    public function handleUpsert() {
        // 验证输入
        if (!$this->validate($this->validateRules)->create($args)) {
            return $this->getError();
        }

        // 组装数据
        $this->data([
            'name'      =>  $name,
            'remark'    =>  $remark,
            'parent_id' =>  $parent_id,
        ]);

        // 新增操作
        if (id === null) {
            $result = $this->add();

            if ($result === false) {
                return $this->getDbError();
            }

            return intval($result);
        }

        // 更新操作
        $result = $this->where('id = %d', $id)->save();

        if ($result === false) {
            return $this->getDbError();
        }

        return intval($id);
    }

}
