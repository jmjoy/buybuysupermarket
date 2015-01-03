<?php 

namespace Admin\Controller;
use Admin\Controller\AuthController;

class SettingController extends AuthController {

	public function info() {
		$this->display();
	}
	
	public function phpinfo() {
		phpinfo();
	}
	
}
