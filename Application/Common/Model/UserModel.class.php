<?php

namespace Common\Model;
use Think\Model;

/**
 * 用户模型
 * @author jmjoy
 *
 */
class UserModel extends Model {
	
	protected $_validate = array(
			array('password', 'require', '密码不能为空！', 1),
			array('password', '/^\S{6,12}$/', '密码必须为6到12个字符', 1, 'regex'),
				
			array('email', 'require', '邮箱不能为空！', 1),
			array('email', 'is_email', '邮箱不合法', 1, 'function'),
			array('email', '', '邮箱已经被注册！', 1, 'unique'),
				
			array('phone', 'require', '手机号码不能为空！', 1),
			array('phone', '/^(1[3|5|8])[\d]{9}$/', '手机号码不合法', 1, 'regex'),
			array('phone', '', '手机号码已经被注册！', 1, 'unique'),
	);
	
	protected $_auto = array (
			array('password', 'encrypt_passwd', 1, 'function'),
			array('ctime', 'current_datetime', 1, 'function')
	);
	
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
	
	/**
	 * 验证特定字段
	 * @param string $field
	 * @return string|boolean 如果返回true代表验证通过，否则返回错误信息
	 */
	public function validateField($field) {
		// 获取特定字段的验证规则
		$rules = array();
		foreach ($this->_validate as $row) {
			if ($row[0] == $field) {
				$rules[] = $row;
			}
		}
		// 验证
		if (!$rules) {
			return 'what a big error!';
		}
		C('TOKEN_ON',false);
		if (!$this->validate($rules)->create()){
			return $this->getError();
		}
		// 验证OK
		return true;
	}	
	
}