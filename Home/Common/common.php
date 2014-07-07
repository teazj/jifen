<?php
/**
 * 分页函数;
 */
function fPage($table,$num,$where='',$order='') {
	$box = array();
	$Model = M ( $table );
	import ( 'ORG.Util.Page' ); // 导入分页类
	if(!empty($where)){
		$count = $Model ->where($where)->count ();
	}else{
		$count = $Model ->count ();
	} 
	$Page = new Page ( $count, $num ); //
	$show = $Page->show (); // 分页显示输出
	if(!empty($where)){
		$list = $Model ->where($where)->order($order)->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
	}else{
		$list = $Model ->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
	} 
	$box['list']=$list;
	$box['page']=$show;
	return $box;
}

/**
 * 管理员操作记录;
 * @param int $arr; 记录操作
 * @param Object $model 
 * @return void;											
 */
function logInsert($arr, $model) {
	$res = $model->data( $arr )->add ();
	if (! res) {
		exit ( '写入日志失败' );
	}
}

//存储替换的图片;
function saveImg($id,$name,$img){
	$imgmanage = M('Imgmanage');
	$data = array(
		'cid'=>$id,
		'cname'=>$name,
		'imgName'=>$img,	
	);
	$res = $imgmanage->data($data)->add();
	if(!$res) exit('存储旧图片失败');
}

//使馆首字母;
function alphabets(){
	return array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I','J'=>'J','K'=>'K','L'=>'L','M'=>'M','N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T','U'=>'U','V'=>'V','W'=>'W','X'=>'X','Y'=>'Y','Z'=>'Z');
}

//无限分类;
function tree(&$list,$pid=0,$level=0,$html='|--'){
    static $tree = array();
    foreach($list as $v){
        if($v['fid'] == $pid){
            $v['sort'] = $level;
            $v['html'] = str_repeat($html,$level);
            $tree[] = $v;
            tree($list,$v['id'],$level+1);
        } 
    }
    return $tree;
}


function output($mixed){
	echo "<pre>";
	print_r($mixed);
	echo "</pre>";
}

	//定义一个mail发送函数
function SendMail($address,$title,$message)
{
  Vendor('Zend.PHPMailer.classphpmailer');
 
    $mail=new PHPMailer();
    // 设置PHPMailer使用SMTP服务器发送Email
    $mail->IsSMTP();
 
    // 设置邮件的字符编码，若不指定，则为'UTF-8'
    $mail->CharSet='UTF-8';
 
    // 添加收件人地址，可以多次使用来添加多个收件人
    $mail->AddAddress($address);
 
    // 设置邮件正文
    $mail->Body=$message;
 
    // 设置邮件头的From字段。
    $mail->From=C('MAIL_ADDRESS');
 
    // 设置发件人名字
    $mail->FromName='积分商城';
 
    // 设置邮件标题
    $mail->Subject=$title;
 
    // 设置SMTP服务器。
    $mail->Host=C('MAIL_SMTP');
 
    // 设置为"需要验证"
    $mail->SMTPAuth=true;
 
    // 设置用户名和密码。
    $mail->Username=C('MAIL_LOGINNAME');
    $mail->Password=C('MAIL_PASSWORD');
 	$mail->AltBody = "text/html";
    // 发送邮件。
    if(!$mail->Send()){
    	echo "发送失败";
    }
}


//发送邮件
function mysendMail($subject, $message, $recipients, $cc = '', $bcc = '', $replyTo = '', $mail_from = '', $mail_fromname = '', $html = false, $attachment = '') {
    //import("@.Util.Mail.PHPMailerAutoload");
	include "/data/Mail/PHPMailerAutoload.class.php";
    try {
        $mail = new PHPMailer();

        //check smtp
        //$Config = C('Config');
		$Config=array(
			'mail_mode'=>1,
			'smtp_host'=>'smtp.qq.com',
			'smtp_username'=>'suge51@qq.com',
			'smtp_password'=>'jz999888',
			'mail_fromname'=>'速格网站',
			'smtp_secure'=>''
		);
        if ($Config['mail_mode'] == 1) {
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = $Config['smtp_host']; // Specify main and backup server
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = $Config['smtp_username']; // SMTP username
            $mail->Password = $Config['smtp_password']; // SMTP password
            $mail->SMTPSecure = $Config['smtp_secure'] ? $Config['smtp_secure'] : ''; // Enable encryption, 'tls' 'ssl' also accepted
        }

        $mail->CharSet = 'utf-8';
        $mail->From = $Config['smtp_username']; //默认为系统发件人邮箱
        $mail->FromName = $mail_fromname ? $mail_fromname : $Config['mail_fromname']; //默认为系统发件人姓名

        if (is_array($recipients)) {
            foreach ($recipients as $email => $name) {
                $mail->addAddress($email, $name); // Add a recipient
            }
        } else {
            $mail->addAddress($recipients);
        }
        if ($replyTo) {
            $mail->addReplyTo($replyTo);
        }
        if ($cc) {
            if (is_array($cc)) {
                foreach ($cc as $email => $name) {
                    $mail->addCC($email, $name); // Add CC
                }
            } else {
                $mail->addCC($cc);
            }
        }
        if ($bcc) {
            if (is_array($bcc)) {
                foreach ($bcc as $email => $name) {
                    $mail->addBCC($email, $name); // Add BCC
                }
            } else {
                $mail->addBCC($bcc);
            }
        }

        //$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        //添加附件
        if ($attachment) {
            $attachmentArray = explode(",", $attachment);
            foreach ($attachmentArray as $file) {
                if (is_file($file)) {
                    $mail->addAttachment($file); // Add attachments
                }
            }
        }

        // Set email format to HTML
        if ($html) {
            $mail->isHTML(true);
        }

        $mail->Subject = $subject;
        $mail->Body = $message;

        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();
    } catch (phpmailerException $e) {
        return $e->errorMessage();
    }
}

?>