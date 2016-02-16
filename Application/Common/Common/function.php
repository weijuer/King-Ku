<?php
// +----------------------------------------------------------------------
// | 朕乐视频 [ 一家绝逼的视频网站 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.weijuer.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: weijuer <ch_weijuer@163.com> <http://www.weijuer.com>
// +----------------------------------------------------------------------



/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */

/**
 * 检测用户是否登录
 *
 * @return integer 0-未登录，大于0-当前登录用户ID
 * @author weijuer <ch_weijuer@163.com>
 */
function is_login_old() {
	$user = session ( 'userid' );
	if (empty ( $user )) {
		return 0;
	} else {
		return session ( 'user_auth_sign' ) == data_auth_sign ( $user ) ? $user ['uid'] : 0;
	}
}

/**
 * 检测用户是否登录
 *
 * @return boolean true-已登录，false-未登录
 * @author weijuer <ch_weijuer@163.com>
 */
 
function is_login() {
	$user = session ( 'userid' );
	if (empty ( $user )) {
		return true;
	} else {
		return false;
	}
}


/**
 * 检测当前用户是否为管理员
 *
 * @return boolean true-管理员，false-非管理员
 * @author weijuer <ch_weijuer@163.com>
 */
function is_administrator($uid = null) {
	$uid = is_null ( $uid ) ? is_login () : $uid;
	return $uid && (intval ( $uid ) === C ( 'USER_ADMINISTRATOR' ));
}


/**
 * 数据签名认证
 *
 * @param array $data
 *        	被认证的数据
 * @return string 签名
 * @author weijuer <ch_weijuer@163.com>
 */
function data_auth_sign($data) {
	// 数据类型检测
	if (! is_array ( $data )) {
		$data = ( array ) $data;
	}
	ksort ( $data ); // 排序
	$code = http_build_query ( $data ); // url编码并生成query字符串
	$sign = sha1 ( $code ); // 生成签名
	return $sign;
}


/* 添加isMobile方法 */
function isMobile_new() { 
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
    $mobile_agents = array("240x320", "acer", "acoon", "acs-", "abacho", "ahong", "airness", "alcatel", "amoi", 
        "android", "anywhereyougo.com", "applewebkit/525", "applewebkit/532", "asus", "audio", 
        "au-mic", "avantogo", "becker", "benq", "bilbo", "bird", "blackberry", "blazer", "bleu", 
        "cdm-", "compal", "coolpad", "danger", "dbtel", "dopod", "elaine", "eric", "etouch", "fly ", 
        "fly_", "fly-", "go.web", "goodaccess", "gradiente", "grundig", "haier", "hedy", "hitachi", 
        "htc", "huawei", "hutchison", "inno", "ipad", "ipaq", "iphone", "ipod", "jbrowser", "kddi", 
        "kgt", "kwc", "lenovo", "lg ", "lg2", "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-", "lge-", "lge9", "longcos", "maemo", 
        "mercator", "meridian", "micromax", "midp", "mini", "mitsu", "mmm", "mmp", "mobi", "mot-", 
        "moto", "nec-", "netfront", "newgen", "nexian", "nf-browser", "nintendo", "nitro", "nokia", 
        "nook", "novarra", "obigo", "palm", "panasonic", "pantech", "philips", "phone", "pg-", 
        "playstation", "pocket", "pt-", "qc-", "qtek", "rover", "sagem", "sama", "samu", "sanyo", 
        "samsung", "sch-", "scooter", "sec-", "sendo", "sgh-", "sharp", "siemens", "sie-", "softbank", 
        "sony", "spice", "sprint", "spv", "symbian", "tablet", "talkabout", "tcl-", "teleca", "telit", 
        "tianyu", "tim-", "toshiba", "tsm", "up.browser", "utec", "utstar", "verykool", "virgin", 
        "vk-", "voda", "voxtel", "vx", "wap", "wellco", "wig browser", "wii", "windows ce", 
        "wireless", "xda", "xde", "zte"); 
    $is_mobile = false; 
    foreach ($mobile_agents as $device) { 
        if (stristr($user_agent, $device)) { 
            $is_mobile = true; 
            break; 
        } 
    } 
    return $is_mobile; 
}


/* 添加isMobile方法 */
function isMobile_old(){
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
	return true;

	//此条摘自TPM智能切换模板引擎，适合TPM开发
	if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
	return true;
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA']))
	//找不到为flase,否则为true
	return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
	
	//判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array(
			'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
		);
		//从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	
	//协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}


/**
 * 检查是否是以手机浏览器进入(IN_MOBILE)
 */
function isMobile() {
	$mobile = array ();
	static $mobilebrowser_list = 'Mobile|iPhone|Android|WAP|NetFront|JAVA|OperasMini|UCWEB|WindowssCE|Symbian|Series|webOS|SonyEricsson|Sony|BlackBerry|Cellphone|dopod|Nokia|samsung|PalmSource|Xphone|Xda|Smartphone|PIEPlus|MEIZU|MIDP|CLDC';
	// note 获取手机浏览器
	if (preg_match ( "/$mobilebrowser_list/i", $_SERVER ['HTTP_USER_AGENT'], $mobile )) {
		return true;
	} else {
		if (preg_match ( '/(mozilla|chrome|safari|opera|m3gate|winwap|openwave)/i', $_SERVER ['HTTP_USER_AGENT'] )) {
			return false;
		} else {
			if ($_GET ['mobile'] === 'yes') {
				return true;
			} else {
				return false;
			}
		}
	}
}
function isiPhone() {
	return strpos ( $_SERVER ['HTTP_USER_AGENT'], 'iPhone' ) !== false;
}
function isiPad() {
	return strpos ( $_SERVER ['HTTP_USER_AGENT'], 'iPad' ) !== false;
}
function isiOS() {
	return isiPhone () || isiPad ();
}
function isAndroid() {
	return strpos ( $_SERVER ['HTTP_USER_AGENT'], 'Android' ) !== false;
}