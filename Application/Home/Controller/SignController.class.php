<?php

namespace Home\Controller;
use Common\Controller\CommonController;
use Common\Model\UserModel;

class SignController extends CommonController {
	
	/**
	 * 用户模型
	 * @var UserModel
	 */
	public $userModel;
	
	
	public function _initialize() {
		$this->userModel = D('Common/User');
	}
	
	public function index() {
	}
	
	public function handleSignUp($mode = '') {
		$this->userModel->handleSignUp($mode);
	}
	
	public function ajaxValidate() {
		$map = array(
				'email'		=>	'ajaxValidateEmail',
		);
		if (!isset($map[I('type')])) {
			$this->ajaxReturn(
					array(
							"status"	=>	false,
							"msg"		=>	'what a big error!',
					)
			);
		}
		$this->$map[I('type')](I('post.arg'));
	}
	
	private function ajaxValidateEmail($arg) {
		$result = $this->userModel->validateEmail($arg);
		// 校验失败
		if ($result !== true) {
			$this->ajaxReturn(
					array(
							"status"	=>	false,
							"msg"		=>	$result,
					)
			);
		}
		// 校验成功
		$this->ajaxReturn(
				array(
						"status"	=>	true,
				)
		);
	}
	
}