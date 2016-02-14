<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<title>朕乐视频-音乐列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--网页标签-->
<link rel="shortcut icon" href="/Public/img/favicon.ico">
<link rel="Bookmark" href="/Public/img/favicon.ico" />

<link rel="apple-touch-icon" sizes="120x120" href="/Public/img/iphone-touch-icon.png">
<link rel="stylesheet" href="/Public/mobile/css/mui.min.css">
<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css">
	

		<!--<script src="/Public/mobile/js/stream.js"></script>-->
	

		<link rel="stylesheet" href="/Public/mobile/css/app.css">
		<link rel="stylesheet" href="/Public/mobile/css/musicList.css">
	

</head>
<body>
	<!-- 头部 -->
			<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 id="title" class="mui-title">音乐列表</h1>
		</header>
	<!-- /头部 -->
	
	<!-- 主体 -->
	    
	<!--页面内容开始-->
	<div class="mui-content">
	<!--滑动加载开始-->
		<div id="slider" class="mui-slider">
			<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item" href="#newSong">
					新歌
				</a>
				<a class="mui-control-item" href="#songCharts">
					排行
				</a>
				<a class="mui-control-item" href="#singer">
					歌手
				</a>
				<a class="mui-control-item" href="#radioStation">
					电台
				</a>
			</div>
			<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-3"></div>

			<!--加载容器开始-->
			<div class="mui-slider-group">
				<!--新歌-->
				<div id="newSong" class="mui-slider-item mui-control-content mui-active">
					<div id="scroll1" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<!--音乐列表-->
							<section id="newSongContent">		
							</section>
						</div>
					</div>
				</div>
				
				<!--排行-->
				<div id="songCharts" class="mui-slider-item mui-control-content">
					<div id="scroll2" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<!--排行列表-->
							<section id="songChartsContent">		
							</section>
						</div>
					</div>
				</div>
				
				<!--歌手-->
				<div id="singer" class="mui-slider-item mui-control-content">
					<div id="scroll3" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<div class="mui-loading">
								<div class="mui-spinner">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--电台-->
				<div id="radioStation" class="mui-slider-item mui-control-content">
					<div id="scroll4" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<div class="mui-loading">
								<div class="mui-spinner">
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<!--加载容器结束-->
		</div>
		<!--滑动加载结束-->
		
		<!--播放器容器-->
		<section id="playwrap">
			<div id="playContent">
				<div class="player">
					<audio  id="myMusic"></audio>
				</div>
				<div onClick="myControl.selectTime(event)" id="progressWrap">
					<div id="progress"></div>
				</div>
				<div class="img">
					<img id="singerHead" src="/Public/img/p1.jpg">
				</div>
				<div class="info">
					<div class="songname clearfix">
						<label id="musicTitle" for="musicTitle">朕乐视频</label>
						<label style="display: none;" id="songname" for="songname" style="color: rgb(204, 0, 0);">此手机不支持html5播放，扔了吧</label>
						<label id="timeshow" for="time"><span id="currentTime">00:00</span>/<span id="totleTime">00:00</span></label>
					</div>
					<div class="audioControl">
						<a id="prevButton" class="last" onClick="myControl.prev()" href="javascript:;"></a>
						<a id="playButton" class="play" onClick="myControl.mainControl()" href="javascript:;"></a>
						<a id="nextButton" class="next" onClick="myControl.next()" href="javascript:;"></a>
						<a id="modeButton" class="mode-default" onClick="myControl.selectMode()" href="javascript:;"></a>
						<a class="border" href="javascript:;"></a>
						<a id="playDetail" class="showDetail" href="javascript:;"></a>
					</div>
				</div>
			</div>
		</section>
		
		<!--自定义弹窗-->
		<div style="display:none;" id="oWindow">测试</div>
	</div>	
	<!--页面内容结束-->
	

	<!-- /主体 -->

	<!-- 底部 -->
			<script src="/Public/mobile/js/mui.min.js"></script>
		
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/mobile/js/app/player.js"></script>
		<script type="text/javascript" charset="utf-8">

    	</script>
	
	<!-- /底部 -->
</body>
</html>