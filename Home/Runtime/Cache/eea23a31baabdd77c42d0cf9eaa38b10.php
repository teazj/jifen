<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单信息填写</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzty.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script  type="text/javascript" src="__PUBLIC__/js/topss.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jsAddress.js"></script>
</head>

<body>
	<div class="txor_header">
    	<div class="txor_banner"><a href="<?php echo U('Index/Qzindex/index');?>"><img src="__PUBLIC__/images/qzimages/logo.jpg" /></a></div>
        <div class="oright_nav">
        	<ul>
            	<li><a href="" class="rnav1" style="background:url(__PUBLIC__/images/qzimages/rnav1_hover.jpg) no-repeat;">1.订单信息填写</a></li>
                <li><a href="" class="rnav2">2.订单信息确认</a></li>
                <li><a href="" class="rnav3">3.成功提交订单</a></li>
            </ul>
        </div>
    </div>
    <div class="M_txor">
    	<div class="Mtxor_left">
        	<div class="Mtxot_ltit">泰国旅游签证[北京领区]特价促销</div>
            <div class="Mtxor_con1">
            	<div class="Mtxor_t1">订购产品信息</div>
                <table cellpadding="0" width="100%">
                	<tr>
                    	<th>签证名称</th><th>计划出行日期</th><th>价格</th><th>份数</th>
                    </tr>
                    <tr>
                    	<th><?php echo ($v["vname"]); ?></th><th><?php echo ($v["gtime"]); ?></th><th><?php echo ($v["price"]); ?></th>
                        <td>
                        	<input type="button" value="-" class="jian" />
                            <input type="type" name="num" value="<?php echo ($v["num"]); ?>" class="shuzi" />
                            <input type="button" value="+" class="jia" />
                        </td>
                    </tr>
                </table>
            </div>
				<script>
					var num=parseInt($('.shuzi').val());
					$(".jian").click(function(){
						if(num<2){
							num=1;
						}else{
							num=num*1-1;
							$('.shuzi').val(num);
							$('.zshuzi').val(num);
							$('.zshuzi').html(num);
							var total=<?php echo ($v["price"]); ?>*num;
							$('.total').html(total);
						}
					})
					
					$('.jia').click(function(){
							num=num*1+1;
							$('.shuzi').val(num);
							$('.zshuzi').val(num);
							$('.zshuzi').html(num);
							var total=<?php echo ($v["price"]); ?>*num;
							$('.total').html(total);
					})
					
					$('.shuzi').blur(function(){
						num=parseInt($('.shuzi').val());
						$('.zshuzi').val(num);
						$('.zshuzi').html(num);
						var total=<?php echo ($v["price"]); ?>*num;
						$('.total').html(total);
						})
			</script>
            <div class="Mtxor_con2">
            	<div class="Mtxor_t2">联系人信息</div>
				<form id="rela" action="<?php echo U('Index/Rzorder/reorder');?>" method="post">
                <table cellpadding="0" cellspacing="0" border="0px none" width="100%">
					 <input type="hidden" name="vname" value="<?php echo ($v["vname"]); ?>" />
					 <input type="hidden" name="gtime" value="<?php echo ($v["gtime"]); ?>" />
					 <input type="hidden" name="price" value="<?php echo ($v["price"]); ?>" />
					 <input type="hidden" name="place" value="<?php echo ($v["place"]); ?>" />
					 <input type="hidden" name="sid" value="<?php echo ($v["sid"]); ?>" />
					 <input type="hidden" name="tname" value="<?php echo ($v["tname"]); ?>" />
					 <input type="hidden" name="num" class="zshuzi" value="<?php echo ($v["num"]); ?>" />
					 <input type="hidden" name="user_id" value="<?php echo ($_SESSION['index']['user_id']); ?>">
                	<tr>
                    	<td class="tableft"><span class="red">*</span>联系人姓名：</td>
                        <td><input type="text" name="username" value="" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>联系人手机：</td>
                        <td><input type="text" name="phone" value="" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft">联系人邮箱：</td>
                        <td><input type="text" name="email" value="" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft">联系人Q Q：</td>
                        <td><input type="text" name="qq" value="" class="Mtxor_inp1" /></td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>护照返还方式：</td>
                        <td>
                        	<select class="Mtxor_se1" name="use">
                            	<option value="1" checked>快递</option>
                                <option value="2">平邮</option>
                                <option value="3">EMS</option>
                                <option value="4">顺丰</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td class="tableft"><span class="red">*</span>配送地址：</td>
                        <td>
                            	省：<select class="Mtxor_se2" name="shen" id="cmbProvince"></select>
								市：<select class="Mtxor_se2" name="shi" id="cmbCity"></select>
								区：<select class="Mtxor_se2" name="xian" id="cmbArea"></select>
                        </td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td><td><textarea name="xq" class="Mtxor_text"></textarea></td>
                    </tr>
				<script type="text/javascript">
					addressInit('cmbProvince', 'cmbCity', 'cmbArea', '湖北', '武汉市', '洪山区');
				</script>
                </table>
            </div>
			<!-- 出行人信息暂时注释 -->
            <!-- <div class="Mtxor_con3">
            	<div class="Mtxor_t2">出行人信息</div>
				<table cellpadding="0" cellspacing="0" border="0px none" width="460px">
					<tr><td colspan="5" style="text-align:left;"><input type="button" name="" value="添加出行人" class="Mtxor_inp4" /></td></tr>
                
				<script>
					$('.Mtxor_inp4').click(function(){
						$('#ren').append('<tr><td>姓名：</td><td><input type="text" name="user[]" value="" class="Mtxor_inp3" /></td><td>手机号：</td><td><input type="text" name="" value="" class="Mtxor_inp3" /></td><td><a onclick="deletes(this);"><img src="__PUBLIC__/images/qzimages/qk.png" class="et"/></a></td></tr> ');
					})
					
				function deletes(k) {
					$(k).parent().parent().empty('slow');
				}
				</script>
                </table>
				<table id="ren" cellpadding="0" cellspacing="0" border="0px none" width="460px">
                	<tr>
                    	<td>姓名：</td><td><input type="text" name="user[]" value="" class="Mtxor_inp3" /></td><td>手机号：</td><td><input type="text" name="call[]" value="" class="Mtxor_inp3" /></td><td><a style="display:block" onclick="deletes(this);"><img src="__PUBLIC__/images/qzimages/qk.png" class="et"/></a></td>
                    </tr>   
				</table>
            </div> -->
        </div>
        <div class="Mtxor_right">
        	<dl>
            	<dt>总价</dt>
                <dd><?php echo ($v["tname"]); ?>：<span class="f_w">¥ <span class="red"><?php echo ($v["price"]); ?></span></span></dd>
                <dd>数量：<span class="zshuzi"><?php echo ($v["num"]); ?></span></dd>
                <dd class="xuxian">总计：<span class="red total"><?php echo ($v["total"]); ?></span></dd>
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
            	<input type="button" onclick="javascript:window.history.go(-1);"value="上一步" class="Mtxor_inp2" />
                <input type="submit" value="下一步" class="Mtxor_inp2" />
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
</body>
</html>