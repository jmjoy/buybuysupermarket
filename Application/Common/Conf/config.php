<?php
return array(

        /* 模板替换使用 */
        'TMPL_PARSE_STRING'     =>  array(
             '__IMG__'     => '/Public/img',
             '__CSS__'     => '/Public/css',
             '__JS__'     => '/Public/js',
             '__VENDOR__' => '/Public/vendor',
             '__UPLOAD__' => '/Public/upload',
        ),

        /* URL模式 */
        'URL_MODEL'             =>  2,          // 2 (REWRITE  模式);

        /* 数据库设置 */
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_NAME'               =>  'buybuy',          // 数据库名
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PREFIX'             =>  'by_',    // 数据库表前缀

        /* 数据缓存设置 */
        'DATA_CACHE_TIME'       =>  60,      // 数据缓存有效期 0表示永久缓存

        /* 默认设定 */
        'DEFAULT_MODULE'        =>  'Web',  // 默认模块

        /* 我的配置 */
        'CRYPT_SALT'            =>  'e2e8912916b9da5abafb4ab7b258bf10f46af451',
);
