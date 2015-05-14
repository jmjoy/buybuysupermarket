<?php

/**
 * 格式化打印变量，接收可变参数
 */
function p() {
    echo "<pre>\n";
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo "</pre>\n";
    die();
}

/**
 * 判断Email是否合法
 * @param string $email
 * @return boolean
 */
function validate_email($email) {
    $result = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($result === false) {
        return false;
    }
    return true;
}

/**
 * 判断Phone是否合法
 * @param string $phone
 * @return boolean
 */
function validate_phone($phone) {
    if (!preg_match('/^1\d{10}$/', $phone)) {
        return false;
    }
    return true;
}

/**
 * 以mysql的datetime字段的形式获取当前时间
 * @return string
 */
function current_datetime() {
    return date('Y-m-d H:i:s');
}

/**
 * 生成全球唯一码
 * @return string
 */
function guid() {
    return strtoupper(md5(uniqid(mt_rand(), true)));
}

/**
 * 对称加密算法（加密）
 */
function my_encrypt($text) {
    $key = C('CRYPT_SALT');
    $key_size = strlen($key);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;
    return base64_encode($ciphertext);
}

/**
 * 对称加密算法（解密）
 */
function my_decrypt($text) {
    $key = C('CRYPT_SALT');
    $ciphertext_dec = base64_decode($text);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    return $plaintext_dec;
}

/**
 * 一天之内隔多少时间可以做啥，一天之内可以做多少次啥（比如手机短信）
 * @param string $prefix 缓存的键前缀
 * @param string $key 缓存的键（比如手机号码）
 * @param int $waitTime 等待时间，就是隔多少时间才能发一次
 * @param int $limitCount 一天之内只能发多少次
 * @return int 0代表发送成功，1代表在等待时间之内，2代表一天之内限制
 */
function limit_day_operate($prefix, $key, $waitTime, $limitCount) {
    // 获取缓存
    $sKey = $prefix . $key;
    $cache = S($sKey);

    // 获取今天的日期
    $nowDate = date('Ymd');
    $nowTime = time();

    // 判断缓存存不存在，并且是不是当天的缓存
    if ($cache && $cache['date'] == $nowDate) {
        // 判断在不在等待时间之内
        if ($cache['oldtime'] + $waitTime > $nowTime) {
            return 1;
        }

        // 判断有没有超过当天的量
        if ($cache['count'] >= $limitCount) {
            return 2;
        }
    }

    // 重新生成缓存
    $cache['oldtime'] = $nowTime;
    $cache['count'] = isset($cache['count']) ? $cache['count'] + 1 : 0;
    $cache['date'] = $nowDate;

    // 重新保存缓存
    S($sKey, $cache, 24*60*60);

    return 0;
}

/**
 * 删除保存在session中的verifycode的信息
 */
function unset_verify_session($id='', $seKey='ThinkPHP.CN') {
    // 使用Verify类的方式取session键
    $key = substr(md5($seKey), 5, 8);
    $str = substr(md5($seKey), 8, 10);
    $key = md5($key . $str) . $id;

    session($key, null);
}
