<?php
//后台信息设置;
class WebinfoAction extends CommonAction {
	Public function _initialize() {
		C('DB_NAME','inte');
		C('DB_PREFIX','');
		C('TMPL_ENGINE_TYPE', 'Think');
	}
	public function init_sys() {
		$InitSys = M ( 'InitSystem' );
		$data = $InitSys->find ();
		$this->assign ( 'sys', $data );
		$this->display ();
	}
	//系统设置更新;
	public function init_update() {
		$InitSys = M ( 'InitSystem' );
		$title = I ( 'post.title', '', 'htmlspecialchars' );
		$desc = I ( 'post.desc', '', 'htmlspecialchars' );
		$keyword = I ( 'post.keyword', '', 'htmlspecialchars' );
		$sign = I ( 'post.sign' );
		$close = I ( 'post.close' );
		$rule = I ( 'post.rule' );
		$lev_rule = I ( 'post.u_lev' );
		
		if (! empty ( $_POST ['sub'] ) && $_POST ['sub'] == '修改') {
			$u_rule = $InitSys->check ( $rule, '/^[1-9]\d*$/' );
			$u_lev = $InitSys->check($lev_rule , '/[1-9][0-9],[1-9][0-9],[1-9][0-9]/');
			if(!$u_lev){
				$this->error('用户等级规则错误');
			}
			if (!$rule) {
				$this->error ( '积分规则错误' );
				exit;
			}
			
			
			$data = array ('title' => $title, 'desc' => $desc, 'keyword' => $keyword, 'sign' => $sign, 'close' => $close, 'rule' => $rule, 'lev_rule' => $lev_rule );
			$num = $InitSys->where ( 'id=1' )->save ( $data );
			if ($num)
				$this->success ( '修改成功' );
			else
				$this->error ( '修改失败' );
		}
	
	}
	
	//日志显示
	public function logMsg(){
		$res = fPage ( 'rootAct', 10 );
		$this->assign ( 'list', $res['list'] ); // 赋值数据集
		$this->assign ( 'page', $res['page'] ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	//清空数据库日志信息;
	public function trunLog() {
		$Log = M('rootAct');
		$Log->query('truncate root_act');
		$num = $Log->count();
		if($num=='0'){
			$this->success('清空成功');
		}else{
			$this->error('清空失败');
		}
	}
	
	
	//商城公告
	public function bulletin(){
		//$getEditor = I('post.uEditor');
		$getEditor=$_POST['uEditor'];
		$System = M('initSystem');
		$row = $System->find();
		$data['bulletin'] = $getEditor;
		if($_POST['sub']){
			$res = $System->where("id={$row['id']}")->save($data);
			if($res){
				$this->success('修改成功');
				exit;
			}else{
				$this->error('修改失败');
				exit;
			}
		}
		$this->assign('bull',$row['bulletin']);
		$this->display();
	}
}
?>