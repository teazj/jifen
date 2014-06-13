<?php
class RzColumnAction extends Action {
	//知识宝鼎
	public function zsbd() {
		$column = M ( 'rzColumn' );
		$res = $column->where ( "fid=0" )->find ();
		$title = $column->where ( "fid={$res['id']}" )->select ();
		$id = $_GET ['id'];
		$class = M ( 'rzColClass' );
		$box = fPage('rzColClass', 5,"rcid={$id}");
		$this->assign ( 'list', $box['list'] );
		$this->assign('page',$box['page']);
		$this->assign ( 'title', $title );
		$this->display ();
	}
	
	public function zsbdBanner() {
		$column = M ( 'rzColumn' );
		$res = $column->select ();
		if (! res)
			exit ( '数据不存在' );
		$list = tree ( $res );
		$this->assign ( 'list', $list );
	}
	
	//知识宝鼎列表;
	public function zsList() {
		$column = M ( 'rzColumn' );
		
		$this->display ( 'zsbd' );
	}
	
	//新闻详情
	public function news(){
		$id = $_GET['id'];
		$class = M('rzColClass');
		$row = $class->where("id={$id}")->find();
		
		$data['click'] = $row['click']+1;
		$click = $class->where("id={$id}")->save($data);
		if(!click)exit('更新点击量失败');
		//最新消息;
		$newMsg = $class->order('sub_time')->field('id,title')->select();
		
		//阅读排行
		$clicks = $class->order('click')->field('id,title')->select();
		$this->assign('clicks',$clicks);
		$this->assign('new',$newMsg);
		$this->assign('row',$row);
		$this->display();
	}
}
?>