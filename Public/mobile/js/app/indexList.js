// mui初始化
mui.init({
	// 预加载详情页
	preloadPages:[{
		url:'subPages/videoDetail.html',
		id:'videoDetail'
	}
	]
});

//获得slider插件对象
var gallery = mui("#gallery");
gallery.slider({
  interval:3000//自动轮播周期，若为0则不自动播放，默认为0；
});

mui.plusReady(function(){
  	//获取电影列表
	mui.ajax('http://www.weijuer.com/mobile.php/News/getVideoList',{
		dataType:'json',
		type:'GET',
		timeout:10000,
		success:function(data){
			//服务器返回响应
			var ul = document.body.querySelector("#videoList");
			var resData = data;
			//遍历的对象
			mui.each(resData,function(index,item){
				var li = document.createElement('li');  // 创建li子节点
				li.className = 'mui-table-view-cell mui-media mui-col-xs-4'; // 添加li子节点样式
				li.innerHTML = '<a data-id="'+item.vid+'" class="a-link" href="javascript:;">'
		                    		+'<span class="label label-new">NEW</span>'
		                    		+'<img class="mui-media-object" src="http://192.168.1.100/Public/images/poster/'+item.poster+'">'
		                            +'<div class="mui-media-body">'+item.videoname+'</div>'
	                    		+'</a>';

				//新纪录插到最前面
				ul.appendChild(li);
			});
			
			var detailPage = null;
			// 添加列表项的点击事件
			mui("#videoList").on('tap','a',function(){
				var id = this.getAttribute('data-id');
				// 获得详情页面
				if(!detailPage){
					detailPage = plus.webview.getWebviewById("videoDetail");
				}
				
				// 触发详情页的newsId事件,传参数id等信息
				mui.fire(detailPage,'videosId',{
					id:id
				});
				
				// 打开详情页
				mui.openWindow({
					id:'videoDetail'
				});
				
			});
			
			
		},
		error:function(xhr,type,errorThrown){
			//异常处理；
			console.log(type);
		}
	});
});

