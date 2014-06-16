<?php

/*------------------------------新闻Action类(后台管理)----------------------------*/
class NewsAction extends CommonAction{
	
	/*-----------封装搜素条件------------*/
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['title']  = array('like', "%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}

	/*----------显示新闻详情-------------*/
	//创建新闻的3个表的多表联合查询对象
	public function index(){
		$m = M();
		
		//封装排序条件
		$order=" order by id asc ";
		if(!empty($_REQUEST['_order'])){
			$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
			//我的排序封装
			$order = " order by ".$order;
		}else{
			$order = "";
		}
		
		//封装搜索条件
		if(isset($_REQUEST['keyword'])){
			$keyword = " and concat(n.title,n.author,t.tname) like '%".$_REQUEST['keyword']."%' ";//合并字段(中间可以衔接字符串!)
		}else{
			$keyword = "";
		}
		
		//分页处理：
		$_GET['p']=$_REQUEST['pageNum']+0;//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');// 导入分页类
		$counti = $m->query("select count(n.id) count from ff_news n,ff_news_content c,ff_news_type t where n.id=c.id and n.tid=t.id ".$keyword);// 查询满足要求的总记录数
		$count=$counti[0]['count'];
		$Page  = new Page($count,$numPerPage);// 实例化分页类 传入总记录数和每页显示的记录数
		
		//封装分页条件
		$limit = $Page->firstRow.','.$Page->listRows;
		
		//执行信息提取并放置到模板中
		//添加order搜索条件和limit条件,实现分页
		$list = $m->query("select n.id,tname,title,author,ctime,content,newspic from ff_news n,ff_news_content c,ff_news_type t where n.id=c.id and n.tid=t.id ".$keyword.$order." limit ".$limit);
		$this->assign("show",$list);
		
		//封装分页信息
		$this->assign("totalCount",$count); //封装总数据条数
		$this->assign("numPerPage",$numPerPage);     //封装页大小
		//$this->assign("pageNumShown",10);     //页标数字多少个(模板已经写死)
		$this->assign("currentPage",$_REQUEST['pageNum']);     //当前页
		$this->display("index");
		// parent::index();//(实际只是省略了$this->display("index");这一句而已)
	}
	
	/*----------添加新闻页面-------------*/
	public function add(){
		//创建数据库news_type表对象
		$m = M("news_type");
		
		//查询类别内容并加载数据
		$typelist = $m->field("id,tname")->select();
		$this->assign("typelist",$typelist);
		
		//显示News文件夹下的add.html文件
		$this->display("add");
	}
	
	/*------------执行添加---------------*/
	public function insert(){
		$filename = $this->upload();	//调用上传图片类对象
		if(!empty($filename)){	//如果返回的文件名结果不为空,表示保存图片成功,那么执行下面的数据库添加
			//执行news_content表添加
			$m3 = M("news_content");
			$m3->create();
			$rel3 = $m3->add();
			//执行news表添加
			$m1 = M("news");
			$data1['tid'] = $_POST['type'];
			$data1['zid'] = $rel3;
			$data1['title'] = $_POST['title'];
			$data1['author'] = $_POST['author'];
			$data1['ctime'] = time();
			$data1['newspic'] = $filename;
			// dump($_FILES);
			$rel1 = $m1->add($data1);
			

			if($rel1 && $rel3){	
				$this->success("添加成功!");
			}else{
				$this->error("添加失败!");
			}
		}else{
				$this->error("图片上传失败!");
			}
		
	}
	
	/*------------执行删除---------------*/
	public function delete(){

		//获得删除条件id号
		$id = $_REQUEST['id'];
		
		//创建news表对象
		$m1 = M("news");
		
		//查找到数据库保存的图片文件名
		$picname = $m1->where("id={$id}")->find();
		$picname = $picname['newspic'];
		// dump($picname);
		//从文件夹中删除图片
		@unlink("./Public/Admin/Images/News/NewsPic/{$picname}");
		
		//删除news表相关数据
		$res1 = $m1->where("id={$id}")->delete();
		
		// 删除news_content表相关数据
		$m2 = M("news_content");
		$res2 = $m2->where("id={$id}")->delete();
		
		// 判断:两个表数据是否都删除成功
		if($res1 && $res2){
			$this->success("删除成功!");
		}else{
			$this->error("删除失败!");
		}
	}
	
	/*-----------修改新闻页面------------*/
	public function edit(){
		// dump($_REQUEST);
		//获取要修改新闻id
		$id = $_REQUEST['gid'];
		
		//创建news对象
		$m1 = M("news");
		$newslist = $m1->where("id={$id}")->find();
		
		//创建news_type对象
		$tid = $newslist['tid'];//获取新闻类别id(tid)
		$m2 = M("news_type");
		$news_type_all = $m2->field('id,tname')->select();	//获取类别表所有信息
		$news_type = $m2->where("id={$tid}")->find();	//获取类别表被选中信息
		
		//创建news_content对象
		$m3 = M("news_content");
		$news_content = $m3->where("id={$id}")->find();
		// dump($news_type);
		// dump($news_type_all);
		//加载
		$this->assign("newslist",$newslist);
		$this->assign("news_type_all",$news_type_all);
		$this->assign("news_type",$news_type);
		$this->assign("news_content",$news_content);
		
		//输出
		$this->display("edit");
	}
	
	/*------------执行修改---------------*/
	public function update(){
		//获取要执行修改的新闻id号
		$id = $_POST['id'];
		
		//调用upload()方法,获取上传到服务器中文件夹中的pic名字
		$filename = $this->upload();
		
		//创建2个表对象
		$m1 = M("news");
		$m2 = M("news_content");
		
		//封装2个表数据
		$data1['tid'] = $_POST['type'];
		$data1['title'] = $_POST['title'];
		$data1['author'] = $_POST['author'];
		$data1['newspic'] = $filename;
		$data2['content'] = $_POST['content'];
		
		// dump($data1);
		// dump($data2);
		// dump($_POST);
		
		//执行修改,保存
		$rel1 = $m1->where("id={$id}")->save($data1);
		$rel2 = $m2->where("id={$id}")->save($data2);
		
		
		//判断提示更新成功
		if($rel1 && $rel2){
			$this->success("修改成功!");
		}else{
			$this->error("修改失败!");
		}
	}
	
	/*------------上传图片---------------*/
	Public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Admin/Images/News/NewsPic/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info[0]['savename'];
		}
		// dump($info);
		 
		// 保存表单数据 包括附件数据
		// $User = M("User"); // 实例化User对象
		// $User->create(); // 创建数据对象
		// $User->photo = $info[0]['savename']; // 保存上传的照片根据需要自行组装
		// $User->add(); // 写入用户数据到数据库
		// $this->success('数据保存成功！');
	}

}