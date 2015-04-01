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
