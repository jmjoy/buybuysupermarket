<?php

namespace Home\Controller;
use Common\Controller\CommonController;

class TestController extends CommonController {
	
	//TODO 这里很难的
    public function index(){
    	
		$mailer = new \Common\Util\Mailer();
		$mailer->send();
    }
    
}


// 缓存图片，证实可行
// if ($img = S('img')) {
// 	header('Content-Type: image/jpeg');
// 	echo $img;
// } else {
// 	S('img', file_get_contents('./Public/img/default_avatar.jpg'), 60);
// 	echo "has saved!";
// }