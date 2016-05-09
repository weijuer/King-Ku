<?php
return array(
	//'配置项'=>'配置值'
	//公共模块Common，Home模块，Mobile模块
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Mobile'), // 允许访问的模块列表
	
	'URL_HTML_SUFFIX' => 'shtml', //URL伪静态设置	
	
	'ERROR_PAGE' => '/Public/static/404.html', //404 页面设置

//	'URL_404_REDIRECT'      =>  '', // 404 跳转页面 部署模式有效

	//默认错误跳转对应的模板文件
//	'TMPL_ACTION_ERROR' => 'Public:404',

	
//	'SHOW_PAGE_TRACE' => true, // 显示页面Trace信息
	
//	'SHOW_ERROR_MSG'  =>  true,    // 显示错误信息
	
//	'ERROR_MESSAGE'  =>    '发生错误！' // 如果'SHOW_ERROR_MSG'设置为false，则默认显示该说明文字
	
//	'TMPL_PARSE_STRING'  =>array(
//	     '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
//		 '__JS__'     => '/Public/JS/', // 增加新的JS类库路径替换规则
//		 '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
//	     '__ROOT__' =>  //会替换成当前网站的地址（不含域名） 
//		 '__APP__' =>  '', //会替换成当前应用的URL地址 （不含域名）
//		 '__MODULE__' =>  //会替换成当前模块的URL地址 （不含域名）
//		 '__CONTROLLER__' =>  //（__或者__URL__ 兼容考虑）会替换成当前控制器的URL地址（不含域名）
//		 '__ACTION__'：会替换成当前操作的URL地址 （不含域名）
//		 '__SELF__' =>  //会替换成当前的页面URL
//		 '__PUBLIC__' =>  //会被替换成当前网站的公共目录 通常是 /Public/
//	),
	
	// 添加数据库配置信息 支持数组、字符串以及调用配置参数三种格式
	//1、字符串定义
	// 字符串定义采用DSN格式定义，格式定义规范为：
	// 数据库类型://用户名:密码@数据库主机名或者IP:数据库端口/数据库名#字符集
	
	// 2.数组定义
	// $connection = array(
		// 'db_type'    =>   'mysql',
		// 'db_host'    =>   '192.168.1.2,192.168.1.3',
		// 'db_user'    =>   'root',
		// 'db_pwd'     =>   '12345',
		// 'db_port'    =>    3306,
		// 'db_name'    =>    'demo', 
		// 'db_charset' =>    'utf8',
		// 'db_deploy_type'=>    1,
		// 'db_rw_separate'=>    true,
		// 'db_debug'    =>    true,
	// );
	// 分布式数据库部署 并且采用读写分离 开启数据库调试模式
	// new \Home\Model\NewModel('new','think_',$connection);
		
	// 3、配置定义
	// 我们可以事先在配置文件中定义好数据库连接信息，然后在实例化的时候直接传入配置的名称即可，例如：	
	//数据库配置1
	// 'DB_CONFIG1' => array(
		 // 'db_type'  => 'mysql',
		 // 'db_user'  => 'root',
		 // 'db_pwd'   => '1234',
		 // 'db_host'  => 'localhost',
		 // 'db_port'  => '3306',
		 // 'db_name'  => 'thinkphp'
	// ),
	// //数据库配置2
	// 'DB_CONFIG2' => 'mysql://root:1234@localhost:3306/thinkphp',	
		
		
	// 配置文件中的相关数据库配置参数
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'test', // 数据库名
	'DB_USER'   => 'weijuer', // 用户名
	'DB_PWD'    => 'nj123456', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'weijuer_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  true, // 数据库调试模式 开启后可以记录SQL日志
	
	
	// 设置默认的视图层名称
	//'DEFAULT_V_LAYER'       =>  'Template', 
	//'TMPL_TEMPLATE_SUFFIX'=>'.tpl', //替换模板文件的默认后缀
	//'TMPL_FILE_DEPR'=>'_', //通过设置 TMPL_FILE_DEPR 参数来配置简化模板的目录层次
	
	// 全站使用相同布局,模板布局
	// 'LAYOUT_ON'=>true, // 模板布局开启
	// 'LAYOUT_NAME'=>'Layout/layout', //设置布局入口文件名LAYOUT_NAME（默认为layout）
);