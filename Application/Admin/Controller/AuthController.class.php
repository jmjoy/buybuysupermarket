<?php

namespace Admin\Controller;
use Admin\Controller\CommonController;

/**
 * 管理员登陆验证控制器
 * @author jmjoy
 *
 */
class AuthController extends CommonController {

    /**
     * 判断管理员有没有登录
     */
    public function _initialize() {
        parent::_initialize();
        if (!session('admin')['id']) {
            die('Access deny!');
        }
    }

}
