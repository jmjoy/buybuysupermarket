<?php 

namespace Admin\Controller;
use Common\Controller\AuthController;

class AdminController extends AuthController {

	public function index() {
		$this->display();
	}
	
}
