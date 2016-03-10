<?php
// +----------------------------------------------------------------------
// | 朕乐视频 [ 一家绝逼的视频网站 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.weijuer.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: weijuer <ch_weijuer@163.com> <http://www.weijuer.com>
// +----------------------------------------------------------------------


namespace Home\Controller;
use Home\Controller\HomeController;

class IndexController extends HomeController {
		
		
	// 展示首页
    public function index(){
		// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");
		
		if( isMobile() ){
			// 跳转到手机版的个人空间
			$this->redirect('Mobile/Index/index');
			
		}else {
			
			// 下拉选框数组构建
			$array['kindList'] = array('JQ'=>'剧情片','KF'=>'动作片','XY'=>'悬疑片','ZZ'=>'战争片','JS'=>'惊悚片','FZ'=>'犯罪片','KH'=>'科幻片','AQ'=>'爱情片','LL'=>'伦理片','KB'=>'恐怖片','XJ'=>'喜剧片','DH'=>'动画片'); //分类列表
			$array['is_hdList'] = array('BD'=>'蓝光版','HD'=>'高清版','DVD'=>'DVD版','TC'=>'TC(胶片版)','TS'=>'TS(准枪版)','CAM'=>'CAM(枪版)'); // 清晰度列表
			$array['langList'] = array('CH'=>'国语','GD'=>'粤语','EG'=>'英语','KF'=>'韩语','QT'=>'其他'); // 语言列表
			$array['regionList'] = array('ND'=>'内地','GT'=>'港台','OM'=>'欧美','RH'=>'日韩','QT'=>'其他'); // 地区列表
			$array['ageList'] = array('2015'=>'2015年','2014'=>'2014年','2013'=>'2013年','2013older'=>'2013年以前'); // 年代列表
			$array['is_seededList'] = array('0'=>'否','1'=>'是'); // 是否种子列表
			
			$str = json_encode($array);//数组转成JSON格式的字符串方便后面传入模板
			
			//下拉选框数组列表赋值
			$this->assign('arrList',$str);
			// 不带任何参数 自动定位当前操作的模板文件
			
			// 使用layout控制模板布局
	//		layout('Base/base');
			$this->display();
			
		}
		
	}	
	

	/*
	* 多表操作实例
	*/
	
	 // 多表操作示例1
	public function test1() {
		//实例化空模型
		// $Model = new Model();
		//或者使用M快捷方法是等效的
		$Model = M();
		$List  =  $Model->field('musers.username,Videos.moviename')
		->table(array('weijuer_musers'=>'musers','weijuer_Videos'=>'Videos'))
		->limit(10)->select();
		
		dump($List);
		//echo $List;
		//echo $Model->getLastSql(); //打印一下SQL语句，查看一下
	}	
	
	
	// 多表操作示例2
	public function test2() {
		// 实例化Videos对象
		$Videos   =   M('Videos');
		
		$List = $Videos->alias('m')->join('weijuer_musers u ON u.userid = m.mid')
		->limit(10)->select();
		
		dump($List);
		//echo $List;
		//echo $Videos->getLastSql(); //打印一下SQL语句，查看一下
	}
	
	
}