<?php

namespace Home\Behaviors;
use Think\Behavior;

/**
 * 处理用户自动登陆的行为
 */
class UserAutoSignInBehavior extends Behavior {

    //行为执行入口
    public function run(&$param){
        // 已经登陆了，不需要自动登陆
        if (session('?user')) {
            return;
        }

        $cookieText = cookie('user_autoSignIn');

        // 没有自动登陆cookie，也不需要自动登陆
        if (!$cookieText) {
            return;
        }

        // 解密，正常格式为“phone|md5(password)”
        $rawText = my_decrypt($cookieText);
        $arr = explode('|', $rawText);

        // 这可能是非法cookie了
        if (!is_array($arr) || count($arr) != 2) {
            return;
        }

        list($phone, $md5Passwd) = $arr;
    }

}
