<?php

namespace Admin\Controller;
use Think\Controller;

/**
 * 管理员登陆验证
 * @author jmjoy
 *
 */
class CommonController extends Controller {

    /**
     * 不需要管理员权限的方法
     */
    protected $passerList = array(
        // 登陆页面显示
        '/Admin/Index/index',
    );

    /**
     * 判断管理员有没有登录
     */
    public function _initialize() {
        if (in_array(__ACTION__, $this->passerList)) {
            return;
        }
        if (!isset($_SESSION['admin']['id'])) {
            // 没有登录则跳转到登录页面
            $this->redirect('index');
            die();
        }
    }

}
