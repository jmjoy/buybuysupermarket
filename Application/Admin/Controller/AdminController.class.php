<?php

namespace Admin\Controller;
use Admin\Controller\AdminAuthController;

/**
 * 管理员登陆验证
 * @author jmjoy
 *
 */
class AdminController extends AdminAuthController {

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
