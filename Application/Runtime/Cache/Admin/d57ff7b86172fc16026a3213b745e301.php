<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>朕乐视频-后台</title>
		<!--Bootstrap CSS引入-->
		<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap-table.min.css">
		
		<!--本页 公共CSS引入-->
		<link rel="stylesheet" href="/Public/css/animate.min.css" />
		<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/Public/css/admin/global.css" />
		<link rel="stylesheet" href="/Public/css/admin/style.min.css" />
		
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/plugins/layer/layer.min.js"></script>
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

				<div class="content">
					<!--注册方式切换开始-->
					<div class="form-tab">
						<h2 class="title"><a href="http://www.weijuer.com">欢迎使用朕乐视频！</a></h2>  
						<div class="form-tab-content reg-box">
							<h3>
								用户注册
								<!--错误提示-->
								<span class="err-tips err-display" id="error" ></span>
							</h3>
							<div class="reg-form">
								<!--邮箱注册注册开始-->
								<form id="regEmailForm" method="post" action="/admin.php/Login/checkRegister">				
									<ul class="content-body reg-form-content">
										<li class="reset-li">
											<label for="email" class="label">邮箱：</label>
											<input id="email" class="common-input" type="text" autocomplete="off" name="email" maxlength="15" placeholder="输入您的邮箱："/> 
										</li>
										<li class="reset-li">
											<label for="verify" class="label">验证码：</label>
											<input id="verify" class="common-input verify-input verify-pic" value="" maxlength="6" type="tel" name="verify" placeholder="验证码："/>
											<img class="verify" src="<?php echo U(verify);?>" alt="验证码" onClick="this.src=this.src+'?'+Math.random()" />
										</li>
										<li class="reset-li">
											<label for="username" class="label">用户名：</label>
											<input id="username" class="common-input" type="text" name="username" maxlength="10" placeholder="输入用户名："/> 
										</li>
										<li class="reset-li">
											<label for="password" class="label">密码：</label>
											<input id="password" class="common-input" type="password" name="password" maxlength="12" placeholder="设置密码："/> 
										</li>
										<li class="reset-li">
											<label for="rePassword" class="label">确认密码：</label>
											<input id="rePassword" class="common-input" type="password" name="repassword" maxlength="12" placeholder="确认密码："/> 
										</li>
										<li class="reset-li">
											<div class="terms-box to-left">
												<input id="terms" type="checkbox" checked="checked" name="agree" value="1" />
												<label class="check-terms" for="terms"></label> 								
												我已阅读并同意
												<a class="terms-link" href="RegisterProvision.html">《用户使用协议》</a>
											</div>								
										</li>
										<li class="btn-box">
											<button class="btn green-btn next-btn email-btn" type="button">注册</button>
											<!--错误提示-->
											<!--<span class="err-tips err-display" id="error" ></span>-->
										</li>
									</ul>
								</form>
								<!--邮箱注册结束-->
							</div>
						</div>
					</div>
					<!--注册方式切换结束-->
					
					<!--返回首页按钮-->
					<div class="back-home-box">
						<a href="<?php echo U('Home/Index/index');?>" class="back-home"></a>
					</div>
				</div>
				
				<script type="text/javascript">
					$(document).ready(function(){
					
						//判空
						function isNull(parame){
							if(parame == "" || parame == null){
								return true;
							}
							return false;
						}

						//检查输入字符串是否符合正整数格式
						function isNumber( s ){   
							var reg = /^[0-9]+$/; 
							if(!reg.test( s )){
								return true;
							}
							return false;
						}

						//错误提示
						function errorMsg(msg){
							$(".err-tips").fadeIn("slow").text(msg).fadeOut(3000);
						}
						
						//获取短信验证码
						function getCheckCode(){				
							var mobile = $("#mobile").val();				
							if(isNull(mobile)){
								 errorMsg("手机号为空！");	
								return;
							}
							
							var params="mobile="+mobile;
							var url1 = "user_getCheckCode.action?";
							$.post(url1,params,function(meg){
									 
								if(meg=="0"){
									errorMsg("验证码发送成功,请注意查收！");	
								}
							});
						}
						
						// 注册方式切换
						$(".form-tab-nav li a").on("click",function(){
							var tabLi = $(this).parents("li");
							tabLi.addClass("tab-current");
							tabLi.siblings().removeClass("tab-current");
							
							if($(this).text()=="邮箱注册"){
								$("#regMobileForm").addClass("no-display");
								$("#regEmailForm").removeClass("no-display");
							}else {
								$("#regMobileForm").removeClass("no-display");
								$("#regEmailForm").addClass("no-display");
							}
						});
						
						// 手机注册登录按钮
						$(".mobile-btn").on("click",function(){
							var mobile = $("#mobile").val();
							var verifyCode = $("#verifyCode").val();
							var username = $("#username").val();
							var psw = $("#password").val();
							var repsw = $("#rePassword").val();
							
							if(isNull(mobile)){
								errorMsg("手机号不能为空！");
								return;
							}
							
							var reg=/^0?1[3|4|5|7|8][0-9]\d{8}$/;
							if(!reg.test(mobile)){
								errorMsg("请输入正确的手机格式！");
								return;
							}			

							if(isNull(verifyCode)){
								errorMsg("请输入验证码！");
								return;
							}
							
							if(isNull(username)){
								errorMsg("请输入昵称！");
								return;
							}
							
							if(isNull(psw)){
								errorMsg("请输入密码！");
								return;
							}
							
							var pattern=/^([a-zA-Z0-9@_*#]{6,22})$/;
							if(!pattern.test(psw)){
								errorMsg("密码格式不在确！");
								return;
							}
							
							if(isNull(repsw)){
								errorMsg("请再次确认密码！");
								return;
							}
							if(repsw != psw){
								errorMsg("两次密码输入不一致！");
								return;
							}
							
							var params=$("#regMobileForm").serialize();
							var url = "checkRegister";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									//登录后跳到登录页面，否则直接进入首页
									errorMsg("注册成功，正在加载...");
									window.location.href = msg.callback;
								}else {
									errorMsg(msg.info);
								}
							});
						});	
						
						//邮箱注册按钮
						$(".email-btn").on("click",function(){
							var email = $("#email").val();
							var verify = $("#verify").val();
							var username = $("#username").val();
							var psw = $("#password").val();
							var repsw = $("#rePassword").val();
							
							if(isNull(email)){
								errorMsg("邮箱不能为空！");
								return;
							}
							
							var reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
							if(!reg.test(email)){
								errorMsg("请输入正确的邮箱格式！");
								return;
							}			

							if(isNull(verify)){
								errorMsg("请输入验证码！");
								return;
							}
							
							if(isNull(username)){
								errorMsg("请输入用户名！");
								return;
							}
							
							if(isNull(psw)){
								errorMsg("请输入密码！");
								return;
							}
							
							var pattern=/^([a-zA-Z0-9@_*#]{6,22})$/;
							if(!pattern.test(psw)){
								errorMsg("密码格式不在确！");
								return;
							}
							
							if(isNull(repsw)){
								errorMsg("请再次确认密码！");
								return;
							}
							if(repsw != psw){
								errorMsg("两次密码输入不一致！");
								return;
							}
							
							var params=$("#regEmailForm").serialize();
							var url = "checkRegister";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									//登录后跳到登录页面，否则直接进入首页
									errorMsg("注册成功，正在加载...");
									window.location.href = msg.callback;
								}else {
									errorMsg(msg.info);
								}
							});
						});

					});
					
				</script>
		</div>
		<!--主体内容结束-->
  		
		<!--页面底部信息-->
		<div class="page-footer">
			<p>Copyright ©2015 <b>朕乐视频 <a href="www.weijuer.com">weijuer.com</a></b> All Rights Reversed. </p>
			<p>备案号：苏ICP备15011477号 版权所有 维权必究</p>
		</div>
		
	</div>
	<!--页面结束--> 	
		<!--Bootstrap JS引入-->
		<script src="/Public/js/plugins/bootstrap/js/bootstrap.min.js"></script>			
		<script src="/Public/js/pages/public.js"></script>
		<script>
		
		</script>
	</body>
</html>