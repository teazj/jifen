<?php
	Class CategoryAction extends CommonAction{
		
		Public function index(){
			import('ORG.Util.Category');
			$cate = M('Category')->order('piny')->select();
			$cate = Category::catesort($cate);
			$this->cate = $cate;
			$this->display('Index:index');
		}


		Public function addCate(){
			$this->pid = I('pid', 0, 'intval');
			$piny=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$this->assign('piny',$piny);
			$this->display();
		}

		Public function cateDel(){
			$db = M('Category');
			$cate = $db->select();
			import('ORG.Util.Category');
			$cate = Category::getChildsId($cate,I('id', '', 'intval'));
			if(count($cate) == 0){
				if($db->delete(I('id', '', 'intval'))){
				$this->success('删除成功', U(GROUP_NAME . '/Category/index'));
				}else{
					$this->error('删除失败');
				}
			}else{
				$this->error('当前栏目有子栏目不能删除');
			}
			
		}
		
		Public function runAddCate(){
			if (M('Category')->add($_POST)){
				$this->success('添加成功', U(GROUP_NAME . '/Category/index'));
			}else{
				$this->error('添加失败');
			}
		}

		Public function cateSort(){
			$db = M('Category');
			foreach($_POST as $id => $sort){
				$db->where(array('id' => $id))->setField('sort', $sort);
			}
			$this->redirect(GROUP_NAME . '/Category/index');
		}
	}
?>