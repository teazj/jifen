<?php
class AboutAction extends Action{
	//联系我们
	public function contactUs(){
		$this->getPage('联系我们');
		$this->display();
	}
	
	//诚信资质
	public function cxzz(){
		$this->getPage('诚信资质');
		$this->display();		
	}
	
	//关于我们;
	public  function aboutUs(){
		$this->getPage('关于我们');
		$this->display();
	}
	
	
	//我们的优势
	public function wmdys(){
		$this->getPage('我们的优势');
		$this->display();		
	}
	
	
	public function getPage($title){
		$alone = M('alonepage');
		$contactUs =$alone->where("pageName='{$title}'")->find();
		if(!$contactUs) exit('数据未找到.!');
		$this->assign('cxzz',$contactUs);
	}
}
?>