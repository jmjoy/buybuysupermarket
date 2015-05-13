<?php

namespace Admin\Controller;
use Admin\Controller\AuthController;

/**
 * 后台管理页面控制器
 * @author jmjoy
 *
 */
class ManageController extends AuthController {

    /**
     * 管理首页
     */
    public function index() {
        $this->display();
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
