<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>朕乐后台 - 用户管理</title>

    <link rel="shortcut icon" href="/Public/img/favicon.ico"> 
	<!-- 公共样式引用 -->
	<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap-table.min.css">
	<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/Public/css/animate.min.css" />
	
	<!-- 本页样式引用 -->
	<link rel="stylesheet" href="/Public/css/admin/style.min.css" />
	<link rel="stylesheet" href="/Public/css/admin/global.css" />
	<link rel="stylesheet" href="/Public/css/plugins/chosen/chosen.css" />
	<link rel="stylesheet" href="/Public/css/admin/fileinput.css" />
	<!-- <link href="/Public/css/plugins/summernote/summernote.css" rel="stylesheet"> -->
    <!-- <link href="/Public/css/plugins/summernote/summernote-bs3.css" rel="stylesheet"> -->
	
	<!--Bootstrap JS引入-->
	<script src="/Public/js/jquery.min.js"></script>
	<script src="/Public/js/plugins/chosen/chosen.jquery.js"></script>
	<script src="/Public/js/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/js/plugins/bootstrap/js/bootstrap-table.min.js"></script>
	<script src="/Public/js/plugins/bootstrap/js/bootstrap-table-zh-CN.js"></script>
	<script src="/Public/js/content.min.js"></script>
	
	<!--百度ueditor JS引入-->
	<!-- <script type="text/javascript" charset="utf-8" src="/Public/js/plugins/ueditor/ueditor.config.js"></script> -->
	<!-- <script type="text/javascript" charset="utf-8" src="/Public/js/plugins/ueditor/ueditor.all.min.js"> </script> -->
	<!-- <script type="text/javascript" charset="utf-8" src="/Public/js/plugins/ueditor/lang/zh-cn/zh-cn.js"></script> -->
	<base target="_blank">
</head>

<body class="gray-bg">
	<!--页面开始-->	
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="col-sm-8">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h5>编辑</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
										<i class="fa fa-wrench"></i>
									</a>
									<ul class="dropdown-menu dropdown-user">
										<li><a href="#">选项1</a>
										</li>
										<li><a href="#">选项2</a>
										</li>
									</ul>
									<a class="close-link" href="javascript:history.back();">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							
							<div class="ibox-content">
								<form class="form-horizontal m-t" id="muserForm" method="post" action="/admin.php/Index/editUpdate" novalidate="novalidate">
									<!-- 隐藏参数id -->
									<div class="form-group no-display">
										<label class="col-sm-3 control-label">用户ID：</label>
										<div class="col-sm-8">
											<input class="form-control" name="userid" value="<?php echo ($vo["userid"]); ?>" minlength="2" type="hidden" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">用户名：</label>
										<div class="col-sm-8">
											<input id="cusername" class="form-control" name="username" value="<?php echo ($vo["username"]); ?>" minlength="2" type="text" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">密码：</label>
										<div class="col-sm-8">
											<input id="cpassword" class="form-control" name="password" value="" minlength="2" type="text" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">邮箱：</label>
										<div class="col-sm-8">
											<input id="cemail" class="form-control" name="email" value="<?php echo ($vo["email"]); ?>" type="email" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<button class="btn btn-primary edit-btn" type="button">提交</button>
											<a class="btn btn-primary" href="javascript:history.back();">返回</a>
										</div>
										<!--错误提示-->
										<span class="err-tips err-display" id="error" ></span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<script>
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
					
						// 编辑按钮
						$(".edit-btn").on("click",function(){
							var username = $("#cusername").val();
							var email = $("#cemail").val();									
							
							if(isNull(username)){
								errorMsg("请输入用户名！");
								return;
							}
							
							if(isNull(email)){
								errorMsg("请输入邮箱！");
								return;
							}
							
							var pattern=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
							if(!pattern.test(email)){
								errorMsg("邮箱格式不在确！");
								return;
							}
							
							var params=$("#muserForm").serialize();
							var url = "/admin.php/Index/editUpdate";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									//编辑成功后跳到首页
									errorMsg("编辑成功，正在加载...");
									window.location.href = msg.callback;
								}else {
									errorMsg(msg.info);
								}
							});
						});
					});
				</script>
			</div>
	<!--页面结束-->	

</body>

</html>