<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<title>朕乐视频-电影列表</title>
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
		</style>	
	

</head>
<body>
	<!-- 头部 -->
			<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			
		<h1 id="title" class="mui-title">电影列表</h1>
	
		</header>
	<!-- /头部 -->
	
	<!-- 主体 -->
	    
	<!--页面内容开始-->	
	<div class="mui-content">
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
	<!--页面内容结束-->
	

	<!-- /主体 -->

	<!-- 底部 -->
			<script src="/Public/mobile/js/mui.min.js"></script>
		
	
	<!-- /底部 -->
</body>
</html>