<?php

namespace Api\Controller;
use Think\Controller;

class CommonController extends Controller {

    /**
     * get为前缀的方法直接get请求，post为前缀的方法只接受post请求
     */
    public function _initialize() {
        // 判断是get还是post方法
        if (strpos(ACTION_NAME, 'get') === 0) {
            // 是get方法
            if (!IS_GET) {
                $this->ajaxReturn(array(
                    'status'    =>  400,
                    'msg'       =>  '不是GET请求',
                ));
            }

        } else if (strpos(ACTION_NAME, 'post') === 0) {
            // 是post方法
            if (!IS_POST) {
                $this->ajaxReturn(array(
                        'status'    =>  400,
                        'msg'       =>  '不是POST请求',
                ));
            }

        } else {
            // 都不是
            $this->ajaxReturn(array(
                    'status'    =>  400,
                    'msg'       =>  '不是有效请求',
            ));
        }
    }

    /**
     * 简单返回接口数据，理论上只能用于修改操作之后响应是否成功
     * @param bool|string $result
     * @param number $code
     */
    protected function simpleAjaxReturn($result, $code = 400) {
        // 失败
        if ($result !== true) {
            $this->ajaxReturn(array(
                'status'    =>  400,
                'msg'       =>  $result,
            ));
        }

        // 成功
        $this->ajaxReturn(array(
                "status"    =>  200,
        ));
    }

}
