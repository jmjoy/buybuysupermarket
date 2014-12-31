<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public function _initialize() {
	}
	
	public function test() {
		sys_get_temp_dir();
	}
}