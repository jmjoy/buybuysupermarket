<?php

namespace Common\Model;
use Common\Model\CommonModel;

/**
 * 收货地址模型
 * @author JM_Joy
 */
class AddressModel extends CommonModel {

    /**
     * 验证规则
     */
    public $validateRules = [
        'area_id'   =>  ['area_id', '/^\d+$/', '地区的id必须为数字', 1, 'regex'],
        'detail'    =>  ['detail', '/^[\-\w\x{4e00}-\x{9fa5}]{5,64}$/u', '详细地址应该为5~64个中英文或数字字符', 1, 'regex'],
    ];

    /**
     * 根据某个人的id列出他的收货地址信息
     */
    public function handleList($uid, $nowPage, $perPage) {
        $result = $this->field(true)
                       ->where('uid = %d and is_del = 0', $uid)
                       ->page($nowPage, $perPage)
                       ->order('id desc')
                       ->select();

        if ($result === false) {
            return $this->getDbError();
        }

        //没有找到数据
        if ($result === null) {
            return [];
        }

        return $result;
    }

    /**
     * 处理插入或者更新收货地址的操作
     */
    public function handleUpsert($id, $uid, $area_id, $detail) {
        $args = [
            'detail'    =>  $detail,
        ];

        // 验证规则
        $rules = [
            $this->validateRules['detail'],
        ];

        if (!$this->validate($rules)->create($args)) {
            return $this->getError();
        }

        $result = D('Common/Area')->getThreeLevel($area_id);

        // 获取失败
        if (!is_array($result)) {
            return $result;
        }

        // 需要插入的数据
        $data = [
            'uid'           =>  $uid,
            'detail'        =>  $detail,
            'province_id'   =>  $result['province_id'],
            'province_name' =>  $result['province_name'],
            'city_id'       =>  $result['city_id'],
            'city_name'     =>  $result['city_name'],
            'area_id'       =>  $result['area_id'],
            'area_name'     =>  $result['area_name'],
        ];

        $this->data($data);

        // 判断是插入还是更新
        if ($id === null) { // 这是插入操作

            $result = $this->add();

            if ($result === false) {
                return $this->getDbError();
            }

            $id = $result;

        } else { // 这是更新操作

            // 判断收货地址是不是他的
            if (!$this->isMe()) {
                return '这条收货地址不是您的';
            }

            $result = $this->where('id = %d', $id)->save();

            if ($result === false) {
                return $this->getDbError();
            }

        }

        // 成功返回收货地址的id
        return intval($id);
    }

    /**
     * 处理删除收货地址的请求（其实是把is_del字段设为1）
     */
    public function handleDelete($id, $uid) {
        // 判断收货地址是不是他的
        if (!$this->isMe()) {
            return '这条收货地址不是您的';
        }

        $result = $this->where('id = %d', $id)->setField('is_del', 1);

        if ($result === false) {
            return $this->getDbError();
        }

        return true;
    }

    /**
     * 判断某一条收货地址信息是不是属于某个人的
     */
    protected function isMine($id, $uid) {
        // 获取数据库里面这条收货地址的主人的id
        $correctUid = $this->where('id = %d', $id)->getField('uid');

        return ($uid == $correctUid);
    }

}
