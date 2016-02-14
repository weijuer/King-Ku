<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>朕乐视频-资源详情《<?php echo ((isset($videoList["videoname"]) && ($videoList["videoname"] !== ""))?($videoList["videoname"]):"资源详情"); ?>》</title>
		<meta name="keywords" content="电影下载,最新电影,电影天堂,朕乐视频,迅雷种子,电影网,高清电影下载,电影网站,weijuer.com<?php echo C('WEB_SITE_KEYWORD');?>" />
		<meta name="description" content="朕乐视频网－最新电影,定期搜集全网最新迅雷免费电影下载。为广大电影的爱好者提供最新的免费电影下载、高清电影下载；好听的音乐试听、下载等服务。<?php echo C('WEB_SITE_DESCRIPTION');?>"/>
		
		<!--网页标签-->
		<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
		<link rel="shortcut icon" href="/Public/img/favicon.ico">
		<link rel="Bookmark" href="/Public/img/favicon.ico" />
		
		<!--Bootstrap CSS引入-->
		<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap-table.min.css">
		
		<!--本页 公共CSS引入-->
		<link rel="stylesheet" href="/Public/css/jquery.smarticker.css" />
		<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/Public/css/animate.min.css" />
		<link rel="stylesheet" href="/Public/css/home/banner.css" />
		<link rel="stylesheet" href="/Public/css/home/global.css" />
		<link rel="stylesheet" href="/Public/css/home/style.min.css" />
		
		<!-- 本页JS引入 -->
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
		<![endif]-->
	</head>
