<?php

namespace Api\Controller;
use Api\Controller\CommonController;

class UserAuthController extends CommonController {

    /**
     * 初始方法
     */
    public function _initialize() {
        //  判断用户有没有登陆
        if (!session('?user')) {
            $this->ajaxReturn([
                'status'    =>  403,
                'msg'       =>  '用户还没有登陆',
            ]);

            // 终止程序执行，其实上面的ajaxReturn函数就内含die了
            die();
        }
    }

    /**
     * 处理注销请求
     */
    public function postHandleSignOut() {
        // 删除用户的session
        session('user', null);

        return $this->ajaxReturn([
            'status'    =>  200,
        ]);
    }

}
