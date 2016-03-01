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

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {
	
	/* 用户中心首页 */
	public function index() {
		
	}
	
	/* 注册页面 */
	public function register() {
//		if (! C ( 'USER_ALLOW_REGISTER' )) {
//			$this->error ( '注册已关闭' );
//		}

		if (IS_POST) {
			// 实例化User对象
            $User = M('User');
			// 自动验证 创建数据集
			// create方法是对表单提交的POST数据进行自动验证，如果你的数据来源不是表单post
			//$data = getData(); // 通过getData方法获取数据源的（数组）数据
            if (!$data = $User->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
				// 如果创建失败 表示验证没有通过 输出错误提示信息
                // exit($User->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $User->getError()
				); 
//				$this->ajaxReturn($msg);
            }
		
		
			$username = trim ( $username );
			$hasusername = M ( 'User' )->where ( array (
					'username' => $username 
			) )->getfield ( 'uid' );
			
			dump($username);
			dump($hasusername);
			
			/* 测试用户名 */
			if (empty ( $username )) {
//				$this->error ( '用户名不能为空！' );
				$msg['info'] = "用户名不能为空！";
			}else if (!preg_match('/[a-zA-Z0-9_]$/', $username)) {
//				$this->error ( '用户名必须由‘字母’、‘数字’、‘_’组成！' );
				$msg['info'] = "用户名必须由‘字母’、‘数字’、‘_’组成！";
			}else if (strlen ( $username ) > 8) {
//				$this->error ( '用户名长度必须在8个字符以内！' );
				$msg['info'] = "用户名长度必须在8个字符以内！";
			} else if ( $hasusername ) {
//				$this->error ( '该用户名已经存在，请重新填写用户名！' );
				$msg['info'] = "该用户名已经存在，请重新填写用户名！";
			}
			/* 检测密码 */
			if (strlen ( $password ) < 6 || strlen ( $password ) > 8) {
//				$this->error ( '密码长度必须在6-8个字符之间！' );
				$msg['info'] = "密码长度必须在6-8个字符之间！";
			}
			if ($password != $repassword) {
//				$this->error ( '密码和重复密码不一致！' );
				$msg['info'] = "密码和重复密码不一致！";
			}
			/* 测试手机号 */
			// if (! preg_match ( '/^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/', $mobile )) {
			// $this->error ( '手机格式不正确！' );
			// }
//			if (empty($mobile)){
//			    $this->error('手机号码不能为空');
//			}
//			if (strlen ( $mobile ) != 11) {
//				$this->error ( '手机格式不正确！' );
//			}
			
			/* 测试联系人 */
			if (empty ( $nickname )) {
//				$this->error ( '昵称不能为空！' );
				$msg['info'] = "昵称不能为空！";
			}
			/* 测试邮箱 */
			if (empty($email)){
//			    $this->error('邮箱不能为空');
				$msg['info'] = "邮箱不能为空！";
			}
			if (! preg_match ( '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/', $email )) {
//				$this->error ( '邮箱格式不正确！' );
				$msg['info'] = "邮箱格式不正确！";
			}
			
			/* 检测验证码 */
//			if (! check_verify ( $verify )) {
//				$this->error ( '验证码输入错误！' );
//			}
			
			/* 调用注册接口注册用户 */
//			$uid = M ( 'User' )->register ( $username, $password, $email, $mobile, $nickname );
			
			//插入数据库
            if ($id = $User->add($data)) {
                /* 直接注册用户为超级管理员,子用户采用邀请注册的模式,
              	*遂设置公司id等于注册用户id,便于管理公司用户*/
                // $Muser->where("userid = $id")->setField('companyid', $id);
				$msg = array(
					'info' => '恭喜，注册成功！',
					'callback' => U('Index/index')
				);
            } else {
				$msg = array(
					'info' => '注册失败！'
				);
            }
			
//			if ( $uid > 0 ) {
//				// 注册成功
//				
//				$user ['uid'] = $uid;
//				$user ['username'] = $username;
//				
//				M ( 'User' )->autoLogin ( $user );
//				$msg['result'] = 1;
//				$msg['info'] = "恭喜，注册成功！";
////				$this->success ( '恭喜，注册成功！', U ( 'Home/Public/add', array('from'=>3) ) );
//			} else { // 注册失败，显示错误信息
////				$this->error ( $this->showRegError ( $uid ) );
//				$msg['info'] = $this->showRegError ( $uid );
//			}
			
		} else { // 返回错误提示
			$msg['result'] = 0;
			$msg['info'] = "参数错误！";
		}
		// 返回信息
//		echo json_encode($msg);
		// ajax返回信息提示
		$this->ajaxReturn($msg);
	}
	
	/* 注册接口*/
	public function regCheck() {
		// 防止输出中文乱码
		header("Content-type: text/html; charset=utf-8");
		
		if(IS_POST) {// 判断提交方式
		
			// 实例化Login对象
            $User = D('User'); // 静态定义方式因为必须定义模型类，所以只能用D函数实例化模型
            // 自动验证 创建数据集
			// create方法是对表单提交的POST数据进行自动验证，如果你的数据来源不是表单post
			//$data = getData(); // 通过getData方法获取数据源的（数组）数据
            if (!$data = $User->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $User->getError()
				);
				 
				$this->ajaxReturn($msg);
            }
			
			//插入数据库
            if ($id = $User->add($data)) {
                /* 直接注册用户为超级管理员,子用户采用邀请注册的模式,
              	*遂设置公司id等于注册用户id,便于管理公司用户*/
                // $Muser->where("userid = $id")->setField('companyid', $id);
				$msg = array(
					'info' => 'ok',
					'callback' => U('/')
				);
            } else {
				$msg = array(
					'info' => '注册失败！'
				);
            }
			
		}else {
			$msg = array(
                'info' => '非法的请求方式'
            );
        }
		
		// ajax返回信息提示
		$this->ajaxReturn($msg);
