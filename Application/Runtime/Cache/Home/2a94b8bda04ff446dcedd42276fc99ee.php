<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>朕乐视频-首页</title>
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
				<div class="col-sm-12">
					
					<!--轮播图 开始 -->
					<div class="main_banner">
		
						<div class="main_banner_wrap">
							<div class="main_banner_box" id="m_box">
								<a href="javascript:void(0)" class="banner_btn js_pre">
									<span class="banner_btn_arrow"><i></i></span>
								</a>
								<a href="javascript:void(0)" class="banner_btn btn_next js_next">
									<span class="banner_btn_arrow"><i></i></span>
								</a>
								<ul>
									<li id="imgCard0">
										<a href=""><span style="opacity:0;"></span></a>      
										<img src="/Public/img/banner/big0020150102211033.jpg" alt="">
										<p style="bottom:0">周杰伦粉丝版MV</p>
									</li> 
									<li id="imgCard1">
										<a href=""><span style="opacity:0.4;"></span></a>      
										<img src="/Public/img/banner/big0120150101183428.jpg" alt="">
										<p>乐侃有声节目第二期</p>
									</li> 
									<li id="imgCard2">
										<a href=""><span style="opacity:0.4;" ></span></a>        
										<img src="/Public/img/banner/big0320150101183351.jpg" alt="">
										<p>乐见大牌：”荣“耀之声，”维“我独尊</p>
									</li> 
									<li id="imgCard3">
										<a href=""><span style="opacity:0.4;"></span></a>      
										<img src="/Public/img/banner/big0420150101224343.jpg" alt="">
										<p>王力宏四年心血结晶</p>
									</li> 
									<li id="imgCard4">
										<a href=""><span style="opacity:0.4;"></span></a>      
										<img src="/Public/img/banner/big0720150102210934.jpg" alt="">
										<p>MV精选：《武媚》女神团美艳大比拼</p>
									</li> 
								</ul>
								<!--火狐倒影图层-->
								<p id="rflt"></p>
								<!--火狐倒影图层-->
							</div>
							<!--序列号按钮-->
							<div class="btn_list">
								<span class="curr"></span><span></span><span></span><span></span><span></span>        
							</div>
						</div>
						
					</div>
					<!--轮播图 结束 -->
		
					<!-- 切换选项卡开始 -->
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
					
									
								</div>
							</div>
							
							<div id="tab-suggest" class="tab-pane">
								<div class="panel-body">
									
								</div>
							</div>
						</div>
					</div>	
					<!-- 切换选项卡结束 -->
					
					<!--表格主体开始-->
					<div class="table-body">
						<!-- 网站公共 -->
						<div class="smarticker2">
							<ul>
								<li><a href="###">欢迎光临本站点</a></li>
								<li><a href="###">这里是最新的视频、电影、电视剧集中基地</a></li>
								<li><a href="###">本站点所有视频信息均来源于网络，如有维权请联系站长删除。</a></li>
								<li><a href="###">本站点现处于测试阶段，如遇问题，请先站长反馈，谢谢配合！</a></li>
							</ul>
						</div>
						
						<table id="movieTable"></table>		
					</div>
					<!--表格主体结束-->	
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
	
	<script src="/Public/js/plugins/bootstrap/js/bootstrap-table.min.js"></script>
	<script src="/Public/js/plugins/bootstrap/js/bootstrap-table-zh-CN.js"></script>	
	<script src="/Public/js/jquery.smarticker.js"></script>
	<script src="/Public/js/pages/public.js"></script>
	<script src="/Public/js/home/banner/banner.js"></script>
	<script>
		$(function() {					

			// 表格数据加载
			var $table = $('#movieTable'),
				$remove = $('#remove'),
				selections = [];
			
			// 时间格式化
			function regDateFormatter(value, row, index) {

				var date = getTime(row.regdate);
				if(row.regdate!=0){
					return date;
				}else {
					return row.regdate;
				}
				
			}
			
			// 时间格式化
			function lastDateFormatter(value, row, index) {

				var date = getTime(row.lastdate);
				if(row.regdate!=0){
					return date;
				}else {
					return row.regdate;
				}
				
			}
			
			
			// 获取后台格式化数组对象
			var arrList = <?php echo ($arrList); ?>; // 可使用parseJSON()方法转换JSON字符串到Object

			// 种类转换
			function kindFormatter(value, row, index) {
				var kindList = arrList.kindList;
				var rowStr = row.kind;
				var rowList = rowStr.split(",");
				var newStrList = '';

				// return rowStr.replace("DH","动画片");
				
				$.each(kindList,function(i,i_item){						
					$.each(rowList,function(o,o_item){
						if(i == o_item) {
							
							newStrList += i_item + '，';
						}
					});
				});
				// 截去最后一个逗号
				return newStrList.substring(0,newStrList.length-1);
			}
			
			// 语言转换
			function langFormatter(value, row, index) {
				var langList = arrList.langList;
				var rowStr = row.lang;
				var rowList = rowStr.split(",");
				var newStrList = '';
				
				$.each(langList,function(i,i_item){						
					$.each(rowList,function(o,o_item){
						if(i == o_item) {
							newStrList += i_item + '，';
						}
					});
				});
				// 截去最后一个逗号
				return newStrList.substring(0,newStrList.length-1);
			}
			
			// 地区转换
			function regionFormatter(value, row, index) {
				var regionList = arrList.regionList;
				var rowStr = row.region;
				var rowList = rowStr.split(",");
				var newStrList = '';
				
				$.each(regionList,function(i,i_item){						
					$.each(rowList,function(o,o_item){
						if(i == o_item) {
							newStrList += i_item + '，';
						}
					});
				});
				// 截去最后一个逗号
				return newStrList.substring(0,newStrList.length-1);
			}
			
			// 种子转换
			function is_seededFormatter(value, row, index) {
				var is_seededList = arrList.is_seededList;
				var rowStr = row.is_seeded;
				var rowList = rowStr.split(",");
				var newStrList = '';
				
				$.each(is_seededList,function(i,i_item){						
					$.each(rowList,function(o,o_item){
						if(i == o_item) {
							newStrList += i_item + '，';
						}
					});
				});
				// 截去最后一个逗号
				return newStrList.substring(0,newStrList.length-1);
			}
			
			// 清晰度转换
			function is_hdFormatter(value, row, index) {
				var is_hdList = arrList.is_hdList;
				var rowStr = row.is_hd;
				var rowList = rowStr.split(",");
				var newStrList = '';
				
				$.each(is_hdList,function(i,i_item){						
					$.each(rowList,function(o,o_item){
						if(i == o_item) {
							newStrList += i_item + '，';
						}
					});
				});
				// 截去最后一个逗号
				return newStrList.substring(0,newStrList.length-1);
			}
			
			// 链接格式化
			function linkFormatter(value, row, index) {
				console.log(row.moviename);
				var html = '<a class="movie-link" href="/videoDetail/'+row.vid+'.shtml"><i class="fa fa-thumbs-o-up"></i>'+row.videoname+'</a>'
					return html;						
			}
			
			// 请求数据地址
			var queryUrl = '/movieList' + '?rnd=' + +Math.random(); // 请求URL	
			
			// 表格初始化 
			$table.bootstrapTable({
				//height: getHeight(),
				method:'get',
				url: queryUrl,
				cache:false,
				//height:300,
				// toolbar:'#toolbar',
				striped:true,
				pagination:true,
				//sidePagination:'client',
				// pageNumber:1, //默认显示第几页数据
				pageSize:5,
				pageList:[10,20,30],
				search:true,
				// sortOrder:'desc',
				// showColumns:true,
				// showToggle:true,
				showRefresh:true,
				minimumCountColumns: 2,
				//rowStyle:rowStyle, // 行样式
				// clickToSelect: true,
				columns: [{
					field: 'vid',
					title: '序号',
					align: 'center',
					valign: 'middle'
				}, {
					field: 'kind',
					title: '类型',
					align: 'center',
					valign: 'middle',
					formatter: kindFormatter
				}, {
					field: 'regdate',
					title: '发布时间',
					align: 'center',
					valign: 'middle',
					formatter: regDateFormatter
				}, {
					field: 'lang',
					title: '资源语言',
					align: 'center',
					valign: 'middle',
					formatter: langFormatter
				}, {
					field: 'videoname',
					title: '资源名称',
					align: 'center',
					valign: 'middle',
					formatter: linkFormatter
				}, {
					field: 'size',
					title: '资源大小',
					align: 'center',
					valign: 'middle'
				}, {
					field: 'is_seeded',
					title: '是否种子',
					align: 'center',
					valign: 'middle',
					formatter: is_seededFormatter
				}, {
					field: 'is_hd',
					title: '清晰度',
					align: 'center',
					valign: 'middle',
					formatter: is_hdFormatter
				}, {
					field: 'downloadnum',
					title: '下载次数',
					align: 'center',
					valign: 'middle'
				}, {
					field: 'user',
					title: '发布者',
					align: 'center',
					valign: 'middle'
				}, {
					field: 'lastdate',
					title: '更新时间',
					align: 'center',
					valign: 'middle',
					formatter: lastDateFormatter
				}]	
			});
			
			//传递的参数
			function queryParams(params) {					 
				return {					 
					pageSize: params.pageSize,					 
					pageIndex: params.pageNumber,					 
					UserName: $("#txtName").val(),					 
					Birthday: $("#txtBirthday").val(),					 
					Gender: $("#Gender").val(),					 
					Address: $("#txtAddress").val(),					 
					name: params.sortName,					 
					order: params.sortOrder					 
				};					 
			}
			
		});
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