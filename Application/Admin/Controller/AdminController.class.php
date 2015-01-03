<?php 

namespace Admin\Controller;
use Admin\Controller\AuthController;

class AdminController extends AuthController {

	public function index() {
		$this->display();
	}
	
}
