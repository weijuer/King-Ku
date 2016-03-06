<?php
// +----------------------------------------------------------------------
// | 朕乐视频 [ 一家绝逼的视频网站 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.weijuer.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: weijuer <ch_weijuer@163.com> <http://www.weijuer.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {

	/* 空操作，用于输出404页面 */
	public function _empty(){
//		header( "HTTP/1.0  404  Not Found" );
//		$this->error("你好像走丢咯~");
        echo '模块不存在！';
//		$this->redirect('Public:404');
	}
	
	//初始化操作
	function _initialize() {
		// 手机页面跳转
		if(isMobile()){
			C('DEFAULT_MODULE','Mobile');
			$this->redirect('Mobile/Index/index');
		}
		
		/* 用户登录检测 */
		$this->login();
	}

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		if( is_login() ){
		    $this->error('您还没有登录，请先登录！', U('admin/Login/login'), 3);
		}
	}

}
