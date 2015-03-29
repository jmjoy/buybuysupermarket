<?php

namespace Api\Controller;
use Api\Controller\CommController;

class SmsController extends CommonController {

    /**
     * 验证码存放的session的key
     */
    public $sessVerifyCodeKey = 'sms.verifyCode';

    /**
     * 发送短信验证码，并将验证码保存到session
     * 接收post参数：phone
     */
    public function postSendVerifyCode() {
        // 获取输入
        $phone = I('post.phone');

        $result = D('Common\Sms')->sendVerifyCode($phone);

        // 发送短信失败了
        if (!is_array($result)) {
            return $this->ajaxReturn([
                'status'    =>  400,
                'msg'       =>  $result,
            ]);
        }

        // 发送成功，把验证码放进session
        $code = $result[0];
        session($this->sessVerifyCodeKey, $code);

        return $this->ajaxReturn([
            'status'    =>  200,
        ]);
    }

    /**
     * 检验验证码
     */
    public function postCheckVerifyCode() {
        // 获取输入
        $verifyCode = I('post.code');

        $correctCode = session($this->sessVerifyCodeKey);

        if ($verifyCode != $correctCode) {
            return $this->ajaxReturn([
                'status'    =>  400,
                'msg'       =>  '验证码不正确',
            ]);
        }

        return $this->ajaxReturn([
            'status'    =>  200,
        ]);
    }

}
