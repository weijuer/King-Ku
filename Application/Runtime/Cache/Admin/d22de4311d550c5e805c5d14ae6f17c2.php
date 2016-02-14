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
			<!-- <h2>用户管理</h2> -->
			<div id="toolbar">
				<a class="btn btn-primary add-btn" href="javascript:void(0);">
					<i class="glyphicon glyphicon-plus"></i> 新增
				</a>
				<button id="remove" class="btn btn-danger" disabled>
					<i class="glyphicon glyphicon-remove"></i> 删除已选
				</button>

			</div>
			<table id="userTable"></table>
			
			<!-- 新增模态框 -->
			<div id="modal-museradd-form" class="modal fade" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">									
								<h3 class="m-t-none m-b">新增</h3>
								<form class="form-horizontal m-t" id="muserForm" method="post" action="/admin.php/Index/addCheck" novalidate="novalidate">
									<div class="form-group">
										<label class="col-sm-3 control-label">昵称：</label>
										<div class="col-sm-8">
											<input id="cusername" name="username" minlength="2" type="text" class="form-control" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">邮箱：</label>
										<div class="col-sm-8">
											<input id="cemail" type="email" class="form-control" name="email" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">内容：</label>
										<div class="col-sm-8">
											<textarea id="ccontent" name="content" class="form-control" required="" aria-required="true"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 col-sm-offset-3">
											<button class="btn btn-primary" type="button">提交</button>
											<button class="btn btn-default" type="button"  data-dismiss="modal">
												关闭
											</button>
										</div>
										<!--错误提示-->
										<div class="col-sm-3 err-tips err-display" id="error" ></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="/Public/js/pages/public.js"></script>
		<script src="/Public/js/plugins/layer/layer.min.js"></script>
		<script>
			$(document).ready(function(){	
				
				$(".add-btn").on("click",function(){
					window.location.href = "<?php echo U('Admin/Index/muserAdd');?>";
				});
				
				// 行样式设置
				function rowStyle(row, index) {
					var classes = ['active', 'success', 'info', 'warning', 'danger'];

					if (row.reply ==null) {
						return {
							classes: 'warning'
						};
					}
					return {};
				}
				
				
				// 表格数据加载
				var $table = $('#userTable'),
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
					// console.log(row.lastdate);
					var date = getTime(row.lastdate);
					if(row.regdate!=0){
						return date;
					}else {
						return row.regdate;
					}
					
				}
				
				// 操作按钮
				function operateFormatter(value, row, index) {
					// console.log(row.userid);
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
						// console.log(row);
					},
					'click .edit': function (e, value, row, index) {
						// alert('You click edit icon, row: ' + JSON.stringify(row));
						//window.location.href = "<?php echo U('Admin/Index/add?id="row.id"');?>";
						window.location.href = "/admin.php/Index/muserEdit/userid/" + row.userid;
						// console.log(row.userid);
					},
					'click .remove': function (e, value, row, index) {
						// 获取选择行
						var uid = row.userid;
						
						//询问框
						layer.confirm('确定删除已选用户信息吗？', {
							btn: ['好的','取消'] //按钮
						}, function(){
						
							// 删除数据提交
							var params = {'userid':uid};
							var url = "/admin.php/Index/muserDelete";
							$.post(url,params,function(msg){
								if(msg.info == 'ok'){
									
									//删除页面表格数据
									$table.bootstrapTable('remove', {
										field: 'userid',
										values: uid
									});
									
									// 信息提示
									layer.msg('用户信息已删除！', {icon: 1});
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
				var queryUrl = '/admin.php/Index/muserRead' + '?rnd=' + +Math.random(); // 请求URL	
				
				// 表格初始化 
				$('#userTable').bootstrapTable({
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
					//rowStyle:rowStyle, // 行样式
					clickToSelect: true,
					columns: [{
						field: 'state',
						checkbox: true,
						align: 'center',
						valign: 'middle'
					},{
						field: 'userid',
						title: '序号',
						sortable: true,
						align: 'center',
						valign: 'middle'
					}, {
						field: 'username',
						title: '用户名',
						align: 'center',
						valign: 'middle'
					}, {
						field: 'email',
						title: '邮箱',
						align: 'center',
						valign: 'middle',
						editable: {
							type: 'text',
							title: '邮箱',
							validate: function (value) {
								value = $.trim(value);
								if (!value) {
									return 'This field is required';
								}
								if (!/^$/.test(value)) {
									return 'This field needs to start width $.'
								}
								var data = $table.bootstrapTable('getData'),
									index = $(this).parents('tr').data('index');
								console.log(data[index]);
								return '';
							}
						}
					}, {
						field: 'regdate',
						title: '注册时间',
						sortable: true,
						align: 'center',
						valign: 'middle',
						formatter: regDateFormatter
					}, {
						field: 'lastdate',
						title: '最近一次登录',
						sortable: true,
						align: 'center',
						valign: 'middle',
						formatter: lastDateFormatter
					}, {
						field: 'regip',
						title: '注册IP',
						align: 'center',
						valign: 'middle'
					}, {
						field: 'loginnum',
						title: '登录次数',
						align: 'center',
						valign: 'middle'
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
					var ids = $.map($table.bootstrapTable('getSelections'),function (row) {
						return row.userid
					});
					
					// alert('已经删除选择,rows: ' + ids);
					//询问框
					layer.confirm('确定删除已选用户信息吗？', {
						btn: ['好的','取消'] //按钮
					}, function(){
					
						// 删除数据提交
						var params = {'userid':ids.join(',')};
						var url = "/admin.php/Index/muserDelete";
						$.post(url,params,function(msg){
							if(msg.info == 'ok'){
								// 信息提示
								layer.msg('用户信息已删除！', {icon: 1});
								
								//删除页面表格数据
								$table.bootstrapTable('remove', {
									field: 'userid',
									values: ids
								});
								// 设置删除按钮为不可操作
								$remove.prop('disabled', true);
								
								// window.location.href = msg.callback;
							}else {
								layer.msg(msg.info);
								// errorMsg(msg.info);
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
	</body>
</html>	
	<!--页面结束-->	

</body>

</html>