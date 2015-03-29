<?php

namespace Common\Model;
use Common\Model\CommonModel;

class SmsModel extends CommonModel {

    /**
     * 短信调用接口Url
     */
    public $smsUrl;

    /**
     * 短信接口用户名
     */
    public $smsUserName;

    /**
     * 短信接口密码
     */
    public $smsPassword;

    /**
     * 发送验证码的模板
     */
    public $verifyCodeTpl = '您的验证码是 %d，请勿泄露';

    /**
     * 保存防止短信攻击的缓存的前缀
     */
    public $CanSendCachePrefix = 'sms_can_send_';

    /**
     * 发送验证码到指定的手机号码
     */
    public function sendVerifyCode($phone) {
        // 获取防止短信攻击缓存
        $cache = S($this->CanSendCachePrefix . $phone);
        if (!$cache) {
            $cache = [
                'last_time' =>  0,
                'count'     =>  0,
            ];
        }

        $nowTime = time();

        // 1分钟内不能重发
        if ($cache['last_time'] + 60 > $nowTime) {
            return '1分钟之内不能重发短信';
        }

        // 一天之内只能发10条短信
        if ($cache['count'] > 10) {
            return '该号码今天已达短信发送上限（10条）';
        }

        // 生成一个验证码
        $code = $this->createVerifyCode();

        // 发送短息了
        $msg = sprintf($this->verifyCodeTpl, $code);
        $this->sendSms($phone, $msg);

        // 重新保存缓存
        $cache['last_time'] = $nowTime;
        $cache['count']++;

        S($this->CanSendCachePrefix . $phone, $cache, 24*60*60);

        // 成功了，返回验证码
        return [$code];
    }

    /**
     * TODO 发送单条短信
     */
    protected function sendSms($phone, $msg) {
    }

    /**
     * 生成一个6位的验证码
     */
    protected function createVerifyCode() {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= mt_rand(0, 9);
        }
        return $code;
    }

}
