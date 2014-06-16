<?php

class RzorderAction extends Action{

	//浏览订单
	public function index(){
		//实例化一个表对象
		$m=M('Rzorder');
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
		//执行查询
		$list=$m->limit($page->firstRow.','.$page->listRows)->order('ctime desc')->select();;
		//将结果发送到模板
		$this->assign('list',$list);
		//总数据条数
		$this->assign('totalCount',$totalCount);
		//页大小
		$this->assign('numPerPage',$numPerPage);
		//当前页
		$this->assign("currentPage",$_REQUEST['pageNum']);
		//输出模板
		$this->display();
	}

	//执行发货
	public function send(){
		//获取传来的数据
		$id=$_GET['id'];
		//封装要修改的数据
		$date['status']='已发货';
		//实例化一个表对象
		$m=M('Rzorder');
		//获取当前订单状态
		$status=$m->where("id='$id'")->getField('status');
		//根据当前状态来判断是否可以执行发货
		if($status=='待处理'){
			//执行命令
			$res=$m->where("id='$id'")->save($date);
			//根据返回结果判断是否修改成功
			if($res && $res>0){
				$this->success('执行发货成功!');
			}else{
				$this->error('执行失败!');
			}
		}else{
			$this->error('执行失败!');
		}
		
	}

	//关闭订单
	public function close(){
		//获取传过来的数据
		$id=$_GET['id'];
		//封装要修改的数据
		$date['status']='交易关闭';
		//实例化一个表对象
		$m=M('Rzorder');
		//获取当前订单状态
		$status=$m->where("id='$id'")->getField('status');
		//根据当前状态来判断是否允许取消订单
		if($status=='待处理'){
			//执行命令
			$res=$m->where("id='$id'")->save($date);
			//根据返回结果判断是否修改成功
			if($res>0){
				$this->success('该交易已关闭');
			}else{
				$this->error('执行失败!');
			}
		}else{
			$this->error('执行失败!');
		}
	}

	//查看商品详情
	public function detail(){
		//接收传来的表单号
		$id=$_GET['id'];
		//实例化一个表对象
		$m=M('Rzorder');
		//获取订单号
		$oid=$m->where("id='$id'")->getField('oid');
		//实例化一个对象
		$m=M('RzorderDetail');
		//执行数据查询
		$list=$m->where("oid='$oid'")->select();
		//统计list数组的长度
		$count=count($list);
		//实例化一个表对象
		$m=M('goods_pic');
		for($i=0;$i<$count;$i++){
			$num=$list[$i];
			$result[]=$m->where("gid={$num['gid']}")->getField('pic');
		}
		//向模板中发送数据
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->assign('result',$result);
		//加载模板
		$this->display();
	}
}