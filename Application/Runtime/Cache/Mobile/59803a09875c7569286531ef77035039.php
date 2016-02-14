<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<title>朕乐视频</title>
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
			

</head>
<body>
	<!-- 头部 -->
			<header class="mui-bar mui-bar-nav">
			<!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
			<h1 id="title" class="mui-title">首页</h1>
		</header>
	<!-- /头部 -->
	
	<!-- 主体 -->
			<nav class="mui-bar mui-bar-tab">
			<a class="mui-tab-item mui-active" href="#home">
				<span class="mui-icon fa fa-home"></span>
				<span class="mui-tab-label">首页</span>
			</a>
			<a class="mui-tab-item" href="#tabbar-with-video">
				<span class="mui-icon fa fa-film"><span class="mui-badge">9</span></span>
				<span class="mui-tab-label">迷影</span>
			</a>
			<a class="mui-tab-item" href="#tabbar-with-music">
				<span class="mui-icon fa fa-music"></span>
				<span class="mui-tab-label">痴乐</span>
			</a>
			<a class="mui-tab-item" href="#tabbar-with-article">
				<span class="mui-icon fa fa-file-text-o"></span>
				<span class="mui-tab-label">刨文</span>
			</a>
		</nav>
    
			<!--页面内容开始-->
			<div class="mui-content">
				<div id="home" class="mui-control-content mui-active">
					<!-- (循环轮播：开始) -->
					<div id="gallery" class="mui-slider">
						<div class="mui-slider-group mui-slider-loop">
							<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
							<div class="mui-slider-item mui-slider-item-duplicate">
								<a href="#">
									<img src="/Public/img/banner/big0720150102210934.jpg">
									<p class="mui-slider-title">低头思故乡</p>
								</a>
							</div>
							<!-- (循环轮播：第一张轮播图片) -->
							<div class="mui-slider-item">
								<a href="https://www.baidu.com/">
									<img src="/Public/img/banner/big0020150102211033.jpg">
									<p class="mui-slider-title">幸福就是可以一起睡觉</p>
								</a>
							</div>
							<div class="mui-slider-item">
								<a href="#">
									<img src="/Public/img/banner/big0120150101183428.jpg">
									<p class="mui-slider-title">窗前明月光</p>
								</a>
							</div>
							<div class="mui-slider-item">
								<a href="#">
									<img src="/Public/img/banner/big0320150101183351.jpg">
									<p class="mui-slider-title">疑是地上霜</p>
								</a>
							</div>					
							<div class="mui-slider-item">
								<a href="#">
									<img src="/Public/img/banner/big0420150101224343.jpg">
									<p class="mui-slider-title">举头望明月</p>
								</a>
							</div>
							<div class="mui-slider-item">
								<a href="#">
									<img src="/Public/img/banner/big0720150102210934.jpg">
									<p class="mui-slider-title">低头思故乡</p>
								</a>
							</div>
							<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
							<div class="mui-slider-item mui-slider-item-duplicate">
								<a href="#">
									<img src="/Public/img/banner/big0020150102211033.jpg">
									<p class="mui-slider-title">幸福就是可以一起睡觉</p>
								</a>
							</div>
						</div>
						<div class="mui-slider-indicator mui-text-right">
							<div class="mui-indicator mui-active"></div>
							<div class="mui-indicator"></div>
							<div class="mui-indicator"></div>
							<div class="mui-indicator"></div>
							<div class="mui-indicator"></div>
						</div>
					</div>
					<!-- (循环轮播：结束) -->
					
					<!-- (电影导航：开始) -->
					<div class="mui-my-slider">
						<h4 class="sub-title">电影</h4>
			            <div class="mui-my-slider-item">
			                <ul id="videoList" class="mui-table-view mui-grid-view">
			                	<!--循环输出电影列表开始-->
			                	<?php if(is_array($videoList)): foreach($videoList as $key=>$vo): ?><li class="mui-table-view-cell mui-media mui-col-xs-4">
			                		<!--<a data-id="<?php echo ($vo["vid"]); ?>" class="video-link" href="/Mobile/Video/videoDetail/<?php echo ($vo["vid"]); ?>.shtml">-->
			                		<a data-id="<?php echo ($vo["vid"]); ?>" class="video-link" href="<?php echo U('Mobile/Video/videoDetail',array('vid'=>$vo['vid']));?>">
			                			<!--二天时间为最新-->
			                			<?php if($today-$vo["regdate"] < 2*24*3600): ?><span class="label label-new">NEW</span><?php endif; ?>
			                			<img class="mui-media-object" src="/Public/images/poster/<?php echo ($vo["poster"]); ?>">
			                			<span class="tips-bar mui-h6">全集</span>
			                			<div class="mui-media-body"><p class="video-name mui-h6"><?php echo ($vo["videoname"]); ?></p></div>
			                		</a>
			                	</li><?php endforeach; endif; ?>
			                	<!--循环输出电影列表结束-->
			                	<!--查看更多-->
			                	<li class="mui-table-view-cell mui-media mui-col-xs-4">
			                		<a class="more-link" href="<?php echo U('Video/videoList');?>">
			                			<div class="mui-media-body">查看更多</div>
			                		</a>
			                	</li>
			                </ul>
			            </div>
				    </div>
				    <!-- (电影导航：结束) -->
				    
				    <!-- (音乐导航：开始) -->
					<div class="mui-my-slider">
						<h4 class="sub-title">音乐</h4>
			            <div class="mui-my-slider-item">
			                <ul id="musicList" class="mui-table-view mui-grid-view">
								<li class="mui-table-view-cell mui-media mui-col-xs-4">
			                		<a data-id="" class="video-link" href="<?php echo U('Music/musicList');?>">
			                			<span class="label label-new">NEW</span>
			                			<img class="mui-media-object" src="/Public/img/music.png">
			                			<!--<i class="fa fa-music fa-4x"></i>-->
			                			<span class="tips-bar mui-h6">MP3</span>
			                			<div class="mui-media-body"><p class="video-name mui-h6">等你等了很久</p></div>
			                		</a>
			                	</li>
			                	<!--查看更多-->
			                	<li class="mui-table-view-cell mui-media mui-col-xs-4">
			                		<a class="more-link" href="<?php echo U('Music/musicList');?>">
			                			<div class="mui-media-body">查看更多</div>
			                		</a>
			                	</li>
			                </ul>
			            </div>
				    </div>
				    <!-- (音乐导航：结束) -->
				    
				    <!-- (美文导航：开始) -->
					<div class="mui-my-slider">
						<h4 class="sub-title">美文</h4>
			            <div class="mui-my-slider-item">
			                <ul id="articleList" class="mui-table-view mui-grid-view">
			                	<li class="mui-table-view-cell mui-media mui-col-xs-4">
			                		<a data-id="" class="video-link" href="/videoDetail/">
			                			<span class="label label-new">NEW</span>
			                			<img class="mui-media-object" src="/Public/img/article.png">
			                			<!--<i class="fa fa-music fa-4x"></i>-->
			                			<span class="tips-bar mui-h6">小说</span>
			                			<div class="mui-media-body"><p class="video-name mui-h6">《那小子真帅》</p></div>
			                		</a>
			                	</li>
			                </ul>
			            </div>
				    </div>
				    <!-- (美文导航：结束) -->
				    
				</div>
				<div id="tabbar-with-video" class="mui-control-content">
					<h4 class="sub-title">电影</h4>
				    <ul id="videoList" class="mui-table-view mui-grid-view">
				    	<!--循环输出电影列表开始-->
				    	<?php if(is_array($videoList)): foreach($videoList as $key=>$vo): ?><li class="mui-table-view-cell mui-media mui-col-xs-4">
				    		<a data-id="<?php echo ($vo["vid"]); ?>" class="video-link" href="<?php echo U('Mobile/Video/videoDetail',array('vid'=>$vo['vid']));?>">
				    			<!--二天时间为最新-->
				    			<?php if($today-$vo["regdate"] < 2*24*3600): ?><span class="label label-new">NEW</span><?php endif; ?>
				    			<img class="mui-media-object" src="/Public/images/poster/<?php echo ($vo["poster"]); ?>">
				    			<span class="tips-bar mui-h6">全集</span>
				    			<div class="mui-media-body"><p class="video-name mui-h6"><?php echo ($vo["videoname"]); ?></p></div>
				    		</a>
				    	</li><?php endforeach; endif; ?>
				    	<!--循环输出电影列表结束-->
				    </ul>
				</div>
				
				<div id="tabbar-with-music" class="mui-control-content">
					<h4 class="sub-title">音乐</h4>
				</div>
				
				<div id="tabbar-with-article" class="mui-control-content">
					<h4 class="sub-title">美文</h4>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell mui-media">
								<a class="mui-navigate-right">
									<img class="mui-media-object mui-pull-left" src="/Public/img/p1.jpg">
									<div class="mui-media-body">
										CBD
										<p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a class='mui-navigate-right' href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="/Public/img/p2.jpg">
									<div class="mui-media-body">
										远眺
										<p class='mui-ellipsis'>静静的看这个世界，最后终于疯了</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a class="mui-navigate-right">
									<img class="mui-media-object mui-pull-left" src="/Public/img/p3.jpg">
									<div class="mui-media-body">
										幸福
										<p class='mui-ellipsis'>能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？</p>
									</div>
								</a>
							</li>
						</ul>
				</div>
				
			</div>
			<!--页面内容结束-->
			

	<!-- /主体 -->

	<!-- 底部 -->
			<script src="/Public/mobile/js/mui.min.js"></script>
		
			<script src="/Public/mobile/js/app/index.js"></script>
			
	<!-- /底部 -->
</body>
</html>