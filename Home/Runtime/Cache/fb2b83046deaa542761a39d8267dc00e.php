<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公司简介</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/ny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/ty.css" />
<script src="__PUBLIC__/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/dh.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/sun11.js"></script>
<script  type="text/javascript" src="__PUBLIC__/Home/js/topss.js"></script>
<script  type="text/javascript" src="__PUBLIC__/Home/js/new.js"></script>
<script  type="text/javascript" src="__PUBLIC__/Home/js/topvise.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/toptab.js"></script>
</head>
 <body>
	<div class="header">
    	<div class="header_topbg">
        	<div class="head">
            	<div class="date">欢迎访问速格　<?php echo (date('Y-m-d g:i a',time())); ?></div>
                <div class="top_nav"><a href="">登录</a>|<a href="">注册</a>|<a href="">积分兑换</a>|<a href="">一键分享</a></div>
            	<div class="tel">全国免费咨询热线：<span class="tel_bg">400-888-8585</span></div>
            </div>
        </div>
        <div class="top_yy"></div>
        <div class="logo_search">
        	<div class="logo"><a href=""><img src="__PUBLIC__/Home/images/rzimages/vip_logo.jpg" /></a></div>
            <div class="search">
            	<table cellpadding="0" cellspacing="0">
                	<form>
                    	<td><input type="text" id="search_key" name="" value="" class="textk" /></td>
                        <td><input type="button" name="" value="搜索" class="ss" /></td>
                    </form>
                </table>
            </div>
            <div class="min_nav"><a href="" class="shouji">手机版</a><a href="" class="weixin">+微信</a><a href="" class="weibo">+微博</a></div>
        </div>
        <div class="navbg">
        	<div class="nav">
            	<ul class="topnav">
                	<li><a href="<?php echo U('Index/Rzindex/index');?>">站内首页</a></li>
                    <li><a href="<?php echo U('Index/AlonePage/aboutUs');?>">关于我们</a>
                    	<ul class="subnav">
                        	<li><a href="<?php echo U('Index/AlonePage/aboutUs','','');?>">公司简介</a></li>
                            <li><a href="<?php echo U('Index/AlonePage/wmdys','','');?>">我们的优势</a></li>
                            <li><a href="<?php echo U('Index/AlonePage/sgdt','','');?>">速格动态</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo U('Index/RzCountry/rzList');?>">单证与使馆认证</a></li>
                    <li><a href="<?php echo U('Index/Qzindex/index');?>">签证服务</a></li>
                    <li><a href="<?php echo U('Index/AlonePage/cxzz','','');?>">诚信资质</a></li>
                    <li><a href="<?php echo U('Index/DownData/download','','');?>">资料下载</a></li>
                    <li><a href="<?php echo U('Index/RzColumn/zsbd','','');?>">知识宝鼎</a>
                    	<ul class="subnav">
                        	<?php if(is_array($title)): foreach($title as $key=>$vo): ?><li><a href="<?php echo U('Index/RzColumn/zsbd/',array('id'=>$vo['id']),'');?>"><?php echo ($vo['col_name']); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo U('Index/AlonePage/contactUs');?>">联系我们</a></li>
                </ul>
            </div>
        </div>

    <div class="M_download">
    	<div class="Mcaut_tit"><a href="">首页</a> > <a href="">关于我们</a></div>
        <div class="Md_left">
        	<div class="about_ltit">
            	<ul>
                	<li><a href="<?php echo U('Index/AlonePage/aboutUs');?>">公司简介</a></li>
                    <li><a href="<?php echo U('Index/AlonePage/sgdt');?>">速格动态</a></li>
                </ul>
            </div>
            <div class="about">
            	<img src="__PUBLIC__/Home/images/rzimages/about_img.jpg" />
            	<p>　　义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与
                义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与
                义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与
                义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证服务与义乌市速格报检代理有限公司，是一家专业从事外贸单证。
                </p>
                <p>义乌速格发展历程：</p>
                <p>便开展各类型单证签证，在2004年3月，便开展各类型单证签证证签证单证签证证签证单证签证。</p>
                <p>在2004年3月，便开展各类型单证签证，在2004年3月，便开展各类型单证签证，在2004年3月，便开展各类型单证签证，在2004年3月，便开展各类型单证签证，
                在2004年3月。</p>
                <p>便开展各类型单证签证，在2004年3月，便开展各类型单证签证，在2004年3月，便开展各类型单证签证，在2004年3月，便开展各类型单证签证证签证
                在2004年3月。</p>
                <div class="sg">
                	<p>义乌市速格报检代理有限公司目前开展的业务；</p>
                    <p>1、代办各国驻上海使馆认证‘代办外交部及使馆认证；</p>
                    <p>2、代办出口各国的出产地证认证；</p>
                    <p>3、代办因私护照、及其相关业务；</p>
                    <p>4、代办SGS认证；</p>
                </div>
            </div>
           
        </div>
        <div class="Md_right">
        	<div class="vise">
                <div class="sTab">
                    <div class="T_title">
                        <ul id="my_tab">
                            <li class="zc" onmouseover="sTabs(this,0);"><a href="">办理签证</a></li>
                            <li class="jg" onmouseover="sTabs(this,1);"><a href="">进度查询</a></li> 			      
                        </ul>
                    </div>
                    <div class="T_Con">
                        <div id="my_tab_con0">
                            <dl>
                                <dt>国家或地区：</dt>
                                <form>
                                <dd><input type="text" name="" value="" id="country_key" class="country" /></dd>
                                <dd><input type="button" name="" value="查询" class="inp_cx" /></dd>
                                </form>
                            </dl>
                        </div>
                        <div id="my_tab_con1" class="none">
                            <table cellpadding="0" cellspacing="0" border="none">
                            <form>
                                <tr>
                                    <td class="dd_num">订单号</td><td><input type="text" name="" value="" id="dd_key" class="dd_text" /></td>
                                </tr>
                                <tr>
                                    <td class="phone_num">手机号</td><td><input type="text" name="" value="" class="phone_text" /></td>
                                </tr>
                                <tr>
                                    <td class="dd_num">&nbsp;</td><td><input type="button" name="" value="立即查询" class="cx" /><a href="" class="forget">忘记订单号？</a></td>
                                </tr>
                            </form>
                            </table>
                        </div>
                    </div>	
                </div>
            </div>
            <div class="vise_yy"></div>
            <div class="big_a">
                <ul>
                    <li class="big_one"><a href="">认证视频</a></li>
                    <li class="big_two"><a href="">诚信通在线</a></li>
                    <li class="big_thr"><a href="">诚信通如何交易</a></li>
                    <li class="big_four"><a href="">实地认证</a></li>
                </ul>
            </div>
            <div class="Md_r1">
            	<div class="Mdr1_tit"><a href="">热门欧洲认证</a></div>
                <div class="Mdr1_con">
                	<dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                </div>
            </div>
            <div class="Md_r1">
            	<div class="Mdr1_tit"><a href="">热门亚洲认证</a></div>
                <div class="Mdr1_con">
                	<dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                    <dl>
                    	<dt><a href=""><img src="__PUBLIC__/Home/images/rzimages/usa.jpg" /></a></dt>
                        <dd>美国</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="clear"></div>     <!--  清除M_download里面的左，右部分浮动  -->
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