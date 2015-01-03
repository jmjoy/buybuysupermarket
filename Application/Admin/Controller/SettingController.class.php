<?php 

namespace Admin\Controller;
use Admin\Controller\AuthController;

class SettingController extends AuthController {

	public function listAdmin() {
		$this->display();
	}
	
	public function listAuth() {
		$this->display();
	}
	
	public function listRole() {
		$this->display();
	}
	
	public function info() {
		$this->display();
	}
	
	public function phpinfo() {
		phpinfo();
	}
	
}
