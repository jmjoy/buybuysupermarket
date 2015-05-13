<?php

namespace Admin\Controller;
use Admin\Controller\AuthController;

/**
 * 管理员登陆验证
 * @author jmjoy
 *
 */
class AdminController extends AuthController {

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
