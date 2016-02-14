<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   => true, //开启路由
	
	// 配置路由规则
	'URL_ROUTE_RULES'=>array(
    'edit/:id'               => 'Index/edit',
    'Index/read/:id'          => '/read/:1',
 ),
);