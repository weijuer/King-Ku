<?php
namespace Mobile\Controller;
use Think\Controller;
class VideoController extends Controller {
	
	public function videoList(){
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
	
	
	// 查询单条资源记录
	public function videoDetail($vid=0) {

		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 获取前台ID
		$vid = I('vid');
//		dump($vid);
		// 进行ID数据查询 
		$video = $Videos->find($vid);
		$video['regdate'] = date("Y-m-d", $video['regdate']);
//		$this->ajaxReturn($video);
		$this->assign('video',$video); // 赋值单条电影数据
//		dump($video);		

		// 下拉选框数组构建
		$array['kindList'] = array('JQ'=>'剧情片','KF'=>'动作片','XY'=>'悬疑片','ZZ'=>'战争片','JS'=>'惊悚片','FZ'=>'犯罪片','KH'=>'科幻片','AQ'=>'爱情片','LL'=>'伦理片','KB'=>'恐怖片','XJ'=>'喜剧片','DH'=>'动画片'); //分类列表
		$array['is_hdList'] = array('BD'=>'蓝光版','HD'=>'高清版','DVD'=>'DVD版','TC'=>'TC(胶片版)','TS'=>'TS(准枪版)','CAM'=>'CAM(枪版)'); // 清晰度列表
		$array['langList'] = array('CH'=>'国语','GD'=>'粤语','EG'=>'英语','KF'=>'韩语','QT'=>'其他'); // 语言列表
		$array['regionList'] = array('ND'=>'内地','GT'=>'港台','OM'=>'欧美','RH'=>'日韩','QT'=>'其他'); // 地区列表
		$array['ageList'] = array('2015'=>'2015年','2014'=>'2014年','2013'=>'2013年','2013older'=>'2013年以前'); // 年代列表
		$array['is_seededList'] = array('0'=>'否','1'=>'是'); // 是否种子列表
		
		//下拉选框数组列表赋值
		$this->assign('arrList',$array);


		$this->display();
	}
	
	
	
		
	// 获取新闻列表
    public function getList(){
		//实例化新闻对象
        $newsList = M('News')->select();
        echo json_encode($newsList); //json格式返回数据集
    }
	
	
	// 资源列表
	public function getVideoList() {

		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 获取前台查询条件
		//$map['lang'] = I('lang','CH');  // 语言
		//$map['kind'] = array('like','JQ%'); // 种类
		//$map['age'] = I('age','');  // 年代
		//$map['region'] = I('region',''); // 地区
		//dump($map);

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$videoList = $Videos->where($map)->order('regdate desc')->limit(10)->select();

		$this->ajaxReturn($videoList);
		
		$time = time();
		//dump($time);
		$this->assign('today',$time);// 当前时间赋值		
		
	}

	
	
	// 相关资源列表
	public function getRelatedList() {

		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 获取前台查询条件
		//$map['lang'] = I('lang','CH');  // 语言
		//$map['kind'] = array('like','JQ%'); // 种类
		$map['age'] = I('age','2015');  // 年代
		//$map['region'] = I('region',''); // 地区
		//dump($map);

		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$videoList = $Videos->where($map)->order('regdate desc')->limit(10)->select();

		$this->ajaxReturn($videoList);
		
	}
	
		
	// 查询单条资源记录
	public function getVideo() {

		// 实例化Videos对象
		$Videos   =   M('Videos');

		// 获取前台查询条件
		$map['vid'] = I('vid',0);  // ID

		// 进行ID数据查询 
		$video = $Videos->where($map)->find();
		$video['regdate'] = date("Y-m-d H:m:s", $video['regdate']);
		$this->ajaxReturn($video);	
	}
	
}
