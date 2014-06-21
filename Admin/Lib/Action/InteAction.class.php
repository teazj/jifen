<?php
class InteAction extends GlobalAction{
	//积分记录
	Public function _initialize() {
		C('DB_NAME','inte');
		C('DB_PREFIX','');
		C('TMPL_ENGINE_TYPE', 'Think');
	}
	public function index(){
		$box = fPage('InteLog', 5);
		$this->assign('list',$box['list']);
		$this->assign('page',$box['page']);
		//print_r($box);
		//exit;
		$this->display();
	}
	
	
	
	//订单列表  签证
	public function qz_orders(){
		 $rows = fPage('qzOrders', 10);
		 $this->assign('list',$rows['list']);
		 $this->assign('page',$rows['page']);
		 $this->display();
	}

	//调用Excel;
	public function incExcel($iptName,$sign){
		include APP_NAME . '/Common/reader.php';
		$tmp = $_FILES[$iptName]['tmp_name']; 
		if (empty ($tmp)) { 
			$this->error(请选择要导入的Excel文件！);
		}
		$save_path = APP_NAME . "/Common/xls/"; 
		$file_name = $save_path.date('Ymdhis') . ".xls"; //上传后的文件保存路径和名称 
		if (copy($tmp, $file_name)) { 
		    $xls = new Spreadsheet_Excel_Reader(); 
		    $xls->setOutputEncoding('utf-8');  //设置编码 
		    $xls->read($file_name);  //解析文件 
		    for ($i=1; $i<=$xls->sheets[0]['numRows']; $i++) { 
		      if($sign=='insert'){
		      	$company = $xls->sheets[0]['cells'][$i][1]; 
		        $qz_number = $xls->sheets[0]['cells'][$i][2]; 
		        $qz_fileName = $xls->sheets[0]['cells'][$i][3];
		        $qz_status = $xls->sheets[0]['cells'][$i][4];  
		        $send_time = $xls->sheets[0]['cells'][$i][5];
		        $go_time = $xls->sheets[0]['cells'][$i][6];
		    	$sql = "insert into qz_orders(company,qz_number,qz_fileName,qz_status,send_time,go_time) 
		    	values 
		    	('$company','$qz_number','$qz_fileName','$qz_status','$send_time','$go_time')";
      		    $qz_orders = M('qzOrders');
			    $query = mysql_query($sql);
			   // echo "insert into student (name,sex,age) values $data_values";
/*			    if($query){ 
			        $this->success('订单导入成功.!');
			        exit;
			    }else{ 
			       $this->error('订单导入失败.!');
			       exit;
			    }*/
		    }else{
		    	$qz_number = $xls->sheets[0]['cells'][$i][1]; 
		    	$inte = $xls->sheets[0]['cells'][$i][2];
		        $u_num = $xls->sheets[0]['cells'][$i][3]; 
		    	$sql = "update qz_orders set inte=$inte,u_num=$u_num where qz_number='$qz_number'";
      		    $qz_orders = M('qzOrders');
			    $query = mysql_query($sql);
			   // echo "insert into student (name,sex,age) values $data_values";

		    }
				    
		    }
		    
		     	if($query){ 
			        $this->success('导入成功.!');
			       // if(!unlink($file_name)) exit('删除文件失败');
			     //   exit;
			    }else{ 
			       $this->error('导入失败.!');
			     //  if(!unlink($file_name)) exit('删除文件失败');
			     //  exit;
			    }
		    
/*		    if($sign=='insert'){
		    	$sql = "insert into qz_orders(company,qz_number,qz_fileName,qz_status,send_time,go_time) values $data_values";
		    }else{
		    	echo $data_values;exit;
		    }*/
/*		    $qz_orders = M('qzOrders');
		    $query = mysql_query($sql);//批量插入数据表中 
		    if($query){ 
		        $this->success('导入成功.!');
		    }else{ 
		       $this->error('导入失败.!');
		    } */
		} 
	}
	
	//签证订单数据导入
	public function baseImportcls(){
		//$sign = I('get.act','','htmlspecialchars');
		$sign=htmlspecialchars($_GET['act']);
		$this->incExcel('upXls', $sign);
	}
	
	//签订积分数据导入
	public function followImportcls(){
		$this->incExcel('upfile', '');
	}
	public function del(){
		//获取传来的id
		$id=$_GET['id'];
		//实例化一个表对象
		$navTabId=$_GET['navTabId'];
		if($navTabId=="listinte"){
			$m=M('InteLog');
		}else{
			$m=M('qzOrders');
		}
		
		//执行删除命令
		$res1=$m->where("id='$id'")->delete();
		//实例化另一个表
		
		if($res1!==false){
			$this->success('删除用户成功!');
		}else{
			$this->error('删除用户失败!');
		}
	}
}
?>