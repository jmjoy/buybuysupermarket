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
        $row = D('Common/User')->handleAutoSignIn($phone, $md5Passwd);

        // 校验失败了，这个cookie肯定有问题，删掉
        if (!is_array($phone)) {
            cookie('user_autoSignIn', null);
            return;
        }

        // 自动登陆成功了，将用户数据放进session
        session('user', $row);
    }

}
