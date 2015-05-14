<?php

namespace Admin\Controller;
use Admin\Controller\CommonController;

/**
 * 管理员登陆验证控制器
 * @author jmjoy
 *
 */
class AdminAuthController extends CommonController {

    /**
     * 判断管理员有没有登录
     */
    public function _initialize() {
        if (!isset($_SESSION['admin']['id'])) {
            // 没有登录则跳转到登录页面
            $this->redirect('Index/index');
            die();
        }
    }

}
