<?php
// +----------------------------------------------------------------------
// | 朕乐视频 [ 一家绝逼的视频网站 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.weijuer.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: weijuer <ch_weijuer@163.com> <http://www.weijuer.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Admin\Controller\HomeController;

class VideoController extends HomeController {
	
	/*
	* 电影列表
	*/
	// 电影数据列表页
	public function videoAdmin() {
		// $this->checkLogin();//检测用户是否登录，需要另外写~ 
		// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");
		
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
		//dump($array);
		//$this->ajaxReturn($array,'JSON');
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();			
	}	
	
	
	//读取电影列表数据
	public function videoList() {
		// 实例化Videos对象
		$Videos   =   M('Videos'); 
		
		// 定义查询条件
		$condition['order'] = I('post.order','');
		// $condition['_logic'] = 'OR'; //默认逻辑关系是 逻辑与 AND
		
		// 读取数据		
		$data = $Videos->where($condition)->select();
		$this->ajaxReturn($data,'json');
	}
	
	// 添加单条电影页
	public function videoAdd() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();			
	}
		
	// 添加电影数据验证
	public function videoAddCheck() {
        // 判断提交方式 做不同处理
        if (IS_POST) {
			// 防止输出中文乱码
            header("Content-type: text/html; charset=utf-8");
			
			// 采用动态完成的方式来解决不同的处理规则
			$rules = array ( 
				// array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
				array('regdate','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
				array('lastdate','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
				array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
			);
							
			// 实例化Videos对象
			$Videos   =   M('Videos');
            // 自动验证 创建数据集
			
            if (!$data = $Videos->auto($rules)->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $Videos->getError()
				); 
				$this->ajaxReturn($msg);
            }
			
			// 多选字段处理，将数组元素组合为一个字符串
			$data['kind'] = implode(',', I('post.kind'));
			// 图片上传参数接收
			$data['poster'] = I('data.poster','','',$_FILES);
			$data['shotcuts[]'] = I('data.shotcuts[]','','',$_FILES);
			dump($data);

            //插入数据库
            if ($id = $Videos->add($data)) {//成功插入
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);
            } else {// 插入失败

				$msg = array(
					'info' => '添加数据失败！'
				);
				$this->ajaxReturn($msg);
            }
        } else {
			E('页面不存在');
        }
    }
	
	
	
	//更改资源数据
	public function videoEdit($vid=0){
		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 获取前台ID
		$vid = I('get.vid');
		$video = $Videos->find($vid);
		
		// session赋值 vid
		session('vid',$vid);  //设置session
		
		// 影视种类转数组
		$video['kind'] = explode(',', $video['kind']);
		//dump($video['kind']);
		$this->assign('video',$video); // 赋值数据集
		
		// 下拉选框数组构建
		$array['kindList'] = array('JQ'=>'剧情片','KF'=>'动作片','XY'=>'悬疑片','ZZ'=>'战争片','JS'=>'惊悚片','FZ'=>'犯罪片','KH'=>'科幻片','AQ'=>'爱情片','LL'=>'伦理片','KB'=>'恐怖片','XJ'=>'喜剧片','DH'=>'动画片'); //分类列表
		$array['is_hdList'] = array('BD'=>'蓝光版','HD'=>'高清版','DVD'=>'DVD版','TC'=>'TC(胶片版)','TS'=>'TS(准枪版)','CAM'=>'CAM(枪版)'); // 清晰度列表
		$array['langList'] = array('CH'=>'国语','GD'=>'粤语','EG'=>'英语','KF'=>'韩语','QT'=>'其他'); // 语言列表
		$array['regionList'] = array('ND'=>'内地','GT'=>'港台','OM'=>'欧美','RH'=>'日韩','QT'=>'其他'); // 地区列表
		$array['ageList'] = array('2015'=>'2015年','2014'=>'2014年','2013'=>'2013年','2013older'=>'2013年以前'); // 年代列表
		$array['is_seededList'] = array('0'=>'否','1'=>'是'); // 是否种子列表
		
		//下拉选框数组列表赋值
		$this->assign('arrList',$array);
		
		// 使用layout控制模板布局
		layout('Layout/layout_inside');		
		$this->display('videoEdit');
	}
	
	
	
	// 更新并保存资源
	public function videoEditUpdate(){
        // 采用动态完成的方式来解决不同的处理规则
		$rules = array ( 
			//array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
			array('lastdate','time',2,'function'), // 对lastdate字段在更新的时候写入当前时间戳
		);
		
		// 实例化Videos对象
		$Videos   =   M('Videos');
		
		if($Videos->auto($rules)->create()) {
			$result =   $Videos->save();
			if($result) {
				// $this->success('操作成功！');
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);				
			}else{
				$msg = array(
					'info' => '编辑失败，请重新编辑！'
				);
				$this->ajaxReturn($msg);
			}
		}else{
			// $this->error($Videos->getError());
			$msg = array(
				'info' => $this->error($Videos->getError())
			);
			$this->ajaxReturn($msg);
		}
	}

	/**
     * 上传图片处理
     */
	 
	//-----海报图像上传处理，单个图像上传-----
	public function posterUpload($poster='',$vid=0){
		//传入参数数组
		$config = array(
			'maxSize'    =>    3145728,// 设置附件上传大小
			'rootPath'   =>    'Public/images/poster/',// 设置附件上传根目录
			'savePath'   =>    '',// 设置附件上传（子）目录
			'saveName'   =>    array('date','YmdHms'),//上传文件的命名规则
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
			'autoSub'    =>    false, //自动使用子目录保存上传文件 默认为true
			'replace'    =>    true, //存在同名文件是否是覆盖
			//'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);// 实例化上传类
		$poster = $_FILES['poster'];
		
		// 上传文件 
		$info   =   $upload->uploadOne($poster);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			//更新上传信息保存到当前用户数据表
			// 实例化Videos对象
			$Videos   =   M('Videos');

			//头像保存信息分割
			$data['poster'] = $info['savename'];
			$where['vid'] = I('session.vid'); // 获取前台VID,更新条件
			$Videos->where($where)->save($data);
			//$this->success('上传成功！');		
		}
	}
	

	//-----截图图像上传处理-----
	public function shotcutsUpload($shotcuts='',$vid=0){
		// 上传空值控制
		if (!empty($_FILES)) {
			//图片上传设置
			$config = array(
				'maxSize'    	=>    3145728,// 设置附件上传大小
				'rootPath'   	=>    'Public/images/shotcuts/',// 设置附件上传根目录
				'savePath'   	=>    '',// 设置附件上传（子）目录
				'saveName'   	=>    array('uniqid',''),//上传文件的命名规则
				'exts'       	=>    array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'autoSub'    	=>    false, //自动使用子目录保存上传文件 默认为true
				'replace'    	=>    false, //存在同名文件是否是覆盖									
				'subName'    =>    array('date','Ymd'),
			);
			
			//传入参数数组
			$upload = new \Think\Upload($config);// 实例化上传类
			$shotcuts = $_FILES['shotcuts[]'];
			
			// 上传文件 
			$images = $upload->upload();
			
			//判断是否有图
			if($images) {// 上传成功 获取上传文件信息
				// 实例化Videos对象
				$Videos   =   M('Videos');
				// 定义shotcuts数组
				$shotcuts = array();
				
				foreach($images as $file){
					// 保存当前上传图像数据对象		
					$shotcuts[] = $file['savename'];
				}
				
				// 将shotcuts数组转换为数组字符串，便于存入shotcut字段
				$data['shotcuts'] = implode(',', $shotcuts);
				
				$where['vid'] = I('session.vid'); // 获取前台VID，更新条件
				$Videos->where($where)->save($data); // 存入数据库
				//dump($images);
			}else {// 上传错误提示错误信息
				//exit ("上传错误!");
				$this->error($upload->getError());
			}

		}else {
			exit("没有图片上传！");
		}
	
	}
	

	//删除资源信息数据
	public function videoDelete($vid=0){
		// 实例化Videos对象
		$Videos   =   M('Videos');
		
		// 获取前台mID的用户数据
		$vid = I('post.vid');

		if ($pass = $Videos->delete($vid)) {
			$msg = array(
				'info' => 'ok',
				'callback' => 'javascript:parent.history.back();' // 删除成功后返回上一页
			);
			$this->ajaxReturn($msg);
		} else {
			$msg = array(
				'info' => '删除数据失败！'
			);
			$this->ajaxReturn($msg);
		}
	}
	 
	 
	 
	 
	/*
	* 电影详情列表
	*/
	
	//读取电影详情列表数据
	public function videoDetailsList() {
		// 实例化Videos对象
		$Videos   =   M('Videos'); 
		
		// 定义查询条件
		$condition['order'] = I('post.order','');
		// $condition['_logic'] = 'OR'; //默认逻辑关系是 逻辑与 AND
		
		// 读取数据		
		$data = $Videos->where($condition)->select();
		$this->ajaxReturn($data,'json');
	}
	
	// 电影电影详情数据列表页
	public function videoDetailsAdmin() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();			
	}	
	
	
	// 添加单条电影页
	public function videoDetailsAdd() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();			
	}
	
	
	// 添加电影数据验证
	public function videoDetailsAddCheck() {
        // 判断提交方式 做不同处理
        if (IS_POST) {
			
			// 采用动态完成的方式来解决不同的处理规则
			$rules = array ( 
				// array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
				array('regdate','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
				array('lastdate','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
			);
			
			// 实例化Videos对象
			$Videos   =   M('Videos');
            // 自动验证 创建数据集
            if (!$data = $Videos->auto($rules)->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                // exit($user->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $Videos->getError()
				); 
				$this->ajaxReturn($msg);
            }
			
            //插入数据库
            if ($id = $Videos->add($data)) {

				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);
                // $this->success('注册成功！', U('Login/login'), 2);
            } else {
				$msg = array(
					'info' => '添加数据失败！'
				);
				$this->ajaxReturn($msg);
                // $this->error('注册失败！');
            }
        } else {
			E('页面不存在');
            //$this->display();
        }
    }

	
	//更改资源数据
	public function videoDetailsEdit($mid=0){
		// 实例化Videos对象
		$Videos   =   M('Videos');
		// 获取前台ID
		$mid = I('get.mid');
		$videoList = $Videos->find($mid);
		$this->assign('video',$videoList);
		// 使用layout控制模板布局
		layout('Layout/layout_inside');		
		$this->display('videoEdit');
	}
	 
	// 更新并保存资源
	public function videoDetailsEditUpdate(){
        // 采用动态完成的方式来解决不同的处理规则
		$rules = array ( 
			//array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
			array('lastdate','time',2,'function'), // 对lastdate字段在更新的时候写入当前时间戳
		);
		
		// 实例化Videos对象
		$Videos   =   M('Videos');
		
		if($Videos->auto($rules)->create()) {
			$result =   $Videos->save();
			if($result) {
				// $this->success('操作成功！');
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);				
			}else{
				$msg = array(
					'info' => '编辑失败，请重新编辑！'
				);
				$this->ajaxReturn($msg);
			}
		}else{
			// $this->error($Videos->getError());
			$msg = array(
				'info' => $this->error($Videos->getError())
			);
			$this->ajaxReturn($msg);
		}
	}

	//删除资源信息数据
	public function videoDetailsDelete($mid=0){
		// 实例化Videos对象
		$Videos   =   M('Videos');
		
		// 获取前台mID的用户数据
		$mid = I('post.mid');

		if ($pass = $Videos->delete($mid)) {
			$msg = array(
				'info' => 'ok',
				'callback' => 'javascript:parent.history.back();' // 删除成功后返回上一页
			);
			$this->ajaxReturn($msg);
		} else {
			$msg = array(
				'info' => '删除数据失败！'
			);
			$this->ajaxReturn($msg);
		}
	}
	
	
}