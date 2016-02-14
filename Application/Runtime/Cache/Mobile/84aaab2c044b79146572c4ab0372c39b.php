<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<title>朕乐视频-电影详情</title>
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
	<style>
		.mui-control-content {
			background-color: white;
			min-height: 20em;
		}
		.mui-control-content .mui-loading {
			margin-top: 50px;
		}
		.mui-slider-progress-bar:before {
		    content: '';
		    position: absolute;
		    left: 50%;
		    top: -8px;
		    margin-left: -8px;
		    border-left: 8px solid transparent;
		    border-right: 8px solid transparent;
		    border-bottom: 10px solid #007AFF;
		}
		.poster-info {
			display: block;
		    position: absolute;
		    bottom: 0;
		    text-align: center;
		    width: 100%;
		    background: rgba(247, 247, 247, 0.53);
		    color: #000;
		}
		.poster {
			width: 100%;
		}
		.video-info-box {
			margin-left: 1em;
		}
		.video-name {
			font-weight: bold;
			color: #000;
		}
		.video-play-btn {
			padding: 2px 5px;
		}
		.video-plot {
			text-indent: 2em;
			padding: 1em;
		}
		
		/*重定义样式*/
		.play-list-content {
			padding: 0!important;
			margin: 0!important;
		}
		.play-list-content li {
			padding: 0!important;
			margin: 0!important;
		} 
		.play-list-content li > a {
		    padding: 0.5em!important;
		    margin: 0.5em!important;
		    background: yellowgreen;
		} 
	</style>
	

