<?php

namespace Home\Controller;
use Home\Controller\CommonController;

class TestController extends CommonController {
	
	//TODO 这里很难的
    public function index(){
    	
		if ($img = S('img')) {
			header('Content-Type: image/jpeg');
			echo $img;
		} else {
			S('img', file_get_contents('./Public/img/default_avatar.jpg'), 60);
			echo "has saved!";
		}
		
    }
    
}