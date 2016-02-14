<?php
namespace Mobile\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		if(!isMobile()){
			C('DEFAULT_MODULE','Home');
		}
	}
}