<?php

namespace Api\Controller;
use Api\Controller\CommonController;

/**
 * 管理员登陆控制器
 * @author jmjoy
 *
 */
class AdminSignController extends CommonController {
	
	/**
	 * 处理管理员登陆请求
	 */
	public function postSignIn() {
		$name = I('post.name');
		$password = I('post.password');
		
		$result = D('Common/Admin')->signIn($name, $password);
		
		// 登陆失败
		if (!is_array($result)) {
			$this->ajaxReturn([
					'status'	=>	400,
					'msg'		=>	$result,
			]);
		}
		
		// 登陆成功
		$this->ajaxReturn([
				'status'	=>	200,
				'sessId'	=>	$result[0],
		]);
	}
	
}