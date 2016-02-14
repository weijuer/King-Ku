<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>朕乐视频-资源播放《<?php echo ((isset($videoList["videoname"]) && ($videoList["videoname"] !== ""))?($videoList["videoname"]):"资源详情"); ?>》</title>
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
			<div class="row content-body video-player">
				<div class="col-sm-8">
	                <div class="ibox float-e-margins">
	                    <div class="ibox-title">
	                        <h5>测试视频播放</h5>
	                        <div class="ibox-tools">
	                            <a class="collapse-link">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a class="close-link">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </div>
	                    </div>
	                    <div class="ibox-content">
	                        <div class="player">
	                            <video poster="/Public/img/a1.jpg" controls crossorigin>
	                                <!-- Video files -->
	                                <source src="/Public/video/demo.mp4" type="video/mp4">
	
	                                <!-- Text track file -->
	                                <track kind="captions" label="English" srclang="en" src="" default>
	
									<!-- Fallback for browsers that don't support the <video> element -->
									<a href="/Public/video/demo.mp4">下载</a>
	                            </video>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-4">
	                <div class="ibox float-e-margins">
	                    <div class="ibox-title">
	                        <h5>音频播放</h5>
	                        <div class="ibox-tools">
	                            <a class="collapse-link">
	                                <i class="fa fa-chevron-up"></i>
	                            </a>
	                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
	                                <i class="fa fa-wrench"></i>
	                            </a>
	                            <ul class="dropdown-menu dropdown-user">
	                                <li><a href="form_basic.html#">选项1</a>
	                                </li>
	                                <li><a href="form_basic.html#">选项2</a>
	                                </li>
	                            </ul>
	                            <a class="close-link">
	                                <i class="fa fa-times"></i>
	                            </a>
	                        </div>
	                    </div>
	                    <div class="ibox-content">
	                        <div class="player">
	                            <audio controls>
	                                <!-- Audio files -->
	                                <source src="/Public/music/偏偏喜欢你.mp3" type="audio/mp3">
	
	                                <!-- Fallback for browsers that don't support the <audio> element -->
	                                您的浏览器不支持在线播放，请<a href="/Public/music/偏偏喜欢你.mp3">下载</a>
	                            </audio>
	                        </div>
	                    </div>
	                </div>
	            </div>
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
		
			<link rel="stylesheet" href="/Public/css/plyr/plyr.css">
		    <script>
		        (function(d,u){var a=new XMLHttpRequest(),b=d.body;if("withCredentials" in a){a.open("GET",u,true);a.send();a.onload=function(){var c=d.createElement("div");c.setAttribute("hidden","");c.innerHTML=a.responseText;b.insertBefore(c,b.childNodes[0])}}})(document, "/Public/css/plyr/sprite.svg");
		    </script>
		    <script src="/Public/js/plugins/plyr/plyr.js"></script>
		    <script>
		        plyr.setup();
		    </script>
    		
	
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