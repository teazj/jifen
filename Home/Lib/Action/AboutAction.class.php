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
		$this->display('Qzindex:aboutUs');
	}
	
	//速格动态
	public  function sgdt(){
		$this->getPage('速格动态');
		$this->display('Qzindex:sgdt');
	}
	
	//我们的优势
	public function wmdys(){
		$this->getPage('我们的优势');
		$this->display('Qzindex:wmdys');		
	}
	
	
	public function getPage($title){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);
		$alone = M('inte.alonepage',' ');
		$contactUs =$alone->where("pageName='{$title}'")->find();
		if(!$contactUs) exit('数据未找到.!');
		$this->assign('cxzz',$contactUs);
	}
}
?>