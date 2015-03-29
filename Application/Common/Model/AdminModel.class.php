<?php

namespace Common\Model;
use Common\Model\CommonModel;

/**
 * 管理员登陆模型
 * @author jmjoy
 *
 */
class AdminModel extends CommonModel {

	/**
	 * 管理员登陆
	 * @param unknown $name
	 * @param unknown $password
	 * @return string|multitype:string
	 */
	public function signIn($name, $password) {
		// 获取正确的密码
		$md5Passwd = $this->where('name = "%s"', $name)
							->getField('password');

		// 校验
		if ($md5Passwd === false) {
			return $this->getDbError();
		}

		if ($md5Passwd === null) {
			return '用户名不存在';
		}

		if (md5(sha1($password)) != $md5Passwd) {
			return '密码错误';
		}

		// 登陆成功，创建Session，并返回sessionId
		$sessId = guid();
		$value['admin']['name'] = $name;
		S('SESS_'.$sessId, $value, 3600);

		// 成功
		return [$sessId];
	}

	/**
	 * 注销
	 * @param unknown $sessId
	 */
	public function signOut($sessId) {
		$sessArr = S($sessId);
		unset($sessArr['admin']);
		S($sessId, $sessArr);
	}

}
