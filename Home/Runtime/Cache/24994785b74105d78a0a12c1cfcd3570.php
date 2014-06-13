<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单信息确认</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzty.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script  type="text/javascript" src="__PUBLIC__/js/topss.js"></script>
<script  type="text/javascript" src="__PUBLIC__/js/jsAddress.js"></script>
</head>

<body>
	<div class="txor_header">
    	<div class="txor_banner"><a href="<?php echo U('Index/Qzindex/index');?>"><img src="__PUBLIC__/images/qzimages/logo.jpg" /></a></div>
        <div class="oright_nav">
        	<ul>
            	<li><a href="" class="rnav1" style="background:url(__PUBLIC__/images/qzimages/rnav1_hover.jpg) no-repeat;">1.订单信息填写</a></li>
                <li><a href="" class="rnav2" style="background:url(__PUBLIC__/images/qzimages/rnav2_hover.jpg) no-repeat;">2.订单信息确认</a></li>
                <li><a href="" class="rnav3">3.成功提交订单</a></li>
            </ul>
        </div>
    </div>
    <div class="M_qror">
    	<div class="Mqror_left">
        	<div class="Mtxot_ltit"><?php echo ($_SESSION['order']['vname']); ?></div>
            <div class="Mqror_con1">
            	<div class="Mqror_t1">订单信息详情</div>
                <dl id="xq">
                	<dt>联系人信息：<span id='info' style="cursor:pointer">[修改]</span></dt>
                    <dd>联系人姓名：<?php echo ($vo["username"]); ?></dd>
                    <dd>手机号码：<?php echo ($vo["phone"]); ?></dd>
                    <dd>电子邮箱：<?php echo ($vo["email"]); ?></dd>
                    <dd>QQ：<?php echo ($vo["qq"]); ?></dd>
                    <dd>护照返还方式：<?php if($vo['use'] == 1): ?>快递<?php elseif($vo['use'] == 2): ?>平邮<?php elseif($vo['use'] == 3): ?>EMS<?php else: ?>顺丰<?php endif; ?></dd>
                    <dd>公司地址：<?php echo ($vo["shen"]); echo ($vo["shi"]); echo ($vo["xian"]); echo ($vo["xq"]); ?></dd>
                </dl>
            </div>
            <div class="Mqror_con2" style="display:none;">
                <table cellpadding="0" cellspacing="0" border="0px none" width="100%">
                <form action="<?php echo U('Index/Rzorder/tijiao');?>" method="post">
					<input type="hidden" name="price" value="<?php echo ($vo["price"]); ?>">
					<input type="hidden" name="num" value="<?php echo ($vo["num"]); ?>">
					<input type="hidden" name="vname" value="<?php echo ($vo["vname"]); ?>">
					<input type="hidden" name="gtime" value="<?php echo ($vo["gtime"]); ?>">
					<input type="hidden" name="ctime" value="<?php echo (date('Y-m-d g:i a',time())); ?>">
					<input type="hidden" name="place" value="<?php echo ($vo["place"]); ?>">
					<input type="hidden" name="sid" value="<?php echo ($vo["sid"]); ?>">
					<input type="hidden" name="user_id" value="<?php echo ($_SESSION['index']['user_id']); ?>">
                	<tr>
                    	<td class="tableft"><span class="red">*</span>联系人姓名：</td>
                        <td colspan="2"><input type="text" name="username" value="<?php echo ($vo["username"]); ?>" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>联系人手机：</td>
                        <td colspan="2"><input type="text" name="phone" value="<?php echo ($vo["phone"]); ?>" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft">联系人邮箱：</td>
                        <td colspan="2"><input type="text" name="email" value="<?php echo ($vo["email"]); ?>" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft">联系人Q Q：</td>
                        <td colspan="2"><input type="text" name="qq" value="<?php echo ($vo["qq"]); ?>" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>护照返还方式：</td>
                        <td colspan="2">
                        	<select class="Mtxor_se1" name="use">
                            	<option value="1" <?php if($vo['use'] == 1): ?>checked<?php endif; ?>>快递</option>
                                <option value="2" <?php if($vo['use'] == 2): ?>checked<?php endif; ?>>平邮</option>
                                <option value="3" <?php if($vo['use'] == 3): ?>checked<?php endif; ?>>EMS</option>
                                <option value="4" <?php if($vo['use'] == 4): ?>checked<?php endif; ?>>顺丰</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>配送地址：</td>
                        <td colspan="2">
                        	省：<select name="shen" class="Mtxor_se2" id="cmbProvince"><?php echo ($vo["shen"]); ?></select>
								市：<select name="shi" class="Mtxor_se2" id="cmbCity"><?php echo ($vo["shi"]); ?></select>
								区：<select name="xian" class="Mtxor_se2" id="cmbArea"><?php echo ($vo["xian"]); ?></select>
                        </td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td><td><textarea name="xq" class="Mtxor_text"><?php echo ($vo["xq"]); ?></textarea></td><td class="wz_btn"><input type="button" id="bnt1" value="确 定" class="Mqror_btn" /></td>
                    </tr>
                </table>
            </div>
			<!-- 出行人信息暂时注释 -->
            <!-- <div class="Mqror_con3">
            	<dl>
                	<dt>出行人信息：<span id="infoedit" style="cursor:pointer">[修改]</span></dt>
                    <dd>姓名：大苏打 手机号码：13720385150</dd>
                </dl>
            </div> -->
            <div class="Mqror_con4" style="display:none">
				<table>
					<tr>
                    	<td colspan="2" style="text-align:left;"><input type="button" name="" value="添加出行人" class="Mtxor_inp4" /></td>
                    </tr>
				</table>
                <table id="ren" cellpadding="0" cellspacing="0" border="0px none" width="100%">
                	<tr>
                    	<td class="tableft">姓名：</td><td><input type="text" name="" value="" class="Mtxor_inp3" /></td><td class="tableft">手机号：</td><td><input type="text" name="" value="" class="Mtxor_inp3" /></td><td colspan="2" width="274"><a style="display:block" onclick="deletes(this);"><img src="__PUBLIC__/images/qzimages/qk.png" class="et"/></a></td>
                    </tr>
                </table>
				<input type="button" id="bnt2" value="确 定" class="Mqror_btn" />
            </div>
        </div>
        <div class="Mtxor_right">
        	<dl>
            	<dt>总价</dt>
                <dd><?php echo ($vo["tname"]); ?>：<span class="f_w">¥ <span class="red"><?php echo ($vo["price"]); ?></span></span></dd>
                <dd>数量：<?php echo ($vo["num"]); ?></dd>
                <dd class="xuxian">总计：<span class="red"><?php echo ($vo["total"]); ?></span></dd>
            </dl>
            <div class="Mtxor_tel">
            	<ul>
                	<li class="tel_img"></li>
            		<li><p><a href="">热线电话</a></p>
                		<p>400-999-6666</p></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>      <!--  清除M_txor里面左右部分的浮动  -->
        <div class="shang_xia">
            	<input type="button" onclick="javascript:window.history.go(-1);" value="上一步" class="Mtxor_inp2" />
                <input type="submit" value="确认提交" class="Mtxor_inp2" />
            </form>
            <div class="clear"></div>
        </div>
    </div>
	<div class="footer_topbg"></div>
    <div class="footer">
        <div class="footer_bg">
        	<div class="link">友情连接：<a href="">义乌签证</a>|<a href="">使馆认证</a>|
            	<a href="">使馆认证</a>|<a href="">使馆认证</a>|<a href="">使馆认证</a>| 
            	<a href="">使馆认证</a>|<a href="">使馆认证</a>|<a href="">使馆认证</a>| 
            	<a href="">使馆认证</a>|<a href="">使馆认证</a>|<a href="">使馆认证</a>| 
            	<a href="">使馆认证</a>|<a href="">使馆认证</a>
            </div>
            <div class="copyright">
            	<p>CopyRight @ 2011-2012 义乌市速格报俭代理有限公司 版权所有　地 址：浙江 义乌市城北路258号福田商务公寓313（商检局对面）<br />
                	电 话：86 0579 85365501 - 86 0579 85591661　　　　　技术支持：武汉尚科在线网络技术有限公司
                </p>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		addressInit('cmbProvince', 'cmbCity', 'cmbArea', '湖北', '武汉市', '洪山区');
		var url="<?php echo U('Index/Qzorder/infochange');?>";
		//订单信息修改
		$('#info').click(function(){
			$('.Mqror_con2').show('slow');
		})
		//确认订单修改
		$('#bnt1').click(function(){
			$('.Mqror_con2').hide('slow');
			username=$('input[name="username"]').val();
			phone=$('input[name="phone"]').val();
			email=$('input[name="email"]').val();
			qq=$('input[name="qq"]').val();
			use=$('select[name="use"]').children('option:selected').text();
			address=$('select[name="shen"]').children('option:selected').text()+$('select[name="shi"]').children('option:selected').text()+$('select[name="xian"]').children('option:selected').text()+$('textarea[name="xq"]').val();
			$.get(url,{"username":username,"phone":phone,"use":use,"email":email,"qq":qq,"address":address},function(datas){
				$('#xq').children('dd').remove();
				var data=eval("("+datas+")");
				var item;
				item="<dd>联系人姓名："+data['username']+"</dd><dd>手机号码："+data['phone']+"</dd><dd>电子邮箱："+data['email']+"</dd><dd>QQ："+data['qq']+"</dd><dd>护照返还方式："+data['use']+"</dd><dd>公司地址："+data['address']+"</dd>";
				$('#xq').append(item);
			})
		})
		//出行人信息修改
		//$('#infoedit').click(function(){
			//$('.Mqror_con4').show('slow');
		//})
		//确认出行人信息修改
		//$('#bnt2').click(function(){
			//$('.Mqror_con4').hide('slow');
		//})
		//添加出行人信息
		//$('.Mtxor_inp4').click(function(){
			//$('#ren').append('<tr><td>姓名：</td><td><input type="text" name="user[]" value="" class="Mtxor_inp3" /></td><td>手机号：</td><td><input type="text" name="" value="" class="Mtxor_inp3" /></td><td><a onclick="deletes(this);"><img src="__PUBLIC__/images/qzimages/qk.png" class="et"/></a></td></tr> ');
		//})
		
		//function deletes(k) {
			//$(k).parent().parent().hide('slow');
		//}
	</script>
</body>
</html>