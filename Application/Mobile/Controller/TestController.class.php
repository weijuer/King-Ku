<?php
namespace Mobile\Controller;
use Think\Controller;
class TestController extends Controller {

	/**
     * 用户注册校验
     */ 
    public function checkRegister() {
		//启用CORS，解决跨域问题
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json; charset=utf-8");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With");
        
		// 判断提交方式 做不同处理
        if (!IS_POST) {
			$res['result']=0;
			$res['info']="参数错误！";
		}else {
			$data['username'] = I('post.username');
			$data['phone'] = I('post.phone');
			$data['code'] = I('post.code');
			$data['address'] = I('post.address');
			$findmess['username'] = I('post.username');
			$Test = M('Tester')->where($findmess)->find();
			
			if ($Test) {
				//User exists
				$res['result']=0;
				$res['info']="用户已存在！";
			}else{
				//No user exists
				$addres = M('Tester')->add($data);
				$res['result']=1;
				$res['info']="用户创建成功！";
			}
		}
		echo json_encode($res);
    }
	
	/**
     * 用户登录校验
     */ 
	public function checkLogin() {
		//启用CORS，解决跨域问题
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json; charset=utf-8");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With");
        
		if ($_SESSION['phone']) {
			$res['result']=1;
			$res['info']="您已经登录！";
		}else{
			if (!$_POST['phone']) {
				$res['result'] = 0;
				$res['info'] = "参数错误！";
			}else{
				$data['phone']=I('post.phone');
//				$data['password']=I('post.password');
				$mess = M('Tester')->where($data)->find();
				if ($mess) {
					$res['result'] = 1;
					$res['info'] = "登录成功！";
					$_SESSION = $mess;
				}else{
					$res['result'] = 0;
					$res['info'] = "账号或密码错误！";
				}
			}
		}
		echo json_encode($res);
	}
	
	
	/**
     * 用户注销
     */ 
	public function logout() {
		//启用CORS，解决跨域问题
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json; charset=utf-8");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With");
        
		session_destroy();
		$res['result']=1;
		$res['info']="您已经注销！";
		echo json_encode($res);
	}
	
	
}