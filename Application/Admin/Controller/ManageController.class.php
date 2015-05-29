<?php

namespace Admin\Controller;
use Admin\Controller\AdminAuthController;

/**
 * 后台管理页面控制器
 * @author jmjoy
 *
 */
class ManageController extends AdminAuthController {

    /**
     * 管理首页
     */
    public function index() {
        $this->display();
    }

    /**
     * phpinfo页面
     */
    public function phpinfo() {
        $this->display();
    }

    /**
     * phpinfo页面的iframe调用
     */
    public function phpinfoPage() {
        phpinfo();
    }


}
