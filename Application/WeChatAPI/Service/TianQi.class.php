<?php

namespace WeChatAPI\Service;

class tianqi {
	public function weather($city_name)
	{
	//包含 城市代码表，天气查询专用的	
	include (dirname(__FILE__) . '/weather_cityId.php');
	//城市名称对应的代码
	$reply = "" ;    //赋空值，避免出错
	
	//根据城市名取城市代码
	$city_name = $city_name ;	
	$c_name=$weather_cityId[$city_name];
	$url = "http://m.weather.com.cn/data/".$c_name.".html";
	if(!empty($c_name)){		
		$json=http_get($url);
		$data = json_decode($json);			
		if(empty($data->weatherinfo)){
			$reply = "抱歉，没有查到\"".$city_name."\"的天气信息！";
		} else {
			$reply = "【".$data->weatherinfo->city."天气预报】\n".$data->weatherinfo->date_y." ".$data->weatherinfo->fchh."时发布"."\n\n实时天气\n".$data->weatherinfo->weather1." ".$data->weatherinfo->temp1." ".$data->weatherinfo->wind1."\n\n温馨提示：".$data->weatherinfo->index_d."\n\n明天\n".$data->weatherinfo->weather2." ".$data->weatherinfo->temp2." ".$data->weatherinfo->wind2."\n\n后天\n".$data->weatherinfo->weather3." ".$data->weatherinfo->temp3." ".$data->weatherinfo->wind3;
		}							
	} else {
		$reply = "抱歉，没有查到\"".$city_name."\"的天气信息！";
	}
	return $reply ;	
	
	}   //function weather  的结束点
	

}  //类 weather.class  的结束点



?>