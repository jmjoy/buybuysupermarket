<?php

namespace Admin\Controller;
use Admin\Controller\CommonController;

/**
 * 管理员登陆验证
 * @author jmjoy
 *
 */
class IndexController extends CommonController {

    /**
     * 管理员登录页面
     */
    public function index() {
        // 已经登录了就跳转到管理页面
        if (isset($_SESSION['admin']['id'])) {
            $this->redirect('manage');
        }
        $this->display();
    }

    /**
     * 管理员界面
     */
    public function manage() {
        $this->display();
    }

    /**
     * phpinfo页面
     */
    public function phpinfo() {
        if (isset($_GET['info'])) {
            phpinfo();
            return;
        }
        $this->display();
    }

}
