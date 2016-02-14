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
								<h5>资源添加</h5>
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
								<form class="form-horizontal m-t" id="videoForm" method="post" action="/admin.php/Video/videoAddCheck" enctype="multipart/form-data" novalidate="novalidate">
									<div class="form-group">
										<label class="col-sm-3 control-label">资源名称：</label>
										<div class="col-sm-6 check-box">
											<input id="videoname" class="form-control form-control-video" name="videoname" minlength="2" type="text" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">资源大小：</label>
										<div class="col-sm-6 check-box">
											<input id="size" class="form-control form-control-video" name="size"  type="text" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">是否种子：</label>
										<div class="col-sm-6 check-box">
											<select id="is_seeded" class="form-control form-control-video m-b" name="is_seeded">
												<option value="">---请选择---</option>
												<option value="1">是</option>
												<option value="0">否</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">电影分类：</label>
										<div class="col-sm-6 check-box">
											<select id="kind2" data-placeholder="选择电影分类" class="chosen-select form-control form-control-video m-b" name="kind[]" multiple >
												<option value="JQ" hassubinfo="true">剧情片</option>
												<option value="KF" hassubinfo="true">动作片</option>
												<option value="XY" hassubinfo="true">悬疑片</option>
												<option value="ZZ" hassubinfo="true">战争片</option>
												<option value="JS" hassubinfo="true">惊悚片</option>
												<option value="FZ" hassubinfo="true">犯罪片</option>
												<option value="KH" hassubinfo="true">科幻片</option>
												<option value="AQ" hassubinfo="true">爱情片</option>
												<option value="LL" hassubinfo="true">伦理片</option>
												<option value="KB" hassubinfo="true">恐怖片</option>
												<option value="XJ" hassubinfo="true">喜剧片</option>												
												<option value="DH" hassubinfo="true">动画片</option>												
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">清晰度：</label>
										<div class="col-sm-6 check-box">
											<select id="is_hd" class="form-control form-control-video m-b" name="is_hd">
												<option value="">---请选择---</option>
												<option value="BD">蓝光版</option>
												<option value="HD">高清版</option>
												<option value="DVD">DVD版</option>
												<option value="TC">TC(胶片版)</option>
												<option value="TS">TS(准枪版)</option>
												<option value="CAM">CAM(枪版)</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">语种：</label>
										<div class="col-sm-6 check-box">
											<select id="lang" class="form-control form-control-video m-b" name="lang">
												<option value="">---请选择---</option>
												<option value="CH">国语</option>
												<option value="GD">粤语</option>
												<option value="EG">英语</option>
												<option value="KF">韩语</option>
												<option value="QT">其他</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">地区：</label>
										<div class="col-sm-6 check-box">
											<select id="region" class="form-control form-control-video m-b" name="region">
												<option value="">---请选择---</option>
												<option value="ND">内地</option>
												<option value="GT">港台</option>
												<option value="OM">欧美</option>
												<option value="RH">日韩</option>
												<option value="QT">其他</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">年代：</label>
										<div class="col-sm-6 check-box">
											<select id="age" class="form-control form-control-video m-b" name="age">
												<option value="">---请选择---</option>
												<option value="2015">2015</option>
												<option value="2014">2014</option>
												<option value="2013">2013</option>
												<option value="2013older">2013以前</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">导演：</label>
										<div class="col-sm-6 check-box">
											<input id="director" class="form-control form-control-video" name="director"  type="text" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">主演：</label>
										<div class="col-sm-6 check-box">
											<input id="casts" class="form-control form-control-video" name="casts" type="text" />
										</div>
									</div>																																				
									
									<div class="form-group">
										<label class="col-sm-3 control-label">影片海报：</label>
										<div class="col-sm-6 check-box">
											<input id="poster" class="form-control form-control-video" name="poster" type="file" data-upload-url="/admin.php/Video/posterUpload" />
										</div>
									</div>
	
									<div class="form-group">
										<label class="col-sm-3 control-label">剧情简介：</label>
										<div class="col-sm-9 check-box">
											<textarea id="plot" class="form-control form-control-video" name="plot" rows="4" type="text" ></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">影片截图：</label>
										<div class="col-sm-9 check-box">
											<input id="shotcuts" class="form-control form-control-video file-loading" multiple name="shotcuts[]" type="file" data-upload-url="/admin.php/Video/shotcutsUpload" />
										</div>
									</div>									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">发布者：</label>
										<div class="col-sm-6 check-box">
											<input id="user" class="form-control form-control-video" name="user" />
										</div>
									</div>									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">下载地址：</label>
										<div class="col-sm-6 check-box">
											<input id="link" name="link" class="form-control form-control-video" />
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-3 col-sm-offset-3">
											<button class="btn btn-primary video-btn" type="button">提交</button>
											<a class="btn btn-primary" href="javascript:history.back();">返回</a>											
										</div>
										<!--错误提示-->
										<div class="col-sm-4 err-tips err-display" id="error" ></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<script src="/Public/js/pages/public.js"></script>
				<script src="/Public/js/plugins/layer/layer.min.js"></script>
				
				<!-- 上传组件 -->
				<script src="/Public/js/plugins/fileinput/fileinput.js"></script>
				<script src="/Public/js/plugins/fileinput/fileinput_locale_zh.js"></script>
				
				<script>
					$(document).ready(function(){
						// 多选配置,初始化
						$(".chosen-select").chosen({
							no_results_text: "啊哦，啥都没找到哦！",
							allow_single_deselect:true
						});														
						
						// 图片上传组件配置						
						$("#shotcuts,#poster").fileinput({
							language : 'zh',
							allowedFileTypes : [ 'image' ],
							allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
							maxFileSize : 2000
						});
						
						
						// 保存按钮	
						$(".video-btn").on("click",function(){
							var mark = true;
							// 输入校验
							$(".form-control-video").each(function(){
								var value = $(this).val();
								var id = $(this).prop("id");
								var txt = $(this).parents(".check-box").prev().text().split("：")[0];
								if(isNull(value)) {
									$(this).focus();
									
									//layer插件 tips层-上
									layer.tips("出错啦，\“"+txt+"\”不能为空！", "#"+id, {
										tips: 1
									});
									mark = false; // 设置提交标志为false
									return false; // 跳出循环
								}
							});										
						
							if(!mark) return false; // 跳出函数
												
							var params=$("#videoForm").serialize();
							// 表单提交
							$("#videoForm").submit();
													
						});
						
	
					});
				</script>
			</div>
	<!--页面结束-->	

</body>

</html>