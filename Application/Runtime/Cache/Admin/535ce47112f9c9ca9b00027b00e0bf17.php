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
				
				<h2>资源详情管理</h2>
				<div id="toolbar">
					<a href="javascript:window.location.href='<?php echo U('Admin/Video/videoDetailsAdd');?>'" target="_blank" id="add" class="btn btn-primary">
						<i class="glyphicon glyphicon-plus"></i> 新增
					</a>
					<button id="remove" class="btn btn-danger" disabled>
						<i class="glyphicon glyphicon-remove"></i> 删除已选
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
						$remove = $('#remove'),
						selections = [];
					
					// 时间格式化
					function regDateFormatter(value, row, index) {
						console.log(row.regdate);
						var date = getTime(row.regdate);
						if(row.regdate!=0){
							return date;
						}else {
							return row.regdate;
						}
						
					}
					
					// 时间格式化
					function lastDateFormatter(value, row, index) {
						console.log(row.lastdate);
						var date = getTime(row.lastdate);
						if(row.regdate!=0){
							return date;
						}else {
							return row.regdate;
						}
						
					}
					
					// 操作按钮
					function operateFormatter(value, row, index) {
						console.log(row.userid);
						return [
							'<a class="like text-primary" href="javascript:void(0);" title="收藏">',
								'<i class="glyphicon glyphicon-heart"></i>',
							'</a>',
							'<a class="operate-middle-item edit text-warning" href="javascript:void(0);" title="编辑">',
								'<i class="glyphicon glyphicon-edit"></i>',
							'</a>',
							'<a class="remove text-danger" href="javascript:void(0);" title="删除">',
								'<i class="glyphicon glyphicon-remove"></i>',
							'</a>'
						].join('');
					}
					
					// 定义操作事件
					window.operateEvents = {
						'click .like': function (e, value, row, index) {
							alert('You click like icon, row: ' + JSON.stringify(row));
							console.log(row);
						},
						'click .edit': function (e, value, row, index) {
							window.location.href = "/admin.php/Video/videoDetailsEdit/mid/" + row.mid;
							console.log(row.mid);
						},
						'click .remove': function (e, value, row, index) {
							// 获取选择行
							var mid = row.mid;
							
							//询问框
							layer.confirm('确定删除已选资源信息吗？', {
								btn: ['好的','取消'] //按钮
							}, function(){
							
								// 删除数据提交
								var params = {'mid':mid};
								var url = "/admin.php/Video/videoDetailsDelete";
								$.post(url,params,function(msg){
									if(msg.info == 'ok'){
										//删除页面表格数据
										$table.bootstrapTable('remove', {
											field: 'mid',
											values: mid
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
					var queryUrl = '/admin.php/Video/videoDetailsList' + '?rnd=' + +Math.random(); // 请求URL	
					
					// 表格初始化 
					$table.bootstrapTable({
						//height: getHeight(),
						method:'get',
						url: queryUrl,
						cache:false,
						//height:300,
						toolbar:'#toolbar',
						striped:true,
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
						},{
							field: 'mid',
							title: '序号',
							align: 'center',
							valign: 'middle',
							sortable: true
						},{
							field: 'kind',
							title: '分类',
							align: 'center',
							valign: 'middle',
							sortable: true
						},{
							field: 'regdate',
							title: '发布时间',
							sortable: true,
							align: 'center',
							valign: 'middle',
							formatter: regDateFormatter
						}, {
							field: 'moviename',
							title: '资源名称',
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
							valign: 'middle'							
						}, {
							field: 'is_hd',
							title: '是否高清',
							sortable: true,
							align: 'center',
							valign: 'middle'
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
						}, {
							field: 'operate',
							title: '操作',
							align: 'center',
							valign: 'middle',
							formatter: operateFormatter,
							events: operateEvents,
							clickToSelect: false
						}]	
					});
					

					// toolbar删除操作
					$table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
						$remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
					});
					
					$remove.click(function () {
						// 获取选择行
						var mids = $.map($table.bootstrapTable('getSelections'),function (row) {
							return row.mid
						});
						
						//询问框
						layer.confirm('确定删除已选资源信息吗？', {
							btn: ['好的','取消'] //按钮
						}, function(){
						
							// 删除数据提交
							var params = {'mid':mids.join(',')};
							var url = "/admin.php/Video/videoDelete";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									// 信息提示
									layer.msg('资源信息已删除！', {icon: 1});
									
									//删除页面表格数据
									$table.bootstrapTable('remove', {
										field: 'mid',
										values: mids
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

	<!--页面结束-->	

</body>

</html>