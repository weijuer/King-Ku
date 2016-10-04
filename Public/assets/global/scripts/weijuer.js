var weijuer = function() {
	var t, e = !1,
	o = !1,
	a = !1,
	i = !1,
	n = [],
	theCall = function() {
		for(var t = 0; t < n.length; t++) {
			var e = n[t];
			e.call()
		}
	},
	sideBar = function() {
		/*
		 * 菜单触发
		 */
		$('.page-sidebar-menu .nav-item > a.nav-link').on('click', function(e){
			// 阻止默认点击事件
			e.preventDefault(),e.stopPropagation();
			
			var $this = $(this),
				$parent = $this.parent('li'),
				$lis = $('.page-sidebar-menu > li.nav-item');
				$ul = $(".page-sidebar-menu ul"),
				$submenu = $this.next('ul.sub-menu'),
				$arrow = $this.find('span.arrow'),
				uref = $this.attr('href'),
				isToggle = $this.hasClass('nav-toggle'),
				isOpen = $parent.hasClass('open'),
				speed = parseInt($('.page-sidebar-menu').data("slide-speed"));
			
			// 是否有子菜单
			if(isToggle) {
				
				// 是否已展开
				if(isOpen) {
					$parent.removeClass('open');
					$arrow.removeClass('open');
					$submenu.slideUp(speed);
				}else {
					$lis.removeClass('open');
					$parent.addClass('open');
					
					$('span.open').removeClass('open');
					$arrow.addClass('open');
					
					$('ul.sub-menu').slideUp(speed);
					$submenu.slideDown(speed);
				}
				
			}
			
			// 是否是可点击链接
			console.log(uref);
			if(uref !== null && uref !== 'javascript:;') {
				// set cookie
				Cookies.set('navState', uref, {path: '/'});
				location.href = uref;
			}
			
			
		});
		
		/*
		 * 菜单显示
		 */
		// get cookie
		var navState = Cookies.get('navState');
		if(navState != null) {
			$('.page-sidebar-menu .nav-item > a.nav-link').not('.nav-toggle').each(function() {
				var uref = $(this).attr('href'), ul = $(".page-sidebar-menu ul");
				
				if(uref === navState) {
					ul.children("li.active").removeClass("active");
					ul.children("arrow.open").removeClass("open");
					$(this).parents("li").each(function() {
						$(this).addClass("active"),
						$(this).children("a > span.arrow").addClass("open")
					});
					
					$(this).parents("li").addClass("active");
				}
			});
		}
	},
	iCheck = function() {
		/**
		 * iCheck初始化
		 */
		$().iCheck && $(".icheck").each(function() {
			var t = $(this).attr("data-checkbox") ? $(this).attr("data-checkbox") : "icheckbox_minimal-grey",
				e = $(this).attr("data-radio") ? $(this).attr("data-radio") : "iradio_minimal-grey";
			t.indexOf("_line") > -1 || e.indexOf("_line") > -1 ? $(this).iCheck({
				checkboxClass: t,
				radioClass: e,
				insert: '<div class="icheck_line-icon"></div>' + $(this).attr("data-label")
			}) : $(this).iCheck({
				checkboxClass: t,
				radioClass: e
			})
		});
	};
		
	return {
		init: function() {
			theCall(),
			sideBar(),
			iCheck()
		}
	};
	
}();

jQuery(document).ready(function() {
	weijuer.init();
});