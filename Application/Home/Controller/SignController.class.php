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
		$funcMap = array(
				'email'		=>	'validateEmail',
		);
		if (!isset($funcMap[I('post.type')])) {
			$this->ajaxReturn(
					array(
							"status"	=>	false,
							"msg"		=>	'what a big error!',
					)
			);
		}
		$result = $this->userModel->$funcMap[I('post.type')](I('post.arg'));
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
	
	/**
	 * ajax检测某一字段
	 */
	public function ajaxValidateField() {
		$result = $this->shopkeeperModel->validateField(I('type'));
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