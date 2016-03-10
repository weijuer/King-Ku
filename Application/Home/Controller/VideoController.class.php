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

class VideoController extends HomeController {
				
	// 展示首页
    public function index(){
		// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");

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
	
	// 资源列表页测试2
	public function videoList1() {

		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 获取前台查询条件
		if(isset( $_GET['lang'] )) {
            // 根据lang查询结果
            $map['lang'] = I('lang','CH');  // 语言
            // $data = $New->find($_GET['id']);
        }elseif(isset( $_GET['age'] )){
            // 根据age查询结果
            $map['age'] = I('age','');  // 年代
            // $data = $New->getByName($_GET['name']);
        }elseif(isset( $_GET['region'] )) {
        	// 根据region查询结果
        	$map['region'] = I('region','OM'); // 地区
        }else {
        	// 根据kind查询结果
        	$map['kind'] = array('like','JQ%'); // 种类
        }
		
		//$map['kind'] = array('like','JQ%'); // 种类
		//$map['age'] = I('age',array('in','2015,2014,2013,2013older'));  // 年代
		
		dump($map);

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$videoList = $Videos->where($map)->order('regdate')->page($_GET['p'].',4')->select();
		//dump($videoList);
		$this->ajaxReturn($videoList,'json'); // JSON 格式输出数据集
	
	}
	
	// 资源列表页测试
	public function videoList2() {
		//启用CORS，解决跨域问题
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json; charset=utf-8");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With");
		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 定义查询条件
		$condition['order'] = I('post.order','');
		// $condition['page'] = I('post.page','');
		// 读取数据		
		$data = $Videos->where($condition)->select();
		
		$this->ajaxReturn($data,'json');
	}
	

	//读取电影列表数据
	public function movieList() {
		// 实例化Videos对象
		$Videos   =   M('Videos'); 
		
		// 定义查询条件
		$condition['order'] = I('post.order','desc');
		// $condition['_logic'] = 'OR'; //默认逻辑关系是 逻辑与 AND

		// 读取数据		
		$data = $Videos->where()->order('regdate desc')->select();
		$this->ajaxReturn($data,'json');
	}

	
	// 单条电影数据
	public function videoDetail($vid = 0, $uid = 0) {
		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 获取前台ID
		$vid = I('get.vid');
		$uid = I('from_uid');
		$videoList = $Videos->find($vid);
		
		$videoList['kind'] = explode(',', $videoList['kind']); //前台电影类型转数组
		$videoList['casts'] = explode('，', $videoList['casts']); //前台主演转数组
		$this->assign('videoList',$videoList); // 电影对象赋值
		
		$view = $Videos->where($vid)->setInc('view',1,60*3); // 资源阅读数加1，并且延迟60*3秒更新（写入）

		// 下拉选框数组构建
		$array['kindList'] = array('JQ'=>'剧情片','KF'=>'动作片','XY'=>'悬疑片','ZZ'=>'战争片','JS'=>'惊悚片','FZ'=>'犯罪片','KH'=>'科幻片','AQ'=>'爱情片','LL'=>'伦理片','KB'=>'恐怖片','XJ'=>'喜剧片','DH'=>'动画片'); //分类列表
		$array['is_hdList'] = array('BD'=>'蓝光版','HD'=>'高清版','DVD'=>'DVD版','TC'=>'TC(胶片版)','TS'=>'TS(准枪版)','CAM'=>'CAM(枪版)'); // 清晰度列表
		$array['langList'] = array('CH'=>'国语','GD'=>'粤语','EG'=>'英语','KF'=>'韩语','QT'=>'其他'); // 语言列表
		$array['regionList'] = array('ND'=>'内地','GT'=>'港台','OM'=>'欧美','RH'=>'日韩','QT'=>'其他'); // 地区列表
		$array['ageList'] = array('2015'=>'2015年','2014'=>'2014年','2013'=>'2013年','2013older'=>'2013年以前'); // 年代列表
		$array['is_seededList'] = array('0'=>'否','1'=>'是'); // 是否种子列表
		
		//下拉选框数组列表赋值
		$this->assign('arrList',$array);
		
		$map['reference_vid'] = I('get.vid'); // 根据vid查询条件
		
		// 调用评论查询
		$Comment = M("Comment");		
		$comList = $Comment->alias('c')->join('weijuer_user u ON u.uid = c.uid')
		->limit(10)->where($map)->field('username,add_time,content,like_sum')->select();
		
//		dump($comList);
		
		$this->assign('comList',$comList); // 赋值评论列表数据集
		
		// 使用layout控制模板布局
		layout('Layout/layout');
		$this->display("videoDetail");		
	}	
	
	
	// 单条电影播放
	public function videoPlayer($mid=0) {
		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 获取前台ID
		$mid = I('get.mid');
		$videoList = $Videos->find($mid);
		$this->assign('video',$videoList);
		// 使用layout控制模板布局
		layout('Layout/layout');
		$this->display("videoPlayer");		
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