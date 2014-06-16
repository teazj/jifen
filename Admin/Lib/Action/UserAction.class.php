<?php
//后台用户信息管理Action类

class UserAction extends CommonAction{

	//浏览用户信息
	public function index(){
		//实例化一个表对象
		$m=M('users_info');
		//拼装获取搜索条件
		$where['username']=array('like',"%{$_POST['keyword']}%");//根据用户名搜索
		//or
		$where['_logic']='or';
		//根据地址查询
		$where['address']=array('like',"%{$_POST['keyword']}%");//根据地址搜索
		//导入分页类
		import('ORG.Util.Page');
		//转换参数实现当前页号的传递
		$_GET['p']=$_REQUEST['pageNum']+0;
		//获取总的数据条数
		$totalCount=$m->where($where)->count();
		//获取每页显示的记录数
		$numPerPage=isset($_REQUEST['numPerPage'])?$_REQUEST['numPerPage']:10;
		//实例化分页类,传入总数据条数和每页要显示的条数
		$page=new Page($totalCount,$numPerPage);
		//获取所有数据
		$list=$m->where($where)->limit($page->firstRow.','.$page->listRows)->order('id')->select();
		//实例化另一个分页类,用于查询用户积分和余额
		$m=M('users');
		//执行查询并返回查询结果
		$result=$m->limit($page->firstRow.','.$page->listRows)->select();
		//向模板中发送数据
		$this->assign('list',$list);
		$this->assign('result',$result);
		//总数据条数
		$this->assign('totalCount',$totalCount);
		//页大小
		$this->assign('numPerPage',$numPerPage);
		//当前页
		$this->assign("currentPage",$_REQUEST['pageNum']);
		//输出到模板
		$this->display();
	}

	//修改用户信息页面
	public function edit(){
		//获取传过来的id值
		$id=$_GET['id'];
		//实例化一个表对象
		$m=M('users_info');
		//获取这条数据信息
		$list=$m->where("id='$id'")->find();
		//向模板中发送信息
		$this->assign('list',$list);
		//输出到模板
		$this->display();
	}

	//执行用户信息修改
	public function do_edit(){
		//获取传来的id
		//$id=$_POST['id'];
		//实例化一个表对象
		$m=M('users_info');
		//封装修改的信息
		/*$where['nickname']=$_POST['nickname'];
		$where['sex']=$_POST['sex'];
		$where['age']=$_POST['age'];
		$where['qq']=$_POST['qq'];
		$where['email']=$_POST['email'];
		$where['phone']=$_POST['phone'];
		$where['address']=$_POST['address'];*/
		//执行更新
		//$res=$m->where("id='$id'")->create()->save();
		$m->create();
		$res=$m->save();
		//根据返回结果判断是否修改成功
		if($res && $res>0){
			$this->success('更新用户资料成功!');
		}else{
			$this->error('更新用户资料失败!');
		}
	}

	//执行删除用户信息
	public function del(){
		//获取传来的id
		$id=$_GET['id'];
		//实例化一个表对象
		$m=M('users_info');
		//执行删除命令
		$res1=$m->where("id='$id'")->delete();
		//实例化另一个表
		$m=M('users');
		//执行删除命令
		$res2=$m->where("uid='$id'")->delete();
		//根据返回的影响行数来判断是否删除成功
		if($res1 && $res2 && $res1>0 && $res2>0){
			$this->success('删除用户成功!');
		}else{
			$this->error('删除用户失败!');
		}
	}

	//添加新用户页面
	public function add(){
		//输出页面模板
		$this->display();
	}

	//执行新用户的添加
	public function do_add(){
		// 实例化User对象
		$m = D("Users_info");
		if (!$m->create()){
		    // 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($m->getError());
			//$this->error('创建失败!');
		}else{
		    //如果创建成功,则执行以下
		    $res1=$m->add();
		    //实例化一个对象
		    $m=D('Users');
		    //封装添加条件
		    $date['uid']=$res1;
		    $date['username']=$_POST['username'];
		    $date['password']=md5($_POST['password']);
		    //向表中添加数据
		    $res2=$m->add($date);
		    //根据返回值判断是否添加成功
		    if($res1 && $res2){
		    	$this->success('添加成功!');
		    }else{
		    	$this->error('添加失败!');
		    }
		}
	}
}