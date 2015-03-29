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
	if (!preg_match('/^(1[3|5|8])[\d]{9}$/', $phone)) {
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