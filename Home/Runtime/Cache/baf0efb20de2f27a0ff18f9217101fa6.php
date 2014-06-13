<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成功提交订单</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/qzty.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script  type="text/javascript" src="__PUBLIC__/js/topss.js"></script>
</head>
<body>
	<div class="txor_header">
    	<div class="txor_banner"><a href="<?php echo U('Index/Qzindex/index');?>"><img src="__PUBLIC__/images/qzimages/logo.jpg" /></a></div>
        <div class="oright_nav">
        	<ul>
            	<li><a href="" class="rnav1" style="background:url(__PUBLIC__/images/qzimages/rnav1_hover.jpg) no-repeat;">1.订单信息填写</a></li>
                <li><a href="" class="rnav2" style="background:url(__PUBLIC__/images/qzimages/rnav2_hover.jpg) no-repeat;">2.订单信息确认</a></li>
                <li><a href="" class="rnav3" style="background:url(__PUBLIC__/images/qzimages/rnav3_hover.jpg) no-repeat;">3.成功提交订单</a></li>
            </ul>
        </div>
    </div>
    <div class="M_tjor">
    	<div class="Mtjor_c1">
        	<dl>
            	<dt>订单提交成功，请你尽快付款！</dt>
                <dd>订单号：<?php echo ($orderid); ?>　|　应付金额：¥<span class="red3"><?php echo ($cash); ?></span></dd>
            </dl>
        </div>
        <div class="Mtjor_con2">
        	<div class="Mtjor_t2"><a href="">支付方式</a></div>
            <div class="Mtjor_c2">
            <form>
            	<div class="Mtjor_c21">
                	<ul>
                    	<li>借记卡支付</li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank1.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank2.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank3.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank4.jpg" /></li>
                        <li><a href="" class="blue1">其他银行</a></li>
                    </ul>
                </div>
                <div class="Mtjor_c22">
                	<ul>
                    	<li>信用卡支付</li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank1.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank2.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank3.jpg" /></li>
                        <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank5.jpg" /></li>
                        <li><a href="" class="blue1">其他银行</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
                <div class="Mtjor_c23">
                	<table cellpadding="0" cellspacing="0" border="0px none" width="100%">
                    	<tr>
                        	<td><input type="radio" name="bank" value="" /></td>
                        	<td class="bank_x"><a href=""><img src="__PUBLIC__/images/qzimages/bank_1.png" /></a></td>
                        	<td><p class="orange1">支付宝支付</p><p>通过支付宝网上付款功能，轻松的在线支付</p></td>
                        </tr>
                        <tr>
                        	<td><input type="radio" name="bank" value="" /></td>
                        	<td bank_x><a href=""><img src="__PUBLIC__/images/qzimages/bank_2.png" /></a></td>
                        	<td><p class="orange1">支付宝支付</p><p>通过支付宝网上付款功能，轻松的在线支付</p></td>
                        </tr>
                        <tr>
                        	<td><input type="radio" name="bank" value="" /></td>
                        	<td bank_x><a href=""><img src="__PUBLIC__/images/qzimages/bank_3.png" /></a></td>
                        	<td><p class="orange1">支付宝支付</p><p>通过支付宝网上付款功能，轻松的在线支付</p></td>
                        </tr>
                    </table>
                </div>
                <div class="Mtjor_c24">
                	<div class="c24_tit">
                    	<a href="">对公账号</a>
                        <div class="tj_tel">
                        	<dl>
                                <dt><a href="">热线电话</a></dt>
                                <dd>400-999-6666</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="c24_con">
                        <ul>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank1.jpg" /></li>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank2.jpg" /></li>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank5.jpg" /></li>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank6.jpg" /></li>
                            <li><a href="" class="blue1">其他银行</a></li>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank7.jpg" /></li>
                            <li><input type="radio" name="bank" value="" class="rad1" /><img src="__PUBLIC__/images/qzimages/bank8.jpg" /></li>
                        </ul>
                        <div class="clear"></div>
                        <p>开户行：中国工商银行股份有限公司北京朝阳支行</p>
                        <p>北京不佰程国际旅游有限公司</p>
                        <p>账号：0200 0034 1920 1323 902</p>
                        <p>汇款时间：请提前3个工作日</p>
                        <p>提示：请在汇款之后保留汇款凭证</p>
                    </div>
                    <input type="button" name="" value="立即支付" class="Mtjor_zf" />
                </div>
            </form>
            </div>
        </div>
    </div>
	<div class="footer_topbg"></div>
    <div class="footer">
        <div class="footer_bg">
        	<div class="link">友情连接：<a href="" style="margin-left:0px;">义乌签证</a>|<a href="">使馆认证</a>|
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