</head>
<body>
	<!-- 头部 -->
			<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 id="title" class="mui-title">《<?php echo ($video["videoname"]); ?>》</h1>
		</header>
	<!-- /头部 -->
	
	<!-- 主体 -->
	    
	<!--页面内容开始-->		
	<!-- (底部导航栏：开始) -->
	<nav class="mui-bar mui-bar-tab">
		<a id="defaultTab" class="mui-tab-item mui-active" href="javascript:;">
			<span class="mui-icon mui-icon-download"></span>
			<span class="mui-tab-label">下载</span>
		</a>
		<a id="collectBtn" class="mui-tab-item" href="javascript:;">
			<span class="mui-icon mui-icon-star"></span>
			<span class="mui-tab-label">收藏</span>
		</a>
		<a id="userSetting" class="mui-tab-item" href="javascript:;">
			<span class="mui-icon mui-icon-weixin"></span>
			<span class="mui-tab-label">分享</span>
		</a>
	</nav>
	<!-- (底部导航栏：结束) -->
	
	<div class="mui-content">
		<ul class="mui-table-view">
			<li class="mui-table-view-cell">
				<div class="mui-table">
					<div class="mui-table-cell mui-col-xs-4 mui-pull-left">
						<label class="poster-info">全集</label>
						<img id="videoPoster" class="poster" src="/Public/images/poster/<?php echo ($video["poster"]); ?>" />
					</div>
					<div class="mui-table-cell mui-col-xs-7 video-info-box mui-pull-left">
						<h5 id="videoName" class="video-name"><?php echo ($video["videoname"]); ?></h5>
						<p class="mui-h5">
							导演：
							<span id="videoDirector" class="mui-h5 video-director"><?php echo ($video["director"]); ?></span>
						</p>
						<p class="mui-h5">
							年份：
							<span id="videoAge" class="mui-h5 video-age"><?php echo ($video["age"]); ?></span>
						</p>
						<p class="mui-h5 mui-ellipsis">
							主演：
							<span id="videoCasts" class="mui-h5 video-casts"><?php echo ($video["casts"]); ?></span>
						</p>
						<p class="mui-h5">
							地区：
							<?php if(is_array($arrList['regionList'])): foreach($arrList['regionList'] as $list_key=>$list_vo): if($video["region"] == $list_key ): ?><span id="videoRegion" class="mui-h5 video-region"><?php echo ($list_vo); ?></span><?php endif; endforeach; endif; ?>
						</p>
						<p class="mui-h5">
							发布时间：
							<span id="videoRegdate" class="mui-h5 video-regdate"><?php echo ($video["regdate"]); ?></span>
						</p>
						<p class="mui-h5">
							播放来源：
							<span id="videoSourse" class="mui-h5 video-source">乐视网</span>
						</p>
						<button id="videoPlayBtn" type="button" class="mui-btn mui-btn-blue video-play-btn">立即播放</button>
					</div>
				</div>
			</li>
		</ul>
		
		<!--滑动加载开始-->
		<div id="slider" class="mui-slider">
			<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item" href="#plot">
					简介
				</a>
				<a class="mui-control-item" href="#playList">
					剧集
				</a>
				<a class="mui-control-item" href="#relatedList">
					相关
				</a>
			</div>
			<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4"></div>

			<!--加载容器开始-->
			<div class="mui-slider-group">
				<!--简介-->
				<div id="plot" class="mui-slider-item mui-control-content mui-active">
					<div id="scroll1" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<p id="videoPlot" class="video-plot"><?php echo ($video["plot"]); ?></p>
						</div>
					</div>
				</div>
				
				<!--剧集-->
				<div id="playList" class="mui-slider-item mui-control-content">
					<div id="scroll2" class="mui-scroll-wrapper">
						<div class="mui-scroll">
							<div class="mui-loading">
								<div class="mui-spinner">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--相关-->
				<div id="relatedList" class="mui-slider-item mui-control-content">
					<div id="scroll3" class="mui-scroll-wrapper">
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
		
	</div>	
	<!--页面内容结束-->
	

	<!-- /主体 -->

	<!-- 底部 -->
			<script src="/Public/mobile/js/mui.min.js"></script>
		

	<script type="text/javascript" charset="utf-8">
		mui.init({
			swipeBack: false
		});

		mui('.mui-scroll-wrapper').scroll({
			indicators: true //是否显示滚动条
		});
		
		var playListContent = '<ul id="playListContent" class="mui-table-view mui-grid-view play-list-content"></ul>';
		var relatedListContent = '<ul id="relatedListContent" class="mui-table-view mui-grid-view"></ul>';
		var playList = document.getElementById('playList');
		var relatedList = document.getElementById('relatedList');
		var slider = document.getElementById('slider');
		
		// 滑动加载事件监听
		slider.addEventListener('slide', function(e) {
			// 剧集加载
			if (e.detail.slideNumber === 1) {
				if (playList.querySelector('.mui-loading')) {
					
					playList.querySelector('.mui-scroll').innerHTML = playListContent;
					mui.alert('不要心急，该功能尚未完善哦~', '朕乐视频');
					
//					setTimeout(function() {
//						// 生成剧集加载容器
//						playList.querySelector('.mui-scroll').innerHTML = playListContent;
//						
//						// 根据vid向服务器请求相似资源列表
//						var ul = document.body.querySelector("#playListContent");
//						var url = "http://www.thinkphp.com/mobile.php/Video/playListContent";
//						var vid = "";
//						mui.getJSON(url,{'vid':vid},function(data){
//			
//							//服务器返回响应
//							var resData = data;
//							//遍历的对象
//							mui.each(resData,function(index,item){
//								var li = document.createElement('li');  // 创建li子节点
//								li.className = 'mui-table-view-cell mui-media mui-col-xs-2'; // 添加li子节点样式
//								li.innerHTML = '<a class="">'+item.vid+'</a>';
//								//新纪录插到最前面
//								ul.appendChild(li);
//							});
//							
//							}
//						);
//					}, 500);
				}
			} else if (e.detail.slideNumber === 2) { // 相关加载资源加载
				if (relatedList.querySelector('.mui-loading')) {
					setTimeout(function() {
						// 生成相关资源加载容器
						relatedList.querySelector('.mui-scroll').innerHTML = relatedListContent;
						
						// 根据kind向服务器请求相似资源列表
						var ul = document.body.querySelector("#relatedListContent");
						var url = "http://www.thinkphp.com/mobile.php/Video/getRelatedList";
						var kind = "",age =2015;
						mui.getJSON(url,{'kind':kind,'age':age},function(data){
			
							//服务器返回响应
							var resData = data;
							//遍历的对象
							mui.each(resData,function(index,item){
								var li = document.createElement('li');  // 创建li子节点
								li.className = 'mui-table-view-cell mui-media mui-col-xs-4'; // 添加li子节点样式
								li.innerHTML = '<a data-id="'+item.vid+'" class="video-link" href="javascript:;">'
						                    		+'<img class="mui-media-object" src="/Public/images/poster/'+item.poster+'">'
						                            +'<span class="tips-bar mui-h6">全集</span>'
						                            +'<div class="mui-media-body"><p class="video-name mui-h6">'+item.videoname+'</p></div>'
					                    		+'</a>';
				
								//新纪录插到最前面
								ul.appendChild(li);
							});
							
							}
						);
						
					}, 500);
				}
			}
		});
		
		//播放按钮
		var videoPlayBtn = document.getElementById("videoPlayBtn");
		videoPlayBtn.addEventListener("tap",function(){
			
			mui.alert('不要心急，该功能尚未完善哦~', '朕乐视频');
		});
		
		// 收藏按钮事件
		document.getElementById("defaultTab").addEventListener('tap',function(){
		  	//通过event.detail可获得传递过来的参数内容
			mui.alert('不要心急，该功能尚未完善哦~', '朕乐视频');
		});
		
		document.getElementById("collectBtn").addEventListener('tap',function(){
		  	var btnArray = ['是','否'];
		  	mui.confirm('确认收藏吗？','朕乐视频',btnArray,function(e){
		  		if(e.index==0){
		  			mui.toast('恭喜收藏成功！');
		  		}else{
		  			mui.toast('欢迎下次再来！');
		  		}
		  	})
		});

    </script>
    
	<!-- /底部 -->
</body>
</html>