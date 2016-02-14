<?php
/***********
* File: reply_sub01.php
* 微信公众号，测试号1的处理函数，最后返回utf-8值
* 最初的处理方法是，仅仅提示用户输入的内容
*
 **/

namespace WeChatAPI\Logic;

class SUB01 {
	
	//分支1接口函数
	public function reply_SUB01($key,$from,$to)  {
		//获取参数
		$key=$key;  
		$from=$from;
		$to=$to;

		$reply = SUB1_TEST.$key ;	 
		return $reply ;    //分支1处理后的结果	

	}
	
}

?>