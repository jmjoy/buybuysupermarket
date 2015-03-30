<?php

namespace Common\Model;
use Common\Model\CommonModel;

/**
 * 地区的模型
 * @author JM_Joy
 */
class AreaModel extends CommonModel {

    /**
     * 验证规则
     */
    public $validateRules = [
        'area_id'     =>  ['area_id', '/^\d+$/', '地区的id必须为数字', 1, 'regex'],
    ];

    /**
     * 返回省市区三级地区的信息，根据区的id
     */
    public function getThreeLevel($area_id) {
        // 检验地区的id
        $args = [
            'area_id'   =>  $area_id,
        ];

        // 验证规则
        $rules = [
            $this->validateRules['area_id'],
        ];

        if (!$this->validate($rules)->create($args)) {
            return $this->getError();
        }

        // 要获取的字段
        $this->field([
            'province.id province_id',
            'province.name province_name',

            'city.id city_id',
            'city.name city_name',

            'area.id area_id',
            'area.name area_name',
        ]);

        $row = $this->alias('area')
                    ->join('__AREA__ city on city.id = area.parent_id')
                    ->join('__AREA__ province on province.id = city.parent_id')
                    ->where('area.id = %d', $area_id)
                    ->find();

        if ($row === false) {
            return $this->getDbError();
        }

        if ($row === null) {
            return '地区id不正确';
        }

        // 成功返回
        return $row;
    }

}
