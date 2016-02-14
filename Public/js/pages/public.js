//判空
function isNull(parame){
	if(parame == "" || parame == null){
		return true;
	}
	return false;
}

//检查输入字符串是否符合正整数格式
function isNumber( s ){   
	var reg = /^[0-9]+$/; 
	if(!reg.test( s )){
		return true;
	}
	return false;
}

//错误提示
function errorMsg(msg){
	$(".err-tips").fadeIn("slow").text(msg).fadeOut(3000);
}	

// UNIX时间戳格式化函数 
function getTime() {  
	var ts = arguments[0] || 0;  
	var t,y,m,d,h,i,s;  
	t = ts ? new Date(ts*1000) : new Date();  
	y = t.getFullYear();  
	m = t.getMonth()+1;  
	d = t.getDate();  
	h = t.getHours();  
	i = t.getMinutes();  
	s = t.getSeconds();  
	// 可根据需要在这里定义时间格式  2015-12-2 10:03:56
	// return y+'-'+(m<10?'0'+m:m)+'-'+(d<10?'0'+d:d)+' '+(h<10?'0'+h:h)+':'+(i<10?'0'+i:i)+':'+(s<10?'0'+s:s); 	
	// 可根据需要在这里定义时间格式 2015-12-2 10:03 
	return y+'-'+(m<10?'0'+m:m)+'-'+(d<10?'0'+d:d)+' '+(h<10?'0'+h:h)+':'+(i<10?'0'+i:i);  
}