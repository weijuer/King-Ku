<?php
return array(
	//'配置项'=>'配置值'
	
	// 开启路由
	'URL_ROUTER_ON'   => true,
	
	// 配置路由规则
	'URL_ROUTE_RULES' => array( //定义路由规则
//		'videoDetail/:vid\d'  => array('index/videoDetail',array('ext'=>'shtml')),
		'videoDetail/:vid\d'  => '/Video/videoDetail',
		'videoList'  => 'Video/videoList',
		'movieList'  => 'Video/movieList',
		'musicDataList' => 'Music/musicDataList',
	),
	
);