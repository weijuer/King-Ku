$(document).ready(function(){	
	
	$(".add-btn").on("click",function(){
		window.location.href = "{:U('Admin/Index/add')}";
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
	
	
	// 时间格式化
	function dateFormatter(value, row, index) {
		console.log(row.regdate);
		if(row.regdate!=0){
			var date = getTime(row.regdate);
			return date;
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
			console.log(row);
		},
		'click .edit': function (e, value, row, index) {
			// alert('You click edit icon, row: ' + JSON.stringify(row));
			//window.location.href = "{:U('Admin/Index/add?id="row.id"')}";
			window.location.href = "__URL__/edit/id/" + row.userid;
			console.log(row.id);
		},
		'click .remove': function (e, value, row, index) {
			alert('You click remove icon, row: ' + JSON.stringify(row));
			console.log(value, row, index);
		}
	};
	
	// 表格数据加载
	var $table = $('#userTable'),
		$remove = $('#remove'),
		selections = [];
	var queryUrl = '__URL__/muserRead' + '?rnd=' + +Math.random(); // 请求URL	
	
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
		rowStyle:rowStyle, // 行样式
		clickToSelect: true,
		columns: [{
			field: 'state',
			checkbox: true,
			align: 'center',
			valign: 'middle'
		},{
			field: 'userid',
			title: '序号',
			sortable: true
		}, {
			field: 'username',
			title: '用户名'
		}, {
			field: 'email',
			title: '邮箱',
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
			formatter: dateFormatter
		}, {
			field: 'lastdate',
			title: '最近一次登录',
			sortable: true,
			align: 'center',
			valign: 'middle',
			formatter: dateFormatter
		}, {
			field: 'regip',
			title: '注册IP'
		}, {
			field: 'loginnum',
			title: '登录次数'
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
			return row.id
		});
		
		$table.bootstrapTable('remove', {
			field: 'id',
			values: ids
		});
		alert('已经删除选择,rows: ' + ids);
		$remove.prop('disabled', true);
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