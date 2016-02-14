<?php
// 本类由系统自动生成
namespace WeChatAPI\Controller;
use Think\Controller;

class IndexController extends WeChatController {

	//定义空操作，避免错误反馈
	/* 空操作，用于输出404页面 */
	public function _empty(){ 
		//空操作
//		$this->redirect('Index/index');
	}

    public function index(){
		//  实例化 WeChat控制器
		$WeChat = A('WeChat');		
		$WeChat->run();
	}
}