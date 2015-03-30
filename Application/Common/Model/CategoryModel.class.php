<?php

namespace Common\Model;
use Common\Model\CommonModel;

class CategoryModel extends CommonModel {

    /**
     * 验证规则
     */
    public $validateRules = [
        'name'      =>  ['name', '/^.{2,8}$/u', '分类名称必须为2～8个字符！', 1, 'regex'],
        'remark'    =>  ['remark', '/^[\s\S]{0,255}$/', '分类描述应该为0～255个字符', 1, 'regex'],
        'parent_id' =>  ['parent_id', '/^\d+$/', '分类的父类id必须为数字', 1, 'regex'],
    ];

    /**
     * 处理新增或更新分类的操作
     */
    public function handleUpsert($id, $name, $remark, $parent_id) {
        // 验证
        $args = [
            'name'      =>  $name,
            'remark'    =>  $remark,
            'parent_id' =>  $parent_id,
        ];

        $rules = [
            $this->validateRules['name'],
            $this->validateRules['remark'],
            $this->validateRules['parent_id'],
        ];

        if (!$this->validate($rules)->create($args)) {
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
