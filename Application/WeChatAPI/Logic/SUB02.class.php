<?php
/*
* File: reply_SUB02.php
* 微信公众号，测试号2的处理函数，最后返回utf-8值
* 处理方法 ，仅仅提示用户输入的内容
* 先获取参数，然后根据关键字的不同，给出不同的回复内容
* 其中0、1是回复固定的信息
* 其中2、3是回复音乐格式信息
* 其中4是回复图文格式
* 其他关键字直接回复
* 目前实现了来源为文字信息的回复
* 实现了关注事件、取消关注事件的回复
*
 */

namespace WeChatAPI\Logic; 

//取IP地址的服务类
use WeChatAPI\Service\CommonInfo;
//天气预报的服务类
use WeChatAPI\Service\TianQi;

//测试号2的处理逻辑，根据收到的关键字来进行相应的回复
class SUB02 {
	
  function reply_SUB02($key,$from,$to)  {	
	
	//获取参数，如果要调用小九等API，需要URL转码传出
	$key=$key;  
	$from=$from;
	$to=$to;
	
	//根据关键字来回复不同的内容
	if ($key == '0'){    
		//如果发送的是数字0则回复以下内容
		$reply = REPLY_STR03 ;		
	}else if($key == '1'){
		//如果发送的是数字1则回复以下内容
		$reply = REPLY_STR04 ;      
	}else if($key == '2'){
		//如果发送的是数字2则回复以下内容，返回语言信息，天路，使用百度云，存储音乐文件
		$reply = array(
			"title" =>  get_utf8_string("天路") ,
			"description" =>  get_utf8_string("韩红的歌-语音回复") ,           
			"murl" =>  get_utf8_string("http://bcs.duapp.com/datahome128/audio/001.mp3") , 
			"hqurl" =>  get_utf8_string("http://bcs.duapp.com/datahome128/audio/001.mp3")
		);
	}else if($key == '3'){
		//如果发送的是数字3则回复以下内容，返回语言信息
		$reply = array(
			"title" =>  get_utf8_string("你好"),
			"description" =>  get_utf8_string("亲爱的主人"),           
			"murl" =>  get_utf8_string("http://weixen-file.stor.sinaapp.com/b/xiaojo.mp3"), 
			"hqurl" =>  get_utf8_string("http://weixen-file.stor.sinaapp.com/b/xiaojo.mp3"),
		);
	}else if($key == '4'){
		//如果发送的是数字4则回复以下内容，则返回刮刮乐的图片,单图文测试
		//刮刮乐图片地址
		//根据随机数，掉用不同的页面
		$num=rand(1,4); //设置随机函数
		switch ($num){
		case "1";
			$html_url="http://bcs.duapp.com/datahome128/image/1.html";
			break;
		case "2";
			$html_url="http://bcs.duapp.com/datahome128/image/2.html";
			break;
		case "3";
			$html_url="http://bcs.duapp.com/datahome128/image/3.html";
			break;
		default;
			$html_url="http://bcs.duapp.com/datahome128/image/4.html";
			break;						
		}
		//组合成图文信息的数组				
		$reply = array(
			"title" =>  get_utf8_string("刮刮乐"),
			"description" =>  get_utf8_string("测试图文信息回复-刮刮乐"),           
			"pic" =>  get_utf8_string("http://bcs.duapp.com/datahome128/image/ggl.jpg"), //图片URL地址
			"url" =>  get_utf8_string($html_url) 
		);		
	}else if($key == '5'){
		//如果发送的是数字5则回复以下内容，多图文测试
		$reply = array(
			'0' => array(
				'title' => get_utf8_string('观前街'),
				'description' => get_utf8_string('观前街位于江苏苏州市区'),
				'pic' => get_utf8_string('http://joythink.duapp.com/images/suzhou.jpg'),
				'url' => get_utf8_string('http://mp.weixin.qq.com') 
			),
			'1' => array(
				'title' => get_utf8_string('拙政园'),
				'description' => get_utf8_string('拙政园位于江苏省苏州市平江区'),
				'pic' => get_utf8_string('http://joythink.duapp.com/images/suzhouScenic/zhuozhengyuan.jpg'),
				'url' => get_utf8_string('http://mp.weixin.qq.com') 
			)
		);		
	}else if($key == '6'){
		//如果发送的是数字6则回复以下内容，返回IP地址  
		//获取IP地址		
		$commonInfo = new CommonInfo();						
		$ipaddr = $commonInfo->getClientIp();   //取IP地址
		$reply = SUB2_IP_ADD . $ipaddr . "\r\n"	;	
	}else if($key == '7'){
		//  百度翻译函数的测试，翻译内容是  我爱你 
		$reply = baiduDic('I love you');
	}else if($key == '8'){
		//如果发送的是数字8则，回复珠海天气预报
		$tianqiObj = new TianQi();		
		$reply = $tianqiObj->weather('珠海');
	}else if($key == '11'){
		// 数据库的测试 ，查询，新增
		
		$Mysql = M("Mysql");		
		// 查找  数据 
		$result = $Mysql->where("from_user='%s'",$from)->find(); 
		if($result) {
 			//
			$reply = '读取数据成功!';
		}else{
 			//
			$reply = '读取数据不存在';
			//写入一条
			$data['from_user'] = $from ;
			$data['update_time'] = date("Y-m-d G:i:s");
			$Mysql->add($data);
			
		}
	}else if($key == '12'){
		// 数据库的测试 ，删除
		
		$Mysql = M("Mysql");		
		// 查找  数据 
		$result = $Mysql->where("from_user='%s'",$from)->delete() ; 
		if($result) {
 			//
			$reply = '删除数据成功!';
		}else{
 			//
			$reply = '数据不存在';			
		}	
		//$reply =  REPLY_DB_TEST_STR ;
	}else if($key == '13'){
		// 数据库的测试 ，更新
		
		$Mysql = M("Mysql");
		$data['account'] = "".rand(10000, 99999) ;
		$data['update_time'] = date("Y-m-d G:i:s");		
		// 更新  数据 
		$result = $Mysql->where("from_user='%s'",$from)->save($data);
		if($result) {
 			//
			$reply = '更新数据成功!';
		}else{
 			//
			$reply = '更新数据不成功';			
		}	
		//$reply =  REPLY_DB_TEST_STR ;		

	}else if($key == 'subscribe'){
		//如果关键字是 subscribe 则是关注事件
		$reply = REPLY_SUBSCRIBE ;
	}else if($key == 'unsubscribe'){
		//如果关键字是 unsubscribe 则是取消关注事件
		$reply = REPLY_UNSUBSCRIBE ;	
	}else {
		//默认回复文字消息			
		$reply = SUB2_TEST.$key ;		
	}
	return $reply ;    //分支2处理后的结果		
  }

	
}//类的结束点

?>