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
 * 加密密码
 * @param string $passwd
 * @return string
 */
function encrypt_passwd($passwd) {
	return md5(sha1($passwd) . C('CRYPT_SALT'));
}