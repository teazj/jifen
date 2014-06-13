<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>速格</title>
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
                    <li><a href="<?php echo U('Index/Rzindex/aboutUs');?>">关于我们</a>
                    	<ul class="subnav">
                        	<li><a href="<?php echo U('Index/Rzindex/aboutUs','','');?>">公司简介</a></li>
                            <li><a href="<?php echo U('Index/Rzindex/wmdys','','');?>">我们的优势</a></li>
                            <li><a href="<?php echo U('Index/Rzindex/sgdt','','');?>">速格动态</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo U('Index/RzCountry/rzList');?>">单证与使馆认证</a></li>
                    <li><a href="<?php echo U('Index/Qzindex/index');?>">签证服务</a></li>
                    <li><a href="<?php echo U('Index/RzColumn/cxzz','','');?>">诚信资质</a></li>
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

    <div class="M_caut">
    	<div class="Mcaut_tit"><a href="">首页</a> > <a href="">签证</a> > <a href="">所有办理签证国家</a></div>
        <table cellpadding="0" cellspacing="0" border="0px none">
        <form>
        	<tr>
        		<td><input type="text" name="" value="" id="Mc_search_key" class="Mc_search" /></td>
                <td><input type="button" name="" value="查询" class="Mc_cx" /></td>
            </td>
        </form>
        </table>
        <div class="caut">
        	<div class="caut_tit">
            	<a href="javascript:void(0)" class="caut_sx">筛选：</a>
                <ul>
                	<li><a href="<?php echo U('Index/QzCountry/qzList');?>">全部</a></li>
                	<?php if(is_array($name)): foreach($name as $key=>$vo): ?><li class="a_sx"></li>
	                    <li><a href="<?php echo U('Index/QzCountry/qzClass',array('id'=>$vo['id']),'');?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="qaut_con">
            <?php if(is_array($name)): foreach($name as $key=>$vo): ?><div class="qaut_con1">
                    <div class="qaut_t1"><a href="javascript:void()"><?php echo ($vo["name"]); ?></a></div>
                    <ul>
                    <?php if(is_array($vo["sublist"])): foreach($vo["sublist"] as $key=>$vo1): ?><li><a href="<?php echo U('Index/Vista/index',array('id'=>$vo1['id']),'');?>"><?php echo ($vo1["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                    <div class="clear"></div>
                </div><?php endforeach; endif; ?>
            </div>
        </div>
    <div class="clear"></div><!--  清除主体内容里面的浮动  -->
    </div>