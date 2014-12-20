<?php

/**
 * 格式化打印变量
 * @param mixed $arg 要打印的变量
 */
function p($arg) {
	echo "<pre>\n";
	var_dump($arg);
	echo "</pre>\n";
}