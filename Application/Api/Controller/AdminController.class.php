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

        if (!$sessArr || !isset($sessArr['admin'])) {
            $this->ajaxReturn([
                    'status'    =>  403,
                    'msg'       =>  '管理员没有登陆',
            ]);
        }

        $this->adminName = $sessArr['admin']['name'];
    }

    public function postAddOneLevelCategory() {
        $inputs = $_POST;
        $result = D('Common/Category')->addCategory($inputs);
        $this->simpleAjaxReturn($result);
    }

    /**
     * 注销
     */
    public function postSignOut() {
        D('Common/Admin')->signOut($this->sessId);
        $this->ajaxReturn([
                'status'	=>	200,
        ]);
    }

}
