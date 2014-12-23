<?php

namespace Home\Controller;
use Home\Controller\CommonController;

class UserController extends CommonController {
	
    public function index($mod = 'Center'){
    	if (!method_exists($this, 'ajax' . $mod)) {
    		return;
    	}
    	$this->mod = $mod;
    	$this->display();
    }
    
    public function ajaxCenter() {
    	$this->display();
    }
    
    public function ajaxAccount() {
    	$this->display();
    }
    
    public function ajaxOrder() {
    	$this->display();
    }
    
    public function ajaxCart() {
    	$this->display();
    }
	
    public function ajaxPoint() {
    	$this->display();
    }
    
}