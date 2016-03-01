
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
	
	// 顶部菜单搜索
	/**
     * 从 data参数中过滤数据
     */
    var testdataBsSuggest = $("#navSearch").bsSuggest({
        indexId: 2,  //data.value 的第几个数据，作为input输入框的内容
        indexKey: 1, //data.value 的第几个数据，作为input输入框的内容
        data: {
            'value':[
                {'id':'0','word':'寻龙诀','description':'电影《寻龙诀》'},
                {'id':'1','word':'等你等了很久','description':'歌曲《等你等了很久》'},
                {'id':'2','word':'那小子真帅','description':'美文《那小子真帅》'},
                {'id':'3','word':'功夫','description':'电影《功夫》'}
            ],
            'defaults':'http://lzw.me'
        }
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function (e) {
        console.log("onUnsetSelectValue");
    });
	
	// 选择按钮控制
	$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",});
	
	// 注册分布验证
	var form = $("#regForm");
	var regurl = "/User/regCheck";
	var flag =false;
	var e = "<i class='fa fa-times-circle'></i> ";
	form.validate({
		errorPlacement:function(error,element) {element.before(error);},
		rules: {
				username: {
					required: !0,
					minlength: 2
				},
				password: {
					required: !0,
					minlength: 5
				},
				repassword: {
					required: !0,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: !0,
					email: !0
				},
				nickname: {
					required: !0,
					maxlength: 4
				},
				age: {
					required: !0,
					maxlength: 2,
					min: 18
				},
				agree: "required"
			},
			messages: {
				username: {
					required: e + "请输入您的用户名",
					minlength: e + "用户名必须两个字符以上"
				},
				password: {
					required: e + "请输入您的密码",
					minlength: e + "密码必须5个字符以上"
				},
				repassword: {
					required: e + "请再次输入密码",
					minlength: e + "密码必须5个字符以上",
					equalTo: e + "两次输入的密码不一致"
				},
				email: {
					required: e + "请输入您的E-mail",
					email: e + "请输入正确的邮箱格式"
				},
				nickname: {
					required: e + "请输入您的姓名",
					maxlength: e + "姓名必须在四个字符以内"
				},
				age: {
					required: e + "请输入您的年龄",
					maxlength: e + "年龄必须在两个字符以内",
					min: e + "未满18岁不允许注册"
				},
				agree: {
					required: e + "必须同意协议后才能注册",
					element: "#agree-error"
				}
			}
	});
	
	form.steps({
		headerTag: "h1",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function(event,currentIndex,newIndex) {
			if(currentIndex > newIndex){return true}
			if(newIndex === 3 && Number($("#age").val()) < 18){return false}
			
			if(currentIndex < newIndex){
				$(".body:eq("+newIndex+") label.error",form).remove();
				$(".body:eq("+newIndex+") .error",form).removeClass("error")
			}
			form.validate().settings.ignore=":disabled,:hidden";
			return form.valid();

		},
//				onStepChanged: function(event,currentIndex,priorIndex) {
//					if(currentIndex===2 && Number($("#age").val()) >= 18){
//						$(this).steps("next")
//					}
//					if(currentIndex===2 && priorIndex===3){
//						$(this).steps("previous");
//					}
//					
//				},
		onFinishing: function(event,currentIndex) {
			form.validate().settings.ignore=":disabled";
			return form.valid();
		},
		onFinished:function(event,currentIndex) {
//					form.submit();

			var params = form.serialize();
			$.post(regurl,params,function(msg){
				if(msg.info == 'ok'){
					//注册成功后跳到登录页面，否则直接进入首页
					layer.msg("注册成功，正在加载...", {icon: 16});
					setTimeout(function(){
						window.location.href = msg.callback;
					}, 2000);
				}else {
					// errorMsg(msg.info);
					//正上方
					layer.msg(msg.info, {
						offset: ['220px', '45%'],
						shift: 6
					});
				}
			});
			
		}
	});
	
	
	// 登录按钮
	$(".login-btn").on("click",function(){
		var username = $("#loginUsername").val();
		var psw = $("#loginPassword").val();									
		
		if(isNull(username)){
			// errorMsg("请输入用户名！");
			//layer插件 tips层-上
			layer.tips("出错啦，用户名不能为空！", "#loginUsername", {
				tips: 1
			});
			return;
		}
		
		if(isNull(psw)){
			// errorMsg("请输入密码！");
			//layer插件 tips层-上
			layer.tips("出错啦，密码不能为空！", "#loginPassword", {
				tips: 1
			});
			return;
		}
		
		var pattern=/^([a-zA-Z0-9@_*#]{6,22})$/;
		if(!pattern.test(psw)){
			// errorMsg("密码格式不在确！");
			//layer插件 tips层-上
			layer.tips("出错啦，密码格式不在确！", "#loginPassword", {
				tips: 1
			});
			return;
		}
		
		var params=$("#LoginForm").serialize();
		var url = "/User/loginCheck";
		$.post(url,params,function( msg ) {
			if(msg.info == 'ok'){
				//登录后跳到登录页面，否则直接进入首页
				layer.msg("登录成功，正在加载...", {icon: 16});
				setTimeout(function(){
					window.location.href = msg.callback;
				}, 2000);
			}else {
				//正上方
				layer.msg(msg.info, {
					offset: ['220px', '45%'],
					shift: 6
				});
			}
		});
	});	
	
	
	// 百度自动推送
//		(function(){
//			var bp = document.createElement('script');
//			bp.src = '//push.zhanzhang.baidu.com/push.js';
//			var s = document.getElementsByTagName("script")[0];
//			s.parentNode.insertBefore(bp, s);
//		})();
	
});