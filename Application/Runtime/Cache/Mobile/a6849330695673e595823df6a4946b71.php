<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head class="no-skrollr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>朕的妞妞-生日快乐</title>
<link rel="stylesheet" href="/Public/demo/css/style.css" />
<!--<bgsound src="/Public/demo/music/Zaynah.mp3" loop="1">-->
</head>

<body>
	<div id="bg1" data-0="background-position:0px 0px;" data-end="background-position:-500px -10000px;"></div>
	<div id="bg2" data-0="background-position:0px 0px;" data-end="background-position:-500px -8000px;"></div>
	<div id="bg3" data-0="background-position:0px 0px;" data-end="background-position:-500px -6000px;"></div>
    
<div id="progress" data-0="width:0%;background:hsl(200, 100%, 50%);" data-end="width:100%;background:hsl(920, 100%, 50%);"></div>

<div id="intro" data-0="opacity:1;top:3%;transform:rotate(0deg);transform-origin:0 0;" data-500="opacity:0;top:-10%;transform:rotate(-90deg);">
		<h1>今天是2016年1月23日，农历腊月十四</h1>
		<p class="sub-title">天气稍微有点凉！</p>
</div>
    
<div id="transform" data-500="transform:scale(0) rotate(0deg);" data-1000="transform:scale(1) rotate(1440deg);opacity:1;" data-1600="" data-1700="transform:scale(5) rotate(3240deg);opacity:0;">
		<h1>朕的妞妞，奔三啦！</h1>
		<div class="img-box"><img src="/Public/demo/images/img/2016.jpg"/></div>
</div>

<div id="properties" data-1700="top:100%;" data-2200="top:0%;" data-3000="display:block;" data-3500="top:-100%;display:none;">
		<h2>【我们奔三的80后】</h2>
		<div class="content-box">
	        <p class="sub-content">我们奔三的80后，每天起床的时间从中午12点变成早上7点，睡觉的时间从凌晨2点变成了晚上11点；
				开始工作，开始接触形形色色的人；
				下班路过学校，看见学校放学，我们会怀念我们上学的时候；
				见到亲戚朋友，他们不再问你考试考了几分，更多的是问现在一个月工资多少；
				聊天的话题，从各种网络游戏变成汽车、房子，吃饭的时候讨论的往往是他准备结婚，她哪年结婚；
				每天不再感叹学校有多少作业做不完，开始感叹油价、房价涨的有多快；
				不再乱买东西，月底开始算计这个月还了信用卡，还了房贷，还剩下多少钱；
				渐渐地讨厌酒吧、KTV，喜欢亲近自然，喜欢健康的生活方式；
				偶尔会有寂寞，偶尔会挂念一个人；
				我们开始追逐梦想，不会再轻易流泪，不会再为了一点挫折而放弃；
				没有了年少的轻狂，把遇到的挫折困难都当成一种人生的阅历，试着去包容，试着去忍耐；
	        </p>
        </div>
</div>
    
<div id="easing_wrapper" data-0="display:none;" data-3900="display:block;" data-4900="background:rgba(0, 0, 0, 0);color[swing]:rgb(0,0,0);" data-5900="background:rgba(0,0,0,1);color:rgb(255,255,255);" data-10000="top:0%;" data-12000="top:-100%;">
	<div id="easing" data-3900="left:100%" data-4600="left:25%;">
		<h2>Surprise?</h2>
		<p>Sure.</p>
		<p>let me dim the <span data-3900="" data-4900="color[swing]:rgb(0,0,0);" data-5900="color:rgb(255,255,0);">lights</span> for this one...</p>
		<p data-5900="opacity:0;font-size:100%;" data-6500="opacity:1;font-size:150%;">I just wanna tell U that I LOVE U since I met U, and I still do! </p>
	</div>

	<div class="drop" data-6500="left:10%;bottom:100%;" data-9500="bottom:0%;color:rgb(255, 0, 0);">祝</div>
	<div class="drop" data-6500="left:20%;bottom[quadratic]:100%;" data-9500="bottom:0%;color:rgb(255,255,0);">妞妞</div>
	<div class="drop" data-6500="left:35%;bottom[cubic]:100%;" data-9500="bottom:0%;">生</div>
	<div class="drop" data-6500="left:45%;bottom[swing]:100%;" data-9500="bottom:0%;">日</div>
	<div class="drop" data-6500="left:55%;bottom[WTF]:100%;" data-9500="bottom:0%;">快</div>
	<div class="drop" data-6500="left:65%;bottom[inverted]:100%;" data-9500="bottom:0%;">乐</div>
	<div class="drop" data-6500="left:75%;bottom[bounce]:100%;" data-9500="bottom:0%;">！</div>
</div>

<div id="end" data-10000="top[cubic]:100%;border-radius[cubic]:0em;background:rgb(0,50,100);border-width:0px;" data-12000="top:10%;border-radius:2em;background:rgb(190,230,255);border-width:6px;">
		<h2>The End</h2>
		<p>感谢生命中有你。</p>
</div>
<div class="player">
    <audio autoplay="autoplay">
        <!-- Audio files -->
        <source src="/Public/demo/music/Zaynah.mp3" type="audio/mp3" />
        <embed hidden="true" autostart="true" src="/Public/demo/music/Zaynah.mp3" />
        您的浏览器不支持在线播放，请<a href="/Public/demo/music/Zaynah.mp3">下载</a>
    </audio>
</div>
<script src="/Public/demo/js/skrollr.min.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="js/skrollr.ie.min.js"></script><![endif]-->
<script>
var s = skrollr.init({
		edgeStrategy: 'set',
		easing: {
			WTF: Math.random,
			inverted: function(p) {
				return 1-p;
			}
		}
	});
</script>


</body>
</html>