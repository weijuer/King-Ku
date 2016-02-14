<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>朕乐视频-后台登录</title>
		<!--Bootstrap CSS引入-->
		<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap.min.css">
		
		<!--本页 公共CSS引入-->
		<link rel="stylesheet" href="/Public/css/animate.min.css" />
		<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/Public/css/admin/global.css" />
		<link rel="stylesheet" href="/Public/css/admin/style.min.css" />
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--页面开始-->
		<div class="container">
			<!--头部信息-->
			<div class="page-header">
				<div class="header">
					<h2>朕乐视频后台管理系统</h2>
				</div>		
			</div>

			<!--主体内容开始-->
			<div class="page-content">
				<div class="sub-body">
					<div class="form-tab">
					<h2 class="title"><a href="http://www.weijuer.com">欢迎使用朕乐视频！</a></h2>               
						<div class="form-tab-content login-box">
							<h3>
								用户登录
								<!--错误提示-->
								<span class="err-tips err-display" id="error" ></span>
							</h3>
							<div class="login-form">
								<form id="LoginForm" name="LoginForm" method="post" action="/admin.php/Login/loginCheck" >
									<p>
										<label for="username" >用户名：</label>
										<input id="username" class="common-input" name="username" type="text" placeholder="用户名" />
										<span class="extra-tips">*</span>
									</p>
									<p>
										<label for="password" >密 码：</label>
										<input id="password" class="common-input" name="password" type="password" placeholder="密 码" />
										<span class="extra-tips">*</span>
									</p>
									<div class="form-btn">
										<input type="button" value="确 定" class="btn green-btn login-btn" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--主体内容结束-->
			
			<!--页面底部信息-->
			<div class="page-footer">
				<p>Copyright ©2015 <b>朕乐视频 <a href="www.weijuer.com">weijuer.com</a></b> All Rights Reversed. </p>
				<p>备案号：苏ICP备15011477号 版权所有 维权必究</p>
			</div>
			
		</div>
		
		<!--Bootstrap JS引入-->
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/plugins/layer/layer.min.js"></script>
		<script src="/Public/js/plugins/bootstrap/js/bootstrap.min.js"></script>			
		<script src="/Public/js/pages/public.js"></script>
		<script>
					
			$(document).ready(function(){				
				
				// 登录按钮
				$(".login-btn").on("click",function(){
					var username = $("#username").val();
					var psw = $("#password").val();									
					
					if(isNull(username)){
						// errorMsg("请输入用户名！");
						//layer插件 tips层-上
						layer.tips("出错啦，用户名不能为空！", "#username", {
							tips: 1
						});
						return;
					}
					
					if(isNull(psw)){
						// errorMsg("请输入密码！");
						//layer插件 tips层-上
						layer.tips("出错啦，密码不能为空！", "#password", {
							tips: 1
						});
						return;
					}
					
					var pattern=/^([a-zA-Z0-9@_*#]{6,22})$/;
					if(!pattern.test(psw)){
						// errorMsg("密码格式不在确！");
						//layer插件 tips层-上
						layer.tips("出错啦，密码格式不在确！", "#password", {
							tips: 1
						});
						return;
					}
					
					var params=$("#LoginForm").serialize();
					var url = "/admin.php/Login/loginCheck";
					$.post(url,params,function(msg){
						if(msg.info == 'ok'){
							//登录后跳到登录页面，否则直接进入首页
							layer.msg("登录成功，正在加载...", {icon: 16});
							setTimeout(function(){
								window.location.href = msg.callback;
							}, 2000);
						}else {
							// errorMsg(msg.info);
							//正上方
							layer.msg(msg.info, {
								offset: ['220px', '45%'],
								shift: 6
							});
						}
					});
				});	
			});	
		</script>
	</body>
</html>