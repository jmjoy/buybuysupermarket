<?php

namespace Admin\Controller;
use Admin\Controller\AdminAuthController;

/**
 * 后台管理页面控制器
 * @author jmjoy
 *
 */
class CategoryController extends AdminAuthController {

    /**
     * 管理首页
     */
    public function index() {
        $this->display();
    }

}
