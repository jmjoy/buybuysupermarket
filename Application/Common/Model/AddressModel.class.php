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
        'area_id'     =>  ['area_id', '/^\d+$/', '地区的id必须为数字', 1, 'regex'],
        'detail'        =>  ['detail', '/^[\-\w\x{4e00}-\x{9fa5}]{5,64}$/u', '详细地址应该为5~64个中英文或数字字符', 1, 'regex'],
    ];

    /**
     * 处理插入或者更新收货地址的操作
     */
    public function handleUpsert($uid, $area_id, $detail) {
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

        // 组装replace语句
        $fields = '(`uid`, `detail`, `province_id`, `province_name`, `city_id`, `city_name`, `area_id`, `area_name`)';
        $sql = 'REPLACE INTO __AREA__ ' . $fields . ' VALUES (%d, %d, "%s", %d, "%s", %d, "%s", "%s")';
        $sql = sprintf($sql, $uid, $detail,
            $result['province_id'], $result['province_name'],
            $result['city_id'], $result['city_name'],
            $result['area_id'], $result['area_name']
        );

        $result = $this->execute($sql);

        if ($result === false) {
            return $result;
        }

        return true;
    }

}
