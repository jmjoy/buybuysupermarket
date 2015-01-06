<?php 

namespace Admin\Controller;
use Common\Controller\AuthController;

class SettingController extends AuthController {

	public function index() {
		
	}
	
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
