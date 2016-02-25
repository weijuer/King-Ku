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
* Class LoginController
* @package Admin\Controller\HomeController
*/

class LoginController extends Controller {

    /**
     * 用户登录
     */
	public function login() {
		// 不带任何参数 自动定位当前操作的模板文件
		$this->display();
	}
	 
	 
	/**
     * 用户登录校验
     */
	 
    public function loginCheck()
    {
		
		//($_POST);
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $Muser = M('Musers');
            // 自动验证 创建数据集
			// create方法是对表单提交的POST数据进行自动验证，如果你的数据来源不是表单post
			//$data = getData(); // 通过getData方法获取数据源的（数组）数据
            if (!$data = $Muser->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
				// 如果创建失败 表示验证没有通过 输出错误提示信息
                // exit($User->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $Muser->getError()
				); 
				$this->ajaxReturn($msg);
            }
            // 组合查询条件
            // $where = array();
            // $where['username'] = $data['username'];
			
			$username = I('post.username','');
			$psw    = I('post.password','');
			$psw    = md5($psw);
			
			$condition  = array(
				'username'   => $username,
				'password' => $psw
			);
			
            // $result = $User->where($where)->field('userid,username,nickname,password,lastdate,lastip')->find();
            $result = $Muser->where($condition )->find();
			
			// 验证用户名 对比 密码
			// if ($result && $result['password'] == $result['password']) {
            if ($result) {
                // 存储session
                session('userid', $result['userid']);          // 当前用户id
                session('username', $result['username']);   // 当前用户名
                // 更新用户登录信息
				$info['lastip']  = get_client_ip();  // 更新登录ip
				$info['lastdate'] = time(); //更新登录时间
				
				// 查询条件
                $where['userid'] = session('userid'); 
				
                $Muser->where($where)->setInc('loginnum');   // 登录次数加 1
                $Muser->where($where)->save($info);   // 更新登录时间和登录ip
                // $this->success('登录成功,正跳转至系统首页...', U('Index/index'));
				$msg = array(
					'info' => 'ok',
					'callback' => U('Admin/Index/index')
				);
            } else {
                // $this->error('登录失败,用户名或密码不正确!');
				$msg  = array(
                    'info' => '用户名或密码不正确！'
				);
            }
			
			$this->ajaxReturn($msg);
        } else {
			// 判断提交方式
			// $this->ajaxReturn(array(
                // 'info' => '非法的请求方式'
            // ));
			$msg = array(
                'info' => '非法的请求方式'
            );
			$this->ajaxReturn($msg);
            // $this->display();
        }
    }
		
    /**
     * 用户注册
     */
	 
	public function register() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_login');
		$this->display();
	} 
	 
	/**
     * 用户注册校验
     */ 
	 
    public function checkRegister()
    {
        // 判断提交方式 做不同处理
        if (IS_POST) {
            // 实例化User对象
            $Muser = D('Musers');
            // 自动验证 创建数据集
            if (!$data = $Muser->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                // exit($user->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $Muser->getError()
				); 
				$this->ajaxReturn($msg);
            }
			
            //插入数据库
            if ($id = $Muser->add($data)) {
                /* 直接注册用户为超级管理员,子用户采用邀请注册的模式,
                   遂设置公司id等于注册用户id,便于管理公司用户*/
                // $Muser->where("userid = $id")->setField('companyid', $id);
				$msg = array(
					'info' => 'ok',
					'callback' => U('Index/index')
				);
				$this->ajaxReturn($msg);
                // $this->success('注册成功！', U('Login/login'), 2);
            } else {
				$msg = array(
					'info' => '注册失败！'
				);
				$this->ajaxReturn($msg);
                // $this->error('注册失败！');
            }
        } else {
			E('页面不存在');
            //$this->display();
        }
    }
	
    /**
     * 用户注销
     */
    public function logout()
    {
        // 清除所有session
        session(null);
        redirect(U('Login/login'));
    }
	
    /**
     * 验证码
     */
    public function verify() {
        // 实例化Verify对象
        $verify = new \Think\Verify();
        // 配置验证码参数
        $verify->fontSize = 14;     // 验证码字体大小
        $verify->length = 4;        // 验证码位数
        $verify->imageH = 34;       // 验证码高度
        $verify->useImgBg = false;   // 开启验证码背景
        $verify->useNoise = false;  // 关闭验证码干扰杂点
		$verify->bg = array(233, 251, 254);  // 背景颜色
        $verify->entry();
    }

    /**
     * 上传头像
     */
	public function upload(){
		//传入参数数组
		$config = array(
			'maxSize'    =>    3145728,// 设置附件上传大小
			'rootPath'   =>    'Public/headImg/',// 设置附件上传根目录
			'savePath'   =>    '',// 设置附件上传（子）目录
			'saveName'   =>    array('date','YmdHms'),//上传文件的命名规则
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
			'autoSub'    =>    false, //自动使用子目录保存上传文件 默认为true
			'replace'    =>    true, //存在同名文件是否是覆盖
			//'subName'    =>    array('date','Ymd'),
		);
		
		$upload = new \Think\Upload($config);// 实例化上传类
		
		// 上传文件 
		$info   =   $upload->uploadOne($_FILES['headpic']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			$this->success('上传成功！');		
			//更新上传信息保存到当前用户数据表
			$User = M('Users');//实例化Users对象
			dump($info);

			//头像保存信息分割
			// $data['headpic'] = explode('.',$info['savename'])[0];
			$data['headpic'] = $info['savename'];
			dump($data);
			$where['userid'] = session('uid');

			$User->where($where)->save($data);
		}
	}

 }