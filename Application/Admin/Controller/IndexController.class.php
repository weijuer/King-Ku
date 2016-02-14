<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
	// 后台首页展示
    public function index(){
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout');
		$this->display();
	}    
		
	// 用户管理
	public function muserAdmin(){
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();
	} 
	
		
	// 添加单条数据
	public function muserAdd() {
		// 不带任何参数 自动定位当前操作的模板文件
		// 使用layout控制模板布局
		layout('Layout/layout_inside');
		$this->display();		
	}
	
	// 添加数据验证
	public function addCheck() {
        // 判断提交方式 做不同处理
        if (IS_POST) {
			// 采用动态完成的方式来解决不同的处理规则
			$rules = array ( 
				array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
				array('regdate', 'time', 1, 'function'), // 对regdate字段在新增的时候写入当前时间戳
				array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
			);
			
			// 实例化Muser对象
			$Muser   =   M('Musers'); 
            // 自动验证 创建数据集
            if (!$data = $Muser->auto($rules)->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                // exit($user->getError());
				// 错误信息转换成json格式返回
				$msg  = array(
                    'info' => $Muser->getError()
				); 
				$this->ajaxReturn($msg);
            }
            //插入数据库
            if ($id = $Muser->add($data)) {
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);
            } else {
				$msg = array(
					'info' => '添加数据失败！'
				);
				$this->ajaxReturn($msg);
            }
        } else {
			E('页面不存在');
        }
    }		
	
	
	//读取管理员数据
	public function muserRead(){
		// 实例化Muser对象
		$Muser   =   M('Musers'); 
		
		// 定义查询条件
		$condition['order'] = I('post.order','');
		// $condition['_logic'] = 'OR'; //默认逻辑关系是 逻辑与 AND
		// 读取数据		
		$data = $Muser->where($condition)->select();
		$this->ajaxReturn($data,'json');
	}

	 
	//更改管理员数据
	public function muserEdit($userid=0){
        // 实例化User对象
        $Muser = M('Musers');
		// 获取前台ID
		$userid = I('get.userid');
		$this->assign('vo',$Muser->find($userid));
		// 使用layout控制模板布局
		layout('Layout/layout_inside');		
		$this->display('muserEdit');
	}
	 
	 // 更新并保存
	 public function editUpdate(){
        // 采用动态完成的方式来解决不同的处理规则
		$rules = array ( 
			array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
			// array('regdate','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
		);
		
		// 实例化Muser对象
        $Muser = M('Musers');
		
		if($Muser->auto($rules)->create()) {
			$result =   $Muser->save();
			if($result) {
				// $this->success('操作成功！');
				$msg = array(
					'info' => 'ok',
					'callback' => 'javascript:parent.history.back();' // 修改成功后返回上一页
				);
				$this->ajaxReturn($msg);				
			}else{
				// $this->error('写入错误！');
				$msg = array(
					'info' => '编辑失败，请重新编辑！'
				);
				$this->ajaxReturn($msg);
			}
		}else{
			// $this->error($Muser->getError());
			$msg = array(
				'info' => $this->error($Muser->getError())
			);
			$this->ajaxReturn($msg);
		}
	}
	
	//删除管理员数据
	public function muserDelete($userid=0){
        // 实例化User对象
        $Muser = M('Musers');
		// 获取前台userID的用户数据
		$userid = I('post.userid');
		// $Muser->where($userid)->delete();
		if ($pass = $Muser->delete($userid)) {
			$msg = array(
				'info' => 'ok',
				'callback' => 'javascript:parent.history.back();' // 删除成功后返回上一页
			);
			$this->ajaxReturn($msg);
		} else {
			$msg = array(
				'info' => '删除数据失败！'
			);
			$this->ajaxReturn($msg);
		}
	}	

	
}