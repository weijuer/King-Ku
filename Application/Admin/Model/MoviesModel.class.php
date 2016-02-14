<?php
namespace Home\Model;
use Think\Model;

class MoviesModel extends Model {
    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        array('videoname', '', '该资源名已存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一

    );
	
    /**
     * 自动完成
     */
    protected $_auto = array (
        // array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
		array('regdate','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
		array('lastdate','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
		array('kind','funImplode',1,'callback'), // 多选框提交表单处理
    );
	
	//将多选值数组转成字符串
	public function funImplode($data) {
		return implode(',', $data);
	}
}	