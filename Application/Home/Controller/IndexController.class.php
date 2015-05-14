<?php

namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {

    /**
     * 获取验证码
     */
    public function verifyImg() {
        $config = array(
            'length'    =>  4,
        );

        $verify = new \Think\Verify($config);
        $verify->entry();
    }

}
