
// mui初始化
mui.init({
	swipeBack: false,
	statusBarBackground: '#f7f7f7',
	gestureConfig: {
		doubletap: true
	}
});

//获得slider插件对象
var gallery = mui("#gallery");
gallery.slider({
  interval:3000//自动轮播周期，若为0则不自动播放，默认为0；
});


// 底部选项卡点击事件
mui('.mui-bar-tab').on('tap', 'a', function(e) {
//	var targetTab = this.getAttribute('href');

	//更换顶部标题
	var title = document.getElementById("title");
	title.innerHTML = this.querySelector('.mui-tab-label').innerHTML;

});

// 添加列表项的点击事件
//mui("#videoList").on('tap','a',function(){
//	var id = this.getAttribute('data-id');
//	// 获得详情页面
//	mui.alert('该功能尚未完善哦~', '朕乐视频');
//	
//});

mui("#articleList").on('tap','a',function(){
	// 获得详情页面
	alert('该功能尚未完善哦~', '朕乐视频');
});

mui("#gallery").on('tap','a',function(){
	// 获得详情页面
	mui.alert('还没有赞助商哦~', '朕乐视频');
});