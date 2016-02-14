<?php


// 手机用户页面应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

//安全文件的名称设置
define('DIR_SECURE_FILENAME', 'default.html');

//关闭目录安全文件的生成
//define('BUILD_DIR_SECURE', false);

// 定义应用目录
define('APP_PATH','./Application/');


// 绑定入口文件到Mobile模块访问
define('BIND_MODULE','Mobile');

//define('__APP__', '');// 重定义，并隐藏Mobile.php

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单