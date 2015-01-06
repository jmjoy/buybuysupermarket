<?php

namespace Common\Model;
use Think\Model;

/**
 * 用户模型
 * @author jmjoy
 *
 */
class UserModel extends Model {
	
	public function handleSignUp($mode) {
		switch ($mode) {
		case 'email':
			p(I('post.'));
			break;
			
		case 'phone':
			echo 'phone';
			p(I('post.'));
			break;
		}
	}
	
	public function validateEmail($arg) {
		if (!$arg) {
			return "邮箱地址不能为空！";
		}
		if (filter_var($arg, FILTER_VALIDATE_EMAIL) === false) {
			return "邮箱地址不合法！";
		}
		return true;
	}
	
	public function validatePhone($arg) {
		if (!$arg) {
			return "手机号码不能为空！";
		}
		if (!preg_match('/^(1[3|5|8])[\d]{9}$/', $arg)) {
			return "邮箱地址不合法！";
		}
		return true;
	}
	
	public function validatePasswd($arg) {
		if (!$arg) {
			return "密码不能为空！";
		}
		if (!preg_match('/^\S{6,18}$/', '密码格式不对！')) {
			return "密码格式不对！";
		}
		return true;
	}
	
	public function validateEmailVerify($arg, $reset = true) {
		if (!$verify) {
			return "验证码不能为空";
		}
		return true;
	}
	
	public function validatePhoneVerify($arg, $reset = true) {
		if (!$verify) {
			return "验证码不能为空";
		}
		return true;
	}
	
}