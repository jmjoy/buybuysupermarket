<?php

namespace Api\Controller;
use Api\Controller\CommController;

class UserController extends CommonController {

    /**
     * 处理登陆请求
     */
    public function postHandleSignIn() {
        // 获取输入
        $phone = I('post.phone');
        $password = I('post.password');

        $result = D('Common/User')->handleSignIn($phone, $password);

        // 登陆失败
        if (!is_array($result)) {
            return $this->ajaxReturn([
                'status'    =>  400,
                'msg'       =>  $result,
            ]);
        }

        // 成功了，将用户的资料放进session里面
        session('user', $row);

        return $this->ajaxReturn([
            'status'    =>  200,
        ]);
    }

    /**
     * 处理注册请求
     */
    public function postHandleSignIn() {
        // 获取输入
        $phone = I('post.phone');
        $password = I('post.password');
        $nickname = I('post.nickname');
        $verifyCode = I('post.verifyCode');

        // 获取存放短信验证码的session的键
        $sessVerifyCodeKey = A('Api/Sms')->sessVerifyCodeKey;
        $correctCode = session($sessVerifyCodeKey);

        // 验证短信验证码是否正确
        if ($verifyCode != $correctCode) {
            return $this->ajaxReturn([
                'status'    =>  400,
                'msg'       =>  '短信验证码不正确',
            ]);
        }

        $result = D('Common/User')->postHandleSignUp($phone, $password, $nickname);

        return $this->simpleAjaxReturn($result);
    }

}

