<?php

namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {
	
    public function index(){
		$this->display();
    }

    public function signUp() {
    	$this->display();
    }
    
    /**
     * 保持登陆状态,
     * 前端定时使用ajax请求,
     * 防止session被删除
     */
    public function keepLoginStatus() {
    }
    
}