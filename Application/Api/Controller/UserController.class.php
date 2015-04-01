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
        $autoSignIn = I('post.autoSignIn');

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

        // 判断需不需要保存自动登陆信息
        if ($autoSignIn) {
            $md5Passwd = md5($password);
            $cookieText = my_encrypt("$phone|$md5Passwd");
            cookie("user_autoSignIn", $cookieText, 10*24*60*60); // 保存10天
        }

        return $this->ajaxReturn([
            'status'    =>  200,
        ]);
    }

    /**
     * 处理注册请求
     */
    public function postHandleSignUp() {
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

