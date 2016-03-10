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

class UserController extends HomeController {
	
	// 后台首页展示
    public function index(){
		$time = time();
		$this->assign('today',$time);// 当前时间赋值
				
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout');
		$this->display();
	}
	
	//附v1首页显示
	public function index_v1(){
		
		// 不带任何参数 自动定位当前操作的模板文件
		$this->display();
	}
	
	//邮箱页显示
	public function mailbox(){
		
		// 不带任何参数 自动定位当前操作的模板文件
		$this->display();
	}    
		
	// 用户管理
	public function userAdmin(){
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();
	} 
	
		
	// 添加单条数据
	public function userAdd() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();		
	}
	
	// 添加数据验证
	public function addCheck() {
        // 判断提交方式 做不同处理
        if (IS_POST) {
			// 采用动态完成的方式来解决不同的处理规则
			$rules = array ( 
				array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
				array('regdate', 'time', 1, 'function'), // 对regdate字段在新增的时候写入当前时间戳
				array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
			);
			
			// 实例化User对象
			$User   =   M('User'); 
            // 自动验证 创建数据集
            if (!$data = $User->auto($rules)->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                // exit($user->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $User->getError()
				); 
				$this->ajaxReturn($msg);
            }
            //插入数据库
            if ($id = $User->add($data)) {
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);
            } else {
				$msg = array(
					'info' => '添加数据失败！'
				);
				$this->ajaxReturn($msg);
            }
        } else {
			E('页面不存在');
        }
    }		
	
	
	//读取管理员数据
	public function userRead(){
		// 实例化User对象
		$User   =   M('User'); 
		
		// 定义查询条件
		$condition['order'] = I('post.order','');
		// $condition['_logic'] = 'OR'; //默认逻辑关系是 逻辑与 AND
		// 读取数据		
		$data = $User->where($condition)->select();
		$this->ajaxReturn($data,'json');
	}

	 
	//更改管理员数据
	public function userEdit($uid=0){
        // 实例化User对象
        $User = M('User');
		// 获取前台ID
		$uid = I('get.uid');
		$this->assign('vo',$User->find($uid));
		// 使用layout控制模板布局
		layout('Layout/layout_inside');		
		$this->display('userEdit');
	}
	 
	 // 更新并保存
	 public function editUpdate(){
        // 采用动态完成的方式来解决不同的处理规则
		$rules = array ( 
			array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
			// array('regdate','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
		);
		
		// 实例化Muser对象
        $User = M('User');
		
		if($User->auto($rules)->create()) {
			$result =   $User->save();
			if($result) {
				// $this->success('操作成功！');
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);				
			}else{
				// $this->error('写入错误！');
				$msg = array(
					'info' => '编辑失败，请重新编辑！'
				);
				$this->ajaxReturn($msg);
			}
		}else{
			// $this->error($User->getError());
			$msg = array(
				'info' => $this->error($User->getError())
			);
			$this->ajaxReturn($msg);
		}
	}
	
	//删除管理员数据
	public function userDelete($uid=0){
        // 实例化User对象
        $User = M('User');
		// 获取前台uid的用户数据
		$uid = I('post.uid');
		// $User->where($uid)->delete();
		if ($pass = $User->delete($uid)) {
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