<body>
	<!-- 头部 -->
	<div class="page-header">
		<!-- 顶部导航栏开始 -->
		<nav class="navbar navbar-fixed-top" role="navigation">
		    <div class="navbar-container">
		        <div class="navbar-header-top">
					<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button> -->
					<a class="navbar-brand" href="http://www.thinkphp.com/"><img src="/Public/img/logo.png" alt="朕乐视频logo" /></a>
		        </div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="menu" class="nav navbar-nav nav-tab">
						<li class=""><a href="http://www.thinkphp.com/" >首 页</a></li>
						<!--<li><a href="javascript:void(0);">热门视频</a>
							<ul>
								<li> <a href="javascript:void(0);">热门推荐</a>
									<ul>
										<li><a href="">搞笑综艺</a></li>
										<li><a href="">感人视频</a></li>
										<li><a href="">新闻事件</a></li>
									</ul>
								</li>
								<li> <a href="javascript:void(0);">周边趣事</a>
									<ul>
										<li><a href="">我的周边</a></li>
										<li><a href="">海外趣谈</a></li>
										<li><a href="">娱乐八卦</a></li>
									</ul>
								</li>
							</ul>
						</li>-->
						<li> <a href="<?php echo U('/videoList');?>">电 影</a>
							<ul>
								<li> <a href="javascript:void(0);">朕乐影院</a>
									<ul>
										<li> <a href="javascript:void(0);">朕乐独家</a>
											<ul>
												<li><a href="">优酷会员</a></li>
												<li><a href="">搜狐会员</a></li>
												<li><a href="">爱奇艺会员</a></li>
												<li><a href="">百度网盘</a></li>
											</ul>
										</li>
										<li> <a href="javascript:void(0);">朕乐专题</a>
											<ul>
												<li><a href="">高分篇</a></li>
												<li><a href="">情感篇</a></li>
												<li><a href="">音乐篇</a></li>
												<li><a href="">动作篇</a></li>
												<li><a href="">剧情篇</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li> <a href="javascript:void(0);">预告片</a>
									<ul>
										<li><a href="">最新上映</a></li>
										<li><a href="">欧美上映</a></li>
										<li><a href="">港台上映</a></li>
										<li><a href="">国内独家</a></li>
									</ul>
								</li>
								<li> <a href="javascript:void(0);">欧美大片</a>
								</li>
								<li> <a href="javascript:void(0);">港台经典</a>
									<ul>
										<li><a href="">港台经典1-1</a></li>
										<li><a href="">港台经典1-2</a></li>
										<li><a href="">港台经典1-3</a></li>
									</ul>
								</li>
								<li> <a href="javascript:void(0);">国产好片</a>
									<ul>
										<li><a href="">国产好片1-1</a></li>
										<li><a href="">国产好片1-2</a></li>
										<li><a href="">国产好片1-3</a></li>
									</ul>
								</li>
								<li> <a href="javascript:void(0);">日韩精粹</a>
									<ul>
										<li><a href="">日韩精粹1-1</a></li>
										<li><a href="">日韩精粹1-2</a></li>
										<li><a href="">日韩精粹1-3</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="javascript:void(0);">综 艺</a></li>
						<li><a href="javascript:void(0);">动 漫</a>
							<ul>
								<li><a href="">日本动漫</a></li>
								<li><a href="">国产动漫</a></li>
								<li><a href="">海外动漫</a></li>
								<li><a href="">动漫电影</a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0);">关 于</a></li>
						<li><a href="javascript:void(0);">杂 役</a></li>
						<!-- <li><a href="javascript:void(0);">联 系</a>
							<ul>
								<li><a href="javascript:void(0);">微博</a>
									<ul>
										<li><a href="javascript:void(0);">朕心疼妳</a></li>
									</ul>
								</li>
								<li><a href="javascript:void(0);">微信公众号</a>
									<ul>
										<li><a href="javascript:void(0);">二维码</a></li>
									</ul>					
								</li>
							</ul>
						</li> -->
						<li class="nav-search">
							<form method="post">
								<input type="text" name="search" class="nav-search-item" placeholder="搜索" />
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
		    </div>
		</nav>
		<!-- 顶部导航栏结束 -->
	</div>
	<!-- /头部 -->

	<!-- 主体 -->
	<div class="container">
		<!--主体内容开始-->
		<div class="content">
			<!-- 导航页 -->
			<ol class="breadcrumb">
				  <li class="breadcrumb-title">当前位置</li>
				  <li><a href="javascript:void(0);">首 页</a></li>
				  <li class="current"><a href="javascript:void(0);">测试</a></li>
				  <li class="active">十一月</li>
			</ol>
			
			
			<!--页面内容开始-->
		    <div class="row content-body">
			
				<!-- 左侧资源信息结束 -->
		        <div class="col-sm-3">
		            <div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>个人资料</h5>
						</div>
						<div class="ibox-content video-info-right">
							<!-- 用户头像 -->
							<div class="img-box user-head">
								<img src="/Public/img/default-head.png" class="img-circle" style="width: 70px;">
							</div>
							<!-- 更新信息 -->
							<div class="video-info-user">
								<p class="small">
									<span class="font-bold"><i class="fa fa-user"></i> 发布者：</span>
									<a href="#" class="text-navy"><?php echo ($videoList["user"]); ?></a>							
								</p>
								<p class="small">
									<span class="font-bold"><i class="fa fa-clock-o"></i> 发布时间：</span>							
									<small class="text-muted"><?php echo (date("Y-m-d H:m",$videoList["regdate"])); ?></small>						
								</p>
								<p class="small">
									<span class="font-bold"><i class="fa fa-clock-o"></i> 最后更新：</span>							
									<small class="text-muted"><?php echo (date("Y-m-d H:m",$videoList["lastdate"])); ?></small>						
								</p>
							</div>
							
							<!-- 其他下载信息 -->
							<h5>相关标签</h5>
							<ul class="tag-list" style="padding: 0;display: inline-block;">
								<li><a href="javascript:void(0);"><i class="fa fa-tag"></i> 文档</a>
								</li>
								<li><a href="javascript:void(0);"><i class="fa fa-tag"></i> 分享</a>
								</li>
								<li><a href="javascript:void(0);"><i class="fa fa-tag"></i> 下载</a>
								</li>
							</ul>
							<h5>资源档案</h5>
							<ul class="list-unstyled project-files">
								<li><a href="javascript:void(0);"><i class="fa fa-file"></i> Project_document.docx</a>
								</li>
								<li><a href="javascript:void(0);"><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a>
								</li>
								<li><a href="javascript:void(0);"><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a>
								</li>
								<li><a href="javascript:void(0);"><i class="fa fa-file"></i> Contract_20_11_2014.docx</a>
								</li>
							</ul>
							
							<div class="row m-t-sm user-button">
								<div class="col-sm-6">
									<a href="<?php echo ($videoList["link"]); ?>" download class="btn btn-sm btn-primary">立即下载</a>
								</div>
								<div class="col-sm-6">
									<a href="<?php echo U('Home/Index/videoPlayer');?>" class="btn btn-sm btn-primary">立即播放</a>
								</div>
							</div>
						</div>
		            </div>
		        </div>
				<!-- 左侧资源信息结束 -->
				
			
				<!-- 右侧资源信息开始 -->
		        <div class="col-sm-9">
		            <div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5 class="posTag">资源详情</h5>
							<a href="javascript:history.back();" class="btn btn-primary btn-xs pull-right">返回</a>
						</div>
						
						<div class="ibox-content video-info-box">
							
							<!-- 资源详情 -->
							<div class="row video-info-header">
							
								<div class="col-sm-3 img-box">
									<img alt="image" class="img-head" src="/Public/images/poster/<?php echo ($videoList["poster"]); ?>">
									<div class="btn-group">
										<button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> 赞</button>
										<button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> 评论</button>
										<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
									</div>
								</div>
								
								<!-- 资源信息详情上部信息 -->
								<div class="col-sm-9">
									<div class="row video-details">
										<div class="col-sm-12">
											<div class="video-name">
												<h2><?php echo ($videoList["videoname"]); ?></h2>
											</div>
										</div>
										
										<!-- 资源信息详情左侧信息 -->
										<div class="col-sm-5">
		
											<dl class="dl-horizontal">
												<dt>年代：</dt>
													<dd>
														<?php if(is_array($arrList['ageList'])): foreach($arrList['ageList'] as $list_key=>$list_vo): if($videoList["age"] == $list_key ): ?><span class=""><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; ?>
													</dd>
																						
												<dt>地区：</dt>
													<dd>
														<?php if(is_array($arrList['regionList'])): foreach($arrList['regionList'] as $list_key=>$list_vo): if($videoList["region"] == $list_key ): ?><span class=""><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; ?>
													</dd>	
												<dt>语言：</dt>
													<dd>
														<?php if(is_array($arrList['langList'])): foreach($arrList['langList'] as $list_key=>$list_vo): if($videoList["lang"] == $list_key ): ?><span class=""><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; ?>
													</dd>											
												<dt>清晰度：</dt>
													<dd>
														<?php if(is_array($arrList['is_hdList'])): foreach($arrList['is_hdList'] as $list_key=>$list_vo): if($videoList["is_hd"] == $list_key ): ?><span class=""><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; ?>
													</dd>
												<dt>资源大小：</dt>
													<dd><?php echo ($videoList["size"]); ?></dd>
												<dt>浏览次数：</dt>
													<dd><?php echo ($videoList["view"]); ?>次</dd>
											</dl>
										</div>
										
										<!-- 资源信息详情左侧信息 -->
										<div class="col-sm-7" id="cluster_info">
											<dl class="dl-horizontal">
												
												<dt>导演：</dt>
													<dd><?php echo ($videoList["director"]); ?></dd>	
												<dt>主演：</dt>
													<dd>
														<?php if(is_array($videoList["casts"])): foreach($videoList["casts"] as $key=>$vo): ?><a href="###" class="text-navy m-r-sm"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
													</dd>
												<dt>类型：</dt>
													<dd>
														<?php if(is_array($arrList['kindList'])): foreach($arrList['kindList'] as $list_key=>$list_vo): if(is_array($videoList["kind"])): foreach($videoList["kind"] as $key=>$vo): if($vo == $list_key ): ?><span class="label label-primary m-r-sm"><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; endforeach; endif; ?>
													</dd>
												<dt>最后更新：</dt>
													<dd><?php echo (date("Y年 m月d日 H:m",$videoList["lastdate"])); ?></dd>
												<dt>创建时间：</dt>
													<dd><?php echo (date("Y年 m月d日 H:m",$videoList["regdate"])); ?></dd>
												<dt>最近关注：</dt>
												<dd class="project-people">
													<a href="project_detail.html">
														<img alt="image" class="img-circle" src="/Public/img/a3.jpg">
													</a>
													<a href="project_detail.html">
														<img alt="image" class="img-circle" src="/Public/img/a1.jpg">
													</a>
													<a href="project_detail.html">
														<img alt="image" class="img-circle" src="/Public/img/a2.jpg">
													</a>
													<a href="project_detail.html">
														<img alt="image" class="img-circle" src="/Public/img/a4.jpg">
													</a>
													<a href="project_detail.html">
														<img alt="image" class="img-circle" src="/Public/img/a5.jpg">
													</a>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							
							</div>
							
							<!-- 资源详情信息内容开始 -->
							<div class="row video-info-content">
							
								<div class="col-sm-12">
									
									<div class="social-feed-box">
										<!-- <div class="social-avatar">
											<a href="" class="pull-left">
												<img alt="image" src="/Public/img/a2.jpg">
											</a>
											<div class="media-body">
												<a href="#"><?php echo ($video["user"]); ?></a>
												<small class="text-muted"><?php echo (date("Y年 m月d日 H:m",$video["lastdate"])); ?></small>
											</div>
										</div>-->
										
										<div class="social-body">
											<div class="feed-element">
												<h3 class="ibox-title-bar pull-left">剧情简介：</h3>
												<div class="media-body ">
													<p><?php echo ($videoList["plot"]); ?></p>										
												</div>
											</div>
											
											<div class="feed-element">
												<h3 class="ibox-title-bar pull-left">影片截图：</h3>
												<div class="media-body ">
													<div class="photos">
														<img alt="image" src="/Public/images/shotcuts/<?php echo ($videoList["shotcuts"]); ?>" class="img-responsive">
													</div>
												</div>
											</div>
		
										</div>
										
										<!-- 底部评论 -->
										<div class="social-footer">
											<!-- 切换选项卡 -->
											<div class="tabs-container">
												<!-- 选项卡菜单 -->
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#tab-comment" aria-expanded="true"> 精彩点评</a>
													</li>
													<li class=""><a data-toggle="tab" href="#tab-suggest" aria-expanded="false">相似资源</a>
													</li>
												</ul>
												<!-- 选项盒子 -->
												<div class="tab-content">
													<div id="tab-comment" class="tab-pane active">
														<div class="panel-body">
															<!-- 评论列表 -->
															<div class="social-comment-list">
															
																<!-- 评论列表项 -->
																<div class="social-comment">
																	<a href="" class="pull-left">
																		<img alt="image" class="img-circle" src="/Public/img/a1.jpg">
																	</a>
																	<div class="media-body">
																		<a href="#" class="text-info">小秘书</a> 
																		<p>基本做到了全程无尿点，值得一看</p>
																		<p>
																			<span class="small"><i class="fa fa-thumbs-up"></i> 26</span>
																			<small class="text-muted">8月18日</small>
																		</p>
																		<div class="actions">
																			<a class="btn btn-xs btn-info"><i class="fa fa-thumbs-up"></i> 赞 </a>
																			<a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> 收藏</a>
																			<a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> 回复</a>
																		</div>
																		
																	</div>
																</div>
																
																<!-- 发表评论 -->
																<?php if($userid != ''): ?><div class="social-comment add-comment">
																	<a href="" class="pull-left">
																		<img class="img-circle" alt="image" src="/Public/img/a3.jpg">
																	</a>
																	<form id="commentForm" method="post" action="" role="form">
																		<!-- 隐藏用户ID信息 -->
																		<div class="user-comment-id">
																			<input type="hidden" value="<?php echo ($user["uid"]); ?>" />
																		</div>
																		<div class="media-body">
																			<textarea class="form-control" placeholder="填写评论..."></textarea>
																		</div>
																		
																		<div class="text-right btn-above">
																			<button type="submit" class="btn btn-xs btn-primary"><strong>发布</strong>
																			</button>
																		</div>
																	</form>
																</div><?php endif; ?>
															</div>
														</div>
													</div>
													
													<div id="tab-suggest" class="tab-pane">
														<div class="panel-body">
															<strong>哇哦，页面不存在！</strong>
															<p>此功能尚未完善，尽请期待！</p>
														</div>
													</div>
												</div>
											</div>			
										</div>
										<!-- 底部评论结束 -->
		
									</div>
									
								</div>
							</div>
							<!-- 资源详情信息内容结束 -->
							
						</div>
		
		            </div>
		
		        </div>
				<!-- 右侧资源信息结束 -->
		    </div>
			<!--页面内容结束-->
			
		</div>
		<!--主体内容结束-->
	</div>

	<!-- /主体 -->

	<!-- 底部 -->

	
	<!--页面底部信息-->
	<div class="page-footer">
		<p>Copyright ©2015 <b>朕乐视频 <a href="www.weijuer.com">weijuer.com</a></b> All Rights Reversed. </p>
		<p>备案号：苏ICP备15011477号 版权所有 维权必究</p>
	</div>
	
	<!-- 页面JS-->
	
	
	<!--公共JS引入-->
	<script src="/Public/js/pages/public.js"></script>
	<script>
	
		$(function() {
			//顶部菜单控制
			//鼠标悬浮
			$('.nav-tab li').has('ul').mouseover(function(){
				$(this).children('ul').css('visibility','visible');
			}).mouseout(function(){
				$(this).children('ul').css('visibility','hidden');
			});
				
			//鼠标点击
			$(".nav-tab li").on("click",function(){
				var self = $(this);
				var noSelf = self.siblings();
				self.addClass("nav-current");
				noSelf.removeClass("nav-current");
			});
			
			// 菜单选中样式
			// var urlstr = location.href;
			var urlStr = location.pathname;
			var urlStatus=false;
	//		console.log(urlStr);
			$("#menu>li>a").each(function () {
				var href = $(this).attr('href');
	//			console.log(href);
				if(urlStr.length == 1){
					$("#menu>li>a").eq(0).parents("li").addClass('nav-current'); 
					return;
				}
				if(urlStr.length > 1 && href.length != 19){
					var hrefTag = href.split("/")[1].substr(0,5);
	//				console.log(hrefTag);
					if (urlStr.indexOf(hrefTag) > -1 && hrefTag!='') {
						$(this).parents("li").addClass('nav-current');
						return;
					}
				}
				if (href!='' && urlStr.indexOf(href) > -1) {
					$(this).parents("li").addClass('nav-current'); 
					urlStatus = true;
				} else {
					$(this).parents("li").removeClass('nav-current');
				}
			});
			//if (!urlstatus) {$("#menu>li>a").eq(0).parents("li").addClass('nav-current'); }
			
			/* Mobile */
			$('#menu-wrap').prepend('<div id="menu-trigger">Menu</div>');
			$("#menu-trigger").on('click', function(){
				$("#menu").slideToggle();
			});
	
			// iPad
			var isiPad = navigator.userAgent.match(/iPad/i) != null;
			if (isiPad) $('#menu ul').addClass('no-transition');
			
			
			// 当前位置获取		
			var posTag = $(".posTag").text();
			var current = $("#menu>li.nav-current>a").html();
			if(posTag) {		
				$(".breadcrumb li.current").html(current);
				$(".breadcrumb li.active").text(posTag);
			}else{
				$(".breadcrumb li.current").remove();
				$(".breadcrumb li.active").remove();	
			}
			
			// 百度自动推送
	//		(function(){
	//			var bp = document.createElement('script');
	//			bp.src = '//push.zhanzhang.baidu.com/push.js';
	//			var s = document.getElementsByTagName("script")[0];
	//			s.parentNode.insertBefore(bp, s);
	//		})();
			
		});
	</script>
	<!-- /底部 -->
</body>
</html>