//		echo json_encode($msg);
//		dump($msg);
//		trace($msg,"调试");
	}


	/* 登录页面 */
	public function login($username = '', $password = '', $verify = '') {
		if (IS_POST) { // 登录验证
			/* 检测验证码 */
			if (C ( 'WEB_SITE_VERIFY' ) && ! check_verify ( $verify )) {
				$this->error ( '验证码输入错误！' );
			}
			
			/* 调用UC登录接口登录 */
			$dao = D ( 'Common/User' );
			$uid = $dao->login ( $username, $password );
			if (! $uid) { // 登录失败
				$this->error ( $dao->getError () );
				exit ();
			}
			
			$url = Cookie ( '__forward__' );
			if ($url) {
				Cookie ( '__forward__', null );
			} else {
				$url = U ( 'Home/Index/index' );
			}
			
			if (C ( 'DIV_DOMAIN' )) {
				$map ['uid'] = $uid;
				$domain = D ( 'Common/Public' )->where ( $map )->getField ( 'domain' );
				$url = chang_domain ( $url, $domain );
			}
			$this->success ( '登录成功！', $url );
		} else { // 显示登录表单
			if (isMobile ()) {
				// 跳转到手机版的个人空间
				redirect ( addons_url ( 'UserCenter://Wap/userCenter', array (
						'from' => 1 
				) ) );
			}
			$html = 'login';
			$_GET ['from'] == 'store' && $html = 'simple_login';
			
			$this->display ( $html );
		}
	}

	/* 登录接口*/
	public function loginCheck() {
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $User = M('User');
            // 自动验证 创建数据集
			// create方法是对表单提交的POST数据进行自动验证，如果你的数据来源不是表单post
			//$data = getData(); // 通过getData方法获取数据源的（数组）数据
            if (!$data = $User->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
				// 如果创建失败 表示验证没有通过 输出错误提示信息
                // exit($User->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $User->getError()
				); 
				$this->ajaxReturn($msg);
            }
            // 组合查询条件
            // $where = array();
            // $where['username'] = $data['username'];
			
			$username = I('post.username','');
			$psw    = I('post.password','');
			$psw    = md5($psw);
			
			// 查询条件
			$condition  = array(
				'username'   => $username,
				'password' => $psw
			);
			
            // $result = $User->where($where)->field('userid,username,nickname,password,lastdate,lastip')->find();
            $result = $User->where( $condition )->find();
			
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
				
                $User->where($where)->setInc('loginnum');   // 登录次数加 1
                $User->where($where)->save( $info );   // 更新登录时间和登录ip
                // $this->success('登录成功,正跳转至系统首页...', U('Index/index'));
				$msg = array(
					'info' => 'ok',
					'callback' => U('/')
				);
            } else {
                // $this->error('登录失败,用户名或密码不正确!');
				$msg  = array(
                    'info' => '用户名或密码不正确！'
				);
            }
			
        } else {// 判断提交方式
			$msg = array(
                'info' => '非法的请求方式'
            );
        }
		// ajax返回信息提示
		$this->ajaxReturn($msg);
    }
	
	
	/* 退出登录 */
	public function logout() {
		if (is_login ()) {
			D ( 'Common/User' )->logout ();
			
			if (isset ( $_GET ['no_tips'] )) {
				$this->redirect ( 'User/login' );
			}
			$this->redirect ( 'User/login' );
			// $this->success ( '退出成功！', U ( 'User/login' ) );
		} else {
			$this->redirect ( 'User/login' );
		}
	}
	
	/* 验证码，用于登录和注册 */
	public function verify() {
		$verify = new \Think\Verify ();
		$verify->entry ( 1 );
	}
	
	/**
	 * 获取用户注册错误信息
	 *
	 * @param integer $code
	 *        	错误编码
	 * @return string 错误信息
	 */
	private function showRegError($code = 0) {
		switch ($code) {
			case - 1 :
				$error = '用户名长度必须在16个字符以内！';
				break;
			case - 2 :
				$error = '用户名被禁止注册！';
				break;
			case - 3 :
				$error = '用户名被占用！';
				break;
			case - 4 :
				$error = '密码长度必须在6-30个字符之间！';
				break;
			case - 5 :
				$error = '邮箱格式不正确！';
				break;
			case - 6 :
				$error = '邮箱长度必须在1-32个字符之间！';
				break;
			case - 7 :
				$error = '邮箱被禁止注册！';
				break;
			case - 8 :
				$error = '邮箱被占用！';
				break;
			case - 9 :
				$error = '手机格式不正确！';
				break;
			case - 10 :
				$error = '手机被禁止注册！';
				break;
			case - 11 :
				$error = '手机号被占用！';
				break;
			default :
				$error = '未知错误';
		}
		return $error;
	}
	
	/**
	 * 修改密码提交
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function profile() {
		if (! is_login ()) {
			$this->error ( '您还没有登陆', U ( 'User/login' ) );
		}
		if (IS_POST) {
			// 获取参数
			$uid = is_login ();
			$password = I ( 'post.old' );
			$repassword = I ( 'post.repassword' );
			$data ['password'] = I ( 'post.password' );
			empty ( $password ) && $this->error ( '请输入原密码' );
			empty ( $data ['password'] ) && $this->error ( '请输入新密码' );
			empty ( $repassword ) && $this->error ( '请输入确认密码' );
			
			if ($data ['password'] !== $repassword) {
				$this->error ( '您输入的新密码与确认密码不一致' );
			}
			$isUser=get_userinfo($uid,'manager_id');
			if ($isUser){
			    $data['login_password']=$data ['password'];
			}
			$res = D ( 'Common/User' )->updateUserFields ( $uid, $password, $data );
			if ($res !== false) {
				$this->success ( '修改密码成功！' );
			} else {
				$this->error ( '修改密码失败！' );
			}
		} else {
			$this->display ();
		}
	}
	
}
