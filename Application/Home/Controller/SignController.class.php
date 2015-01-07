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
	
	/**
	 * ajax检测某一字段
	 */
	public function ajaxValidateField() {
		$result = $this->userModel->validateField(I('type'));
		// 验证失败
		if ($result !== true) {
			$this->ajaxReturn(array(
					'status'	=>	false,
					'msg'		=>	$result,
			));
		}
		// 验证OK
		$this->ajaxReturn(array(
				'status'	=>	true,
		));
	}
	
}