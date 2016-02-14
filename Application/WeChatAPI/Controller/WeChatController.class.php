<?php
//命名空间
namespace WeChatAPI\Controller;

use WeChatAPI\Service\Wechat; 
use WeChatAPI\Service\CommonInfo;
use WeChatAPI\Service\BiaoQing;
use WeChatAPI\Logic\SUB01;
use WeChatAPI\Logic\SUB02;
 


//扩展类的开始点
//事件触发过程，根据收到的来源信息，做相应的处理后返回
//微信处理函数的 主体
class WeChatController extends  Wechat {

    /**
     * 创建菜单,并获取菜单
     * @return void
     */

	
    /**
     * 分析消息类型，并分发给对应的函数
     * @return void
     */
    
	public function run() {

		//效验签名
		$this->valid();
		//获取来源信息
		$type = $this->getRev()->getRevType();	
		//根据来源信息的类型使用不同的方法路径进行处理
		switch($type) {
			case Wechat::MSGTYPE_TEXT: // 文字信息
				$this->onText();
				break;
			case Wechat::MSGTYPE_VOICE: // 语音信息
				$this->onVoice();			
				break;
			case Wechat::MSGTYPE_EVENT: // 事件信息
			// 获取事件信息	
		  	$event=$this->getRevEvent() ;
			//根据用户操作的类型使用不同的方法路径进行处理		
		    switch ($event[event]) {
		        case 'subscribe':  // 关注
		          $this->onSubscribe();
		          break;
		        case 'unsubscribe':  // 取消关注
		          $this->onUnsubscribe();
		          break;
		        case 'CLICK':  // 点击事件
		          $this->onClick($event[key]);
		          break;
		    }
	      	break;
			 
			case Wechat::MSGTYPE_IMAGE: // 图片信息
				$this->onImage();			
				break;
			case Wechat::MSGTYPE_LOCATION:  // 位置信息
				$this->onLocation();			
				break;
			default:
				$this->text("帮助信息")->reply();
		}
	
	}

    /**
     * 收到文本消息时触发，回复收到的文本消息内容
     * @return void
     */
    protected function onText() {
		$tousername = $this->getRevTo() ;
		$fromusername = $this->getRevFrom() ;
		$keyword = $this->getRevContent() ;	
		
		// 测试
		$reply = "抱歉，暂时未找到相关匹配信息,我是".$tousername;	
//		$this->responseMsg( $reply );
		$this->text($reply)->reply();
		
		//默认的处理过程
		//$keyword = $this->getRevContent() ;			
		//默认的处理过程
//		$tpl01 = '收到' ; //提示信息
//		$tpl02 = '发来的文字消息：' ; //提示信息		
//		$reply = $tousername. $tpl01 .$fromusername.$tpl02.$keyword ;  //处理后的回复内容
//		//默认的处理内容结束
//		$this->text($reply)->reply();	

	}

	
    /**
     * 收到语音消息时触发，回复语音识别结果(需要开通语音识别功能)
     *
     * @return void
     */
    protected function onVoice() {
	
		//取参数
		$tousername = $this->getRevTo() ;
		$fromusername = $this->getRevFrom() ;
		$Recognition = $this->getRevVoice();

		//根据 ToUserName 的不同调用不同的回复函数，默认回复文字信息
		switch($tousername){
		case SUB_ID0:   // 正式公众号（ToUserName）的分支处理
		case SUB_ID1:   // 测试号1（ToUserName）的分支处理
		case SUB_ID2:   // 测试号2（ToUserName）的分支处理
			$reply = array(
				"title" =>  get_utf8_string("你好"),
				"description" =>  get_utf8_string("亲爱的主人"),           
				"murl" =>  get_utf8_string("http://weixen-file.stor.sinaapp.com/b/xiaojo.mp3"), 
				"hqurl" =>  get_utf8_string("http://weixen-file.stor.sinaapp.com/b/xiaojo.mp3"),
			);
			$this->music($reply ['title'], $reply ['description'], $reply ['murl'], $reply ['hqurl']) ;
			break;
		default: //如果是其他公众号则调用 默认回复
			$this->text('收到了语音消息,识别结果为：' );
			break;
		}

    }
	
	
    /**
     * 收到图片消息时触发，回复由收到的图片组成的图文消息
     *
     * @return void
     */
	protected function onImage() {
 
		//取参数
		$tousername = $this->getRevTo() ;
		$fromusername = $this->getRevFrom() ;		
		$PicUrl = $this->getRevPic() ;
 
		//根据 ToUserName 的不同调用不同的回复函数，默认回复文字信息
		switch($tousername){
		case SUB_ID0:   // 正式公众号（ToUserName）的分支处理
			$reply = urldecode(xiaojo("&".$PicUrl,$fromusername,$tousername));
			//统一的回复信息 方法 
			$this->responseMsg( $reply ); 
			exit;
		case SUB_ID1:   // 测试号1（ToUserName）的分支处理
		case SUB_ID2:   // 测试号2（ToUserName）的分支处理
		default: //如果是其他公众号则调用 默认回复
			$keyword = "图片信息 处理未实现";
			//默认的处理过程
			$tpl01 = '收到' ; //提示信息
			$tpl02 = '发来的图片信息：' ; //提示信息		
			$reply = $tousername. $tpl01 .$fromusername.$tpl02.$keyword ;  //处理后的回复内容
			//默认的处理内容结束
			$this->text($reply)->reply();
			exit;
		}

    }	

