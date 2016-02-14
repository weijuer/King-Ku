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
								<h5>资源编辑</h5>
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
								<form class="form-horizontal m-t" id="videoForm" method="post" action="/admin.php/Video/videoEditUpdate" enctype="multipart/form-data" novalidate="novalidate">
									<!-- 隐藏参数mid -->
									<div class="form-group no-display">
										<label class="col-sm-3 control-label">资源MID：</label>
										<div class="col-sm-8">
											<input name="vid" value="<?php echo ($video["vid"]); ?>" minlength="2" type="hidden">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">资源名称：</label>
										<div class="col-sm-6">
											<input id="moviename" class="form-control form-control-video" name="moviename" value="<?php echo ($video["videoname"]); ?>" minlength="3" type="text" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">资源大小：</label>
										<div class="col-sm-6">
											<input id="size" class="form-control form-control-video" name="size" value="<?php echo ($video["size"]); ?>" type="text" />
										</div>
									</div>									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">电影分类：</label>
										<div class="col-sm-6">
											<select id="kind2" data-placeholder="选择电影分类" class="chosen-select form-control form-control-video m-b" name="kind" multiple >
												<?php if(is_array($arrList['kindList'])): foreach($arrList['kindList'] as $list_key=>$list_vo): if(is_array($video["kind"])): foreach($video["kind"] as $key=>$vo): if($vo == $list_key ): ?><option value="<?php echo ($list_key); ?>" selected hassubinfo="true"><?php echo ($list_vo); ?></option><?php endif; endforeach; endif; ?>
													<option value="<?php echo ($list_key); ?>" hassubinfo="true"><?php echo ($list_vo); ?></option><?php endforeach; endif; ?>																								
											</select>
										</div>
									</div>									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">是否种子：</label>
										<div class="col-sm-6">
											<select id="is_seeded" class="form-control form-control-video m-b" name="is_seeded">
												<option value="">---请选择---</option>
												<?php if(is_array($arrList['is_seededList'])): foreach($arrList['is_seededList'] as $key=>$vo): if(($key) == "video.is_seeded"): ?><option value='<?php echo ($key); ?>' selected><?php echo ($vo); ?></option>
													<?php else: ?>
														<option value='<?php echo ($key); ?>'><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">清晰度：</label>
										<div class="col-sm-6">
											<select id="is_hd" class="form-control form-control-video m-b" name="is_hd">
												<option value="">---请选择---</option>
												<?php if(is_array($arrList['is_hdList'])): foreach($arrList['is_hdList'] as $key=>$vo): if(($key) == $video["is_hd"]): ?><option value='<?php echo ($key); ?>' selected><?php echo ($vo); ?></option>
													<?php else: ?>
														<option value='<?php echo ($key); ?>'><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">语种：</label>
										<div class="col-sm-6">
											<select id="lang" class="form-control form-control-video m-b" name="lang">
												<option value="">---请选择---</option>
												<?php if(is_array($arrList['langList'])): foreach($arrList['langList'] as $key=>$vo): if(($key) == $video["lang"]): ?><option value='<?php echo ($key); ?>' selected><?php echo ($vo); ?></option>
													<?php else: ?>
														<option value='<?php echo ($key); ?>'><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">地区：</label>
										<div class="col-sm-6">
											<select id="region" class="form-control form-control-video m-b" name="region">
												<option value="">---请选择---</option>
												<?php if(is_array($arrList['regionList'])): foreach($arrList['regionList'] as $key=>$vo): if(($key) == $video["region"]): ?><option value='<?php echo ($key); ?>' selected><?php echo ($vo); ?></option>
													<?php else: ?>
														<option value='<?php echo ($key); ?>'><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">年代：</label>
										<div class="col-sm-6">
											<select id="age" class="form-control form-control-video m-b" name="age">
												<option value="">---请选择---</option>
												<?php if(is_array($arrList['ageList'])): foreach($arrList['ageList'] as $key=>$vo): if(($key) == $video["age"]): ?><option value='<?php echo ($key); ?>' selected><?php echo ($vo); ?></option>
													<?php else: ?>
														<option value='<?php echo ($key); ?>'><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">导演：</label>
										<div class="col-sm-6">
											<input id="director" class="form-control form-control-video" value="<?php echo ($video["director"]); ?>" name="director"  type="text" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">主演：</label>
										<div class="col-sm-6">
											<input id="casts" class="form-control form-control-video" value="<?php echo ($video["casts"]); ?>" name="casts"  type="text" />
										</div>
									</div>																											
	
									<div class="form-group">
										<label class="col-sm-3 control-label">影片海报：</label>
										<div class="col-sm-6">
											<input id="poster" class="form-control form-control-video file-loading" name="poster" type="file" accept="image/*" value="<?php echo ($video["poster"]); ?>" data-upload-url="/admin.php/Video/posterUpload" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">剧情简介：</label>
										<div class="col-sm-9">
											<textarea id="plot" class="form-control form-control-video" name="plot" rows="4" type="text" ><?php echo ($video["plot"]); ?></textarea>
										</div>
									</div>									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">影片截图：</label>
										<div class="col-sm-9">
											<input id="shotcuts" class="form-control form-control-video file-loading" name="shotcuts[]" multiple type="file" accept="image/*" value="<?php echo ($video["shotcuts"]); ?>" data-upload-url="/admin.php/Video/shotcutsUpload"/>
										</div>
									</div>
									
									<!--<div class="form-group summernote-box">
										<div class="col-sm-3 control-label-box">
											<label class="control-label">影片截图：</label> <br />
											<input id="videoImgs" name="video_imgs" class="form-control form-control-video" type="hidden" />
											<div class="btn-group m-t-sm">
												<button id="edit" class="btn btn-primary btn-xs m-l-sm" type="button">编辑</button>
												<button id="save" class="btn btn-primary  btn-xs" type="button">保存</button>
											</div>
										</div>
										<div class="col-sm-6 summernote">
											<?php echo ($video["video_imgs"]); ?>
										</div>
									</div>-->
									
									<div class="form-group">
										<label class="col-sm-3 control-label">发布者：</label>
										<div class="col-sm-6">
											<input id="user" class="form-control form-control-video" name="user" value="<?php echo ($video["user"]); ?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">下载地址：</label>
										<div class="col-sm-6">
											<input id="link" name="link" class="form-control form-control-video" value="<?php echo ($video["link"]); ?>" />
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
						
						// 页面加载时，设置已选图片
						var shotcutsImgName = $("#shotcuts").attr("value");
						var posterImgName = $("#poster").attr("value");
						$("#shotcuts").fileinput({
							showUpload : true,
							language : 'zh',
							uploadAsync: true,
							maxFileCount: 5,
							allowedFileTypes : [ 'image' ],
							allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
							maxFileSize : 2000,
							initialPreview : [ // 预览图片的设置
							"<img src='/Public/images/shotcuts/" + shotcutsImgName + "' class='file-preview-image'>", ],
							initialPreviewConfig: [
								{caption: shotcutsImgName, width: "120px", url: "/admin.php/Video/shotcutsDelete", key: 1}, 
							],
							uploadExtraData: {
								img_key: "1000",
								img_keywords: "happy, people",
							}
						});
								
						$("#poster").fileinput({
							showUpload : true,
							language : 'zh',
							uploadAsync: true,
							maxFileCount: 5,
							allowedFileTypes : [ 'image' ],
							allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
							maxFileSize : 2000,
							initialPreview : [ // 预览图片的设置
							"<img src='/Public/images/poster/" + posterImgName + "' class='file-preview-image'>", ],
							initialPreviewConfig: [
								{caption: posterImgName, width: "120px", url: "/admin.php/Video/posterDelete", key: 1}, 
							],
							uploadExtraData: {
								img_key: "1000",
								img_keywords: "happy, people",
							}
						});
	
						// 保存按钮
						$(".video-btn").on("click",function(){
							
							var mark = true;
							// 输入校验
							$(".form-control-video").each(function(){
								var value = $(this).val();
								var id = $(this).prop("id");
								var txt = $(this).parents(".col-sm-6,.col-sm-9").prev().text().split("：")[0];
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
							var url = "/admin.php/Video/videoEditUpdate";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									//新增成功后跳到首页
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