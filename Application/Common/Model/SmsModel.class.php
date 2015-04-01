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
    public $canSendCachePrefix = 'sms_can_send_';

    /**
     * 发送验证码到指定的手机号码
     */
    public function sendVerifyCode($phone) {
        // 获取防止短信
        $resultCode = limit_day_operate($this->canSendCachePrefix, $phone, 60, 10);

        switch ($resultCode) {
        case 1:
            return '1分钟之内不能重发短信';

        case 2:
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
