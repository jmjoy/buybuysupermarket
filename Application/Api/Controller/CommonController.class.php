<?php

namespace Api\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public function _initialize() {
		// 判断是get还是post方法
		if (strpos(ACTION_NAME, 'get') === 0) {
			// 是get方法
			if (!IS_GET) {
				return $this->ajaxReturn([
					'status'	=>	400,
					'msg'		=>	'不是GET请求',
				]);
			}
			
		} else if (strpos(ACTION_NAME, 'post') === 0) {
			// 是post方法
			if (!IS_POST) {
				return $this->ajaxReturn([
						'status'	=>	400,
						'msg'		=>	'不是POST请求',
				]);		
			}
			
		} else {
			// 都不是
			return $this->ajaxReturn([
					'status'	=>	400,
					'msg'		=>	'不是有效请求',
			]);			
		}
		
	}
	
}