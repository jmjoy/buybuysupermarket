<?php
return array(

		/* URL模式 */
		'URL_MODEL'			=>  2, 		// 2 (REWRITE  模式);	
		
		/* 数据库设置 */
		'DB_TYPE'               =>  'mysql',     // 数据库类型
		'DB_HOST'               =>  'localhost', // 服务器地址
		'DB_NAME'               =>  'buybuy',          // 数据库名
		'DB_USER'               =>  'who',      // 用户名
		'DB_PWD'                =>  'whatpasswd',          // 密码
		'DB_PREFIX'             =>  'by_',    // 数据库表前缀

		/* 数据缓存设置 */
		'DATA_CACHE_TIME'       =>  60,      // 数据缓存有效期 0表示永久缓存		
		
		/* 令牌验证 */
		'TOKEN_ON'				=>	true,  // 是否开启令牌验证 默认关闭
		
		/* 加密 */
		// 盐
		'CRYPT_SALT'			=>	'54abe152b6b73',
		
);