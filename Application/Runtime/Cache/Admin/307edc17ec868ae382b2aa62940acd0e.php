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
								<h5>添加</h5>
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="close-link" href="javascript:history.back();">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							
							<div class="ibox-content">
								<form class="form-horizontal m-t" id="muserForm" method="post" action="/admin.php/Index/addCheck" novalidate="novalidate">
									<div class="form-group">
										<label class="col-sm-3 control-label">昵称：</label>
										<div class="col-sm-8">
											<input id="username" name="username" minlength="2" type="text" class="form-control" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">邮箱：</label>
										<div class="col-sm-8">
											<input id="email" type="email" class="form-control" name="email" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">密码：</label>
										<div class="col-sm-8">
											<input id="password" type="text" class="form-control" name="password" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-3">
											<button class="btn btn-primary add-btn" type="button">提交</button>
											<a class="btn btn-primary" href="javascript:parent.history.back();">返回</a>
											<!--错误提示-->
											<span class="err-tips err-display" id="error" ></span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<script src="/Public/js/pages/public.js"></script>
				<script src="/Public/js/plugins/layer/layer.min.js"></script>
				<script>
					$(document).ready(function(){
		
						$(".add-btn").on("click",function(){
							var username = $("#username").val();
							var email = $("#email").val();
							var password = $("#password").val();
							
							if(isNull(username)){
								//tips层-上
								layer.tips("出错啦，昵称不能为空！", "#username", {
									tips: 1
								});
								return;
							}
							
							if(isNull(email)){
								//tips层-上
								layer.tips("出错啦，邮箱不能为空！", "#email", {
									tips: 1
								});
								return;
							}
							
							var pattern=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
							if(!pattern.test(email)){
								//tips层-上
								layer.tips("出错啦，邮箱格式不在确！", "#email", {
									tips: 1
								});
								return;
							}
							
							if(isNull(password)){
								//tips层-上
								layer.tips("出错啦，密码不能为空！", "#password", {
									tips: 1
								});
								return;
							}							
							
							var params=$("#muserForm").serialize();
							var url = "/admin.php/Index/addCheck";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									//新增成功后返回上一页
									errorMsg("新增成功，正在加载...");
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