    /**
     * 收到地理位置消息时触发，回复收到的地理位置
     *
     * @return void
     */
    protected function onLocation() {
	
		//取参数
		$tousername = $this->getRevTo() ;
		$fromusername = $this->getRevFrom() ;
		$location = $this->getRevGeo();
		$keyword = 'x@' . $location[x] . '@' . $location[y];
		
		//根据 ToUserName 的不同调用不同的回复函数，默认回复文字信息
		$reply = '' ;       //默认的回复内容
		switch($tousername){
		case SUB_ID0:   // 公众号（ToUserName）的分支处理
			$keyword = urlencode(str_replace('\.','\\\.',$keyword));
			$reply = urldecode(xiaojo($keyword,$fromusername,$tousername));
			break; 
		case SUB_ID1:   // 测试号1（ToUserName）的分支处理
			$SUB01 = new SUB01();
			$reply = $SUB01->reply_SUB01($keyword,$fromusername,$tousername);   //调用 reply_SUB01 的方法来处理分支1
			break;
		case SUB_ID2:   // 测试号2（ToUserName）的分支处理
			$SUB02 = new SUB02();
			$reply = $SUB02->reply_SUB02($keyword,$fromusername,$tousername);   //调用 reply_SUB012的方法来处理分支1
			break;
		default: //如果是其他公众号则调用 默认回复
			//默认的处理过程
			$tpl01 = '收到' ; //提示信息
			$tpl02 = '发来的位置消息：' ; //提示信息
			$keyword = "图片信息 处理未实现";
			$reply = $tousername. $tpl01 .$fromusername.$tpl02.$keyword ;  
			//处理后的回复内容
			//默认的处理内容结束
			$this->text($reply)->reply();
			exit;
		}
		
		//统一的回复信息 方法 
		$this->responseMsg( $reply );
	  
    }
 
 
 
	/**
     * 用户关注时触发，回复「欢迎关注」
     *
     * @return void
     */
    protected function onSubscribe() {
      $this->text('你好！欢迎关注【朕的大裤衩】，裤衩君在这里恭候多时咯~')->reply();
    }

    /**
     * 用户取消关注时触发
     *
     * @return void
     */
    protected function onUnsubscribe() {
	  $this->text('欢迎你再回来！')->reply();
      // 「悄悄的我走了，正如我悄悄的来；我挥一挥衣袖，不带走一片云彩。」
    }

     /**
     * 收到自定义菜单消息时触发，回复菜单的EventKey
     *
     * @return void
     */
    protected function onClick($key) {
	  $key = $key ;
      $this->text('你点击了菜单：' . $key)->reply();
    }
	
	
 
 
    /**
     * 用户回复信息时触发，根据回复的信息类型，选用合适的回复
     *如果是不是数组，则直接调用文字格式回复
     *如果是数组，则判断数组中是否包含 murl,如果有，用音乐格式回复
    * 如果是数组，则判断数组中是 不包含 murl,如果有，用图文格式回复，单图
     *
     * @param  string  $msg    需要回复的消息内容
     * @return void
     */
    protected function responseMsg($msg) {
	
		if (!is_array($msg))
		{
		 $this->text($msg)->reply();    // 如果不是数组，回复文字格式
		}      
		elseif(array_key_exists("murl",$msg))     //如果数组中包含murl，则回复音乐格式
		{
		 $this->music($msg ['title'], $msg ['description'], $msg ['murl'], $msg ['hqurl'] )->reply(); 
		}else{
			if (isset($msg['title'])){           //单条数组的情况
				$items[Title] = $msg[title];
				$items[Description] = $msg[description];
				$items[PicUrl] = $msg[pic];
				$items[Url] = $msg[url];	
				//回复单图文
				$this->news(array($items ))->reply();	
			}else{  //多条的时候
			
				$items = array();
				foreach ($msg as $value){
					$item_tmp[Title] = $value[title];
					$item_tmp[Description] = $value[description];
					$item_tmp[PicUrl] = $value[pic];
					$item_tmp[Url] = $value[url];
					$items = array_merge($items,array($item_tmp));
				}
				
				$this->news($items )->reply();
			}
		}	
    }




	
}  //类 WeChat 的结束点

?>