<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>朕乐后台 - 首页</title>

    <link rel="shortcut icon" href="/Public/img/favicon.ico"> 
	<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/js/plugins/bootstrap/css/bootstrap-table.min.css">
	<link rel="stylesheet" href="/Public/css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/Public/css/animate.min.css" />
	
	<link rel="stylesheet" href="/Public/css/admin/style.min.css" />
    <base target="_blank">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>网址综合数据</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="graph_flot.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="graph_flot.html#">选项1</a>
                                </li>
                                <li><a href="graph_flot.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    	<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
						<div id="website" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>网址用户数</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="graph_flot.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="graph_flot.html#">选项1</a>
                                </li>
                                <li><a href="graph_flot.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="userChart" style="height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script src="/Public/js/jquery.min.js"></script>
	<script src="/Public/js/plugins/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- ECharts单文件引入 -->
    <script src="/Public/js/plugins/echarts/echarts.common.min.js"></script>
    <script src="/Public/js/content.min.js"></script>
    
	<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var websiteChart = echarts.init(document.getElementById('website'));
        var userChart = echarts.init(document.getElementById('userChart'));
        
        // 指定图表的配置项和数据
        var option = {
		    tooltip : {
		        trigger: 'axis'
		    },
		    toolbox: {
		        show : true
		    },
//		    calculable : true,
		    legend: {
		        data:['蒸发量','降水量','平均温度']
		    },
		    xAxis : [
		        {
		            type : 'category',
		            data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
		        }
		    ],
		    yAxis : [
		        {
		            type : 'value',
		            name : '水量',
		            min: 0,
		            max: 250,
		            interval: 50,
		            axisLabel : {
		                formatter: '{value} ml'
		            }
		        },
		        {
		            type : 'value',
		            name : '温度',
		            min: 0,
		            max: 25,
		            interval: 5,
		            axisLabel : {
		                formatter: '{value} °C'
		            }
		        }
		    ],
		    series : [
		
		        {
		            name:'蒸发量',
		            type:'bar',
		            data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
		        },
		        {
		            name:'降水量',
		            type:'bar',
		            data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
		        },
		        {
		            name:'平均温度',
		            type:'line',
		            yAxisIndex: 1,
		            data:[2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
		        }
		    ]
		};

		var userData = {
            title: {
                text: '朕乐视频用户数据'
            },
            tooltip: {},
            legend: {
                data:['用户量']
            },
            xAxis: {
                data: ["VIP会员","普通用户","游客","管理员"]
            },
            yAxis: {},
            series: [{
                name: '用户量',
                type: 'bar',
                data: [5, 20, 36, 2]
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        websiteChart.setOption(option);
		
		userChart.setOption(userData);
		
    </script>
</body>

</html>