<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public function _initialize() {
		$this->web_name = '买买网';
		$this->web_title = '买买网，快来买啊！';
	}
	
	public function test() {
		sys_get_temp_dir();
	}
}