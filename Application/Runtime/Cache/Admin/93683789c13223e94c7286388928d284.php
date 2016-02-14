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
				
				<h2>资源管理</h2>
				<div id="toolbar">
					<a href="javascript:window.location.href='<?php echo U('Admin/Video/videoAdd');?>'" target="_blank" id="toolbarAdd" class="btn btn-primary">
						<i class="fa fa-plus"></i> 新增
					</a>
					<button id="toolbarEdit" class="btn btn-primary" href="javascript:window.location.href='<?php echo U('Admin/Video/videoEdit',array('vid'=>$vid));?>'" disabled>
						<i class="fa fa-edit"></i> 编辑
					</button>
					<button id="toolbarRemove" class="btn btn-danger" disabled>
						<i class="fa fa-times"></i> 删除已选
					</button>

				</div>
				<table id="movieTable"></table>
			</div>
			
			<script src="/Public/js/pages/public.js"></script>
			<script src="/Public/js/plugins/layer/layer.min.js"></script>
			<script>
				$(function() {
					
					//判断用户是否登录，如果没有登录，则跳转到登录页面
					var user = "<?php echo (session('username')); ?>";
					if(user == "" || user == null){
						window.location.href = "/admin.php/Login/login";
					}
					
					//退出登录
					$(".logout-btn").on("click",function(){
						window.location.href = "/admin.php/Login/logout";
					});
					
					// 表格数据加载
					var $table = $('#movieTable'),
						$remove = $('#toolbarRemove'),
						$edit = $('#toolbarEdit'),
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
					
					// 海报截图转换
					function posterFormatter(value, row, index) {
						return '<img id="poster" class="img-round img-view-sm" src="/Public/images/poster/'+row.poster+'" />';
					}
					
					// 海报截图转换
					function shotcutsFormatter(value, row, index) {
						return '<img id="shotcuts" class="img-round img-view-sm" src="/Public/images/shotcuts/'+row.shotcuts+'" />';
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
					
					// 定义海报图片操作事件
					window.posterEvents = {
						'click #poster': function (e, value, row, index) {
							// e.preventDefault();
							// console.log(row.poster);
							//页面层
							layer.open({
								type: 1,
								title: '图片预览',
								skin: 'layui-layer-rim', //加上边框
								shadeClose: true, //开启遮罩关闭
								area: '450px', //宽高
								content: '<img class="img-resposive" src="/Public/images/poster/'+row.poster+'" />'
							});					
						}
					}
					
					// 定义截图操作事件
					window.shotcutsEvents = {
						'click #shotcuts': function (e, value, row, index) {
							//页面层
							layer.open({
								type: 1,
								title: '图片预览',
								skin: 'layui-layer-nobg', //没有背景色
								shadeClose: true, //开启遮罩关闭
								area: '500px', //宽高['1px','1px']
								content: '<img class="img-resposive" src="/Public/images/shotcuts/'+row.shotcuts+'" />'
							});					
						}
					}
					
					
					// 操作按钮定义
					function operateFormatter(value, row, index) {

						return [
							'<a class="like text-primary" href="javascript:void(0);" title="收藏">',
								'<i class="fa fa-heart"></i>',
							'</a>',
							'<a class="operate-middle-item edit text-warning" href="javascript:void(0);" title="编辑">',
								'<i class="fa fa-edit"></i>',
							'</a>',
							'<a class="remove text-danger" href="javascript:void(0);" title="删除">',
								'<i class="fa fa-times"></i>',
							'</a>'
						].join('');
					}
					
					// 定义操作事件
					window.operateEvents = {
						'click .like': function (e, value, row, index) {
							alert('You click like icon, row: ' + JSON.stringify(row));
							//console.log(row);
						},
						'click .edit': function (e, value, row, index) {
							window.location.href = "/admin.php/Video/videoEdit/vid/" + row.vid;
							console.log(row);
						},
						'click .remove': function (e, value, row, index) {
							// 获取选择行
							var vid = row.vid;
							
							//询问框
							layer.confirm('确定删除已选资源信息吗？', {
								btn: ['好的','取消'] //按钮
							}, function(){
							
								// 删除数据提交
								var params = {'vid':vid};
								var url = "/admin.php/Video/videoDelete";
								$.post(url,params,function(msg){
									if(msg.info == 'ok'){
										//删除页面表格数据
										$table.bootstrapTable('remove', {
											field: 'vid',
											values: vid
										});
										
										// 信息提示
										layer.msg('资源信息已删除！', {icon: 1});
										
									}else {
										layer.msg(msg.info);
									}
								});
							}, function(){
								layer.msg('啥都没动！', {
									time: 2000 //2s后自动关闭				
								});
							});
						}
					};
					
					// 请求数据地址
					var queryUrl = '/admin.php/Video/videoList' + '?rnd=' + +Math.random(); // 请求URL	
					
					// 表格初始化 
					$table.bootstrapTable({
						//height: getHeight(),
						method:'get',
						url: queryUrl,
						cache:false,
						//height:300,
						toolbar:'#toolbar',
						// classes:'table table-hover',
						striped:true,
						//iconsPrefix:'fa', // 默认字体图标设置
						pagination:true,
						//sidePagination:'client',
						// pageNumber:1, //默认显示第几页数据
						pageSize:5,
						pageList:[10,20,30],
						search:true,
						showColumns:true,
						showToggle:true,
						showRefresh:true,
						minimumCountColumns: 2,
						// rowStyle:rowStyle, // 行样式
						clickToSelect: true,
						columns: [{
							field: 'state',
							checkbox: true,
							align: 'center',
							valign: 'middle'
						}, {
							field: 'vid',
							title: '序号',
							align: 'center',
							valign: 'middle',
							sortable: true
						}, {
							field: 'operate',
							title: '操作',
							align: 'center',
							valign: 'middle',
							formatter: operateFormatter,
							events: operateEvents,
							clickToSelect: false
						}, {
							field: 'kind',
							title: '分类',
							align: 'center',
							valign: 'middle',
							sortable: true,
							formatter: kindFormatter
						},{
							field: 'regdate',
							title: '发布时间',
							sortable: true,
							align: 'center',
							valign: 'middle',
							formatter: regDateFormatter
						}, {
							field: 'videoname',
							title: '资源名称',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'lang',
							title: '资源语言',
							align: 'center',
							valign: 'middle',
							formatter: langFormatter
						}, {
							field: 'age',
							title: '年代',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'region',
							title: '地区',
							align: 'center',
							valign: 'middle',
							formatter: regionFormatter
						}, {
							field: 'director',
							title: '导演',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'casts',
							title: '主演',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'poster',
							title: '资源海报',
							align: 'center',
							valign: 'middle',
							width: 200,
							formatter: posterFormatter,
							events: posterEvents,
							clickToSelect: false
						}, {
							field: 'plot',
							title: '剧情简介',
							width:  '20%',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'shotcuts',
							title: '影片截图',
							align: 'center',
							valign: 'middle',
							formatter: shotcutsFormatter,
							events: shotcutsEvents,
							clickToSelect: false
						},{
							field: 'video_details',
							title: '影片详情',
							align: 'center',
							valign: 'middle'
						}, {
							field: 'size',
							title: '资源大小',
							align: 'center',
							valign: 'middle'							
						}, {
							field: 'is_seeded',
							title: '是否种子',
							sortable: true,
							align: 'center',
							valign: 'middle',
							formatter: is_seededFormatter
						}, {
							field: 'is_hd',
							title: '清晰度',
							sortable: true,
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
					

					// toolbar编辑操作
					$table.on('check.bs.table uncheck.bs.table', function () {
						$edit.prop('disabled', !$table.bootstrapTable('getSelections').length);
					});
					
					$edit.click(function () {
						// 获取选择行
						var vid = $.map($table.bootstrapTable('getSelections'),function (row) {
							return row.vid
						});
						window.location.href = "/admin.php/Video/videoEdit/vid/" + vid;
					});
					
					
					// toolbar删除操作
					$table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
						$remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
					});
					
					$remove.click(function () {
						// 获取选择行
						var vids = $.map($table.bootstrapTable('getSelections'),function (row) {
							return row.vid
						});
						
						//询问框
						layer.confirm('确定删除已选资源信息吗？', {
							btn: ['好的','取消'] //按钮
						}, function(){
						
							// 删除数据提交
							var params = {'vid':vids.join(',')};
							var url = "/admin.php/Video/videoDelete";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									// 信息提示
									layer.msg('资源信息已删除！', {icon: 1});
									
									//删除页面表格数据
									$table.bootstrapTable('remove', {
										field: 'vid',
										values: vids
									});
									// 设置删除按钮为不可操作
									$remove.prop('disabled', true);
									
									// window.location.href = msg.callback;
								}else {
									layer.msg(msg.info);
								}
							});
						}, function(){
							layer.msg('啥都没动！', {
								time: 2000 //2s后自动关闭				
							});
						});
					});
					
					//传递的参数

					
				});

			</script>

	<!--页面结束-->	

</body>

</html>