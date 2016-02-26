<?php
return array(
	//'配置项'=>'配置值'
	// 开启路由
	'URL_ROUTER_ON'   => true,
	
	// 配置路由规则
	'URL_ROUTE_RULES' => array( //定义路由规则
//		'videoDetail/:vid\d'  => array('index/videoDetail',array('ext'=>'shtml')),
		'videoDetail/:vid\d'  => 'index/videoDetail',
		'videoList'  => 'index/videoList',
		'movieList'  => 'index/movieList',
	),
	
	
	// 模板相关配置
	'TMPL_PARSE_STRING' => array (
			'__STATIC__' => __ROOT__ . '/Public/static',
			'__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
			'__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
			'__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
			'__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js' ,
//			'__MOBILE__' => __ROOT__ . '/Public/' . MODULE_NAME .'/mobile'
	),
);