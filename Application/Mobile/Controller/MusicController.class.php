<?php
namespace Mobile\Controller;
use Mobile\Controller\HomeController;

class MusicController extends HomeController {
	// 页面展示
	public function musicList(){
		// 手机页面-首页
		$this->display();
	}
	
	// 音乐列表数据
	public function musicDataList(){
		// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");
		
		// 实例化Musics对象
		$Music   =   M('Music');
		
		// 进行数据查询,默认显示10条数据
		$musicDataList['list'] = $Music->where($map)->order('regdate desc')->limit(10)->select();
		
		$this->ajaxReturn($musicDataList); // 赋值电影10条列表数据集，并ajax返回JSON格式到前台
	}
	
	//	首页
    public function index(){
    	// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");
		
		if( !isMobile() ){
			// 跳转到PC页面
			$this->redirect('Home/Index/index');
		}
		
		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$videoList = $Videos->where($map)->order('regdate desc')->limit(10)->select();

//		$this->ajaxReturn($videoList);
		$this->assign('videoList',$videoList); // 赋值电影10条列表数据集
		
		$time = time();
		$this->assign('today',$time);// 当前时间赋值	
		
		
		// 手机页面-首页
		$this->display();
	}
	
	// 资源列表页
	public function videoList() {

		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 获取前台查询条件
		//$map['lang'] = I('lang','CH');  // 语言
		//$map['kind'] = array('like','JQ%'); // 种类
		//$map['age'] = I('age','');  // 年代
		//$map['region'] = I('region',''); // 地区
		//dump($map);

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$videoList = $Videos->where($map)->order('regdate desc')->page($_GET['p'].',4')->select();
		//dump($videoList);
		$this->assign('videoList',$videoList); // 赋值数据集
		$count = $Videos->where($map)->count();// 查询满足要求的总记录数
		$Page  = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$time = time();
		//dump($time);
		$this->assign('today',$time);// 当前时间赋值		
		
		// 使用layout控制模板布局
		layout('Layout/layout');
		$this->display("videoList");		
	}
	
}