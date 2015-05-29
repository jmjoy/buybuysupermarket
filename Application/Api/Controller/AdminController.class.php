<?php

namespace Api\Controller;
use Api\Controller\AdminAuthController;

/**
 * 管理员操作控制器
 * @author jmjoy
 *
 */
class AdminController extends CommonController {

    /**
     * 只有登录了管理员才能执行操作，否则返回403
     */
    public function _initialize() {
        // 检验有没有登陆
        if (!isset($_SESSION['admin']['id'])) {
            //  die方法
            $this->ajaxReturn([
                    'status'    =>  403,
                    'msg'       =>  '管理员没有登陆',
            ]);
        }
    }

    /**
     * 注销操作
     */
    public function postSignOut() {
        session('admin', null);

        $this->ajaxReturn(array(
            'status'    =>  200,
        ));
    }

    /**
     * 处理添加一级分类请求
     */
    public function postEditOneLevelCategory() {
        $result = D('Common/Category')->editOneLevelCategory($_POST, $_FILES);

        $this->simpleAjaxReturn($result);
    }

}
