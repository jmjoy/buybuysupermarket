<?php

namespace Home\Controller;
use Home\Controller\AuthController;

class UserController extends AuthController {
	
    public function index() {
    	$this->display();
    }
    
    public function account() {
    	$this->display();
    }
    
    public function order() {
    	$this->display();
    }
    
    public function cart() {
    	$this->display();
    }
	
    public function point() {
    	$this->display();
    }
    
    public function star() {
    	$this->display();
    }
    
    public function comment() {
    	$this->display();
    }
    
}