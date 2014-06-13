<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表详情页</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzty.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/dh.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/top.js"></script>
</head>
<body>
	<div class="header">
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>速格签证</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzindex.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzframe_2012415.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzty.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzlayer.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/dh.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/flash.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/top.js"></script>
</head>
<body>
	<div class="header">
<div class="header_topbg">
        	<div class="head">
            	<div class="date">欢迎访问速格　<?php echo (date('Y-m-d g:i a',time())); ?></div>
                <div class="tel">全国免费咨询热线：<span class="tel_bg">400-888-8585</span></div>
                <div class="top_nav"><a href="" class="fenxiang">一键分享</a><a href="" class="weixin">+微信</a><a href="" class="shoucang">+收藏</a></div>
            </div>
        </div>
        <div class="top_yy"></div>
        <div class="logo_search">
        	<div class="logo"><a href=""><img src="__PUBLIC__/Home/images/qzimages/logo.jpg" /></a></div>
            <div class="search">
            	<table cellpadding="0" cellspacing="0">
                	<form>
                    	<td><input type="text" id="search_key" name="" value="" class="textk" /></td>
                        <td><input type="button" name="" value="搜索" class="ss" /></td>
                    </form>
                </table>
            </div>
        </div>
		<div class="nav_vipbg">
        <div class="nav_vip">
            	<div class="nav">
                    <ul class="topnav">
                        <li><a href="<?php echo U('Index/Qzindex/index');?>">站内首页</a></li>
                        <li><a href="<?php echo U('Index/Qzindex/aboutUs');?>">关于我们</a>
                        	<ul class="subnav">
                                <li><a href="<?php echo U('Index/Qzindex/aboutUs','','');?>">公司简介</a></li>
                                <li><a href="<?php echo U('Index/Qzindex/wmdys','','');?>">我们的优势</a></li>
                                <li><a href="<?php echo U('Index/Qzindex/sgdt','','');?>">速格动态</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo U('Index/QzColumn/zsbd','','');?>">知识宝鼎</a>
                        	<!-- <ul class="subnav">
                                <li><a href="">签证资讯</a></li>
                                <li><a href="">旅行指南</a></li>
                            </ul> -->
                        </li>
                        <li><a href="__APP__/QzCountry/qzList">单证与使馆签证</a></li>
                        <li><a href="__APP__/Rzindex/index">速格认证</a></li>
                        <li><a href="jifen.bak/index.php">积分商城</a></li>
                    </ul>
                </div>
                <div class="vip">
					<?php if($_SESSION['uname']== null): ?><a href="__APP__/Com/login" class="login" />会员登录</a>
                    	<a href="__APP__/ShopReg/register" class="register" />会员注册</a>
					<?php else: ?>
						您好:<a href="__APP__/Vip/index" class="login" /><?php echo (session('loginuser')); ?></a><?php endif; ?>
                </div>
		</div>
</div>
            <script type="text/javascript">
                $(function(){
                        var default_key = '输入你要搜索的内容';
                        var searchObj = $("#search_key");
                        searchObj.val(default_key);
                        searchObj.bind("focus",function(){
                        
                            if(searchObj.val() == default_key){
                                searchObj.val('');
                            }
                        })
                        
                        searchObj.bind("blur",function(){
                            if(searchObj.val() == ''){
                                searchObj.val(default_key);
                            }
                        })
                        
                    })
			</script>
    </div>
    <div class="M_xnews">
    	<div class="Mcaut_tit"><a href="<?php echo U('Index/Index/index');?>">首页</a> > <a href="">关于我们</a></div>
        <div class="xnews_left">
        	<div class="xnewsl_tit">
            	<p class="bt"><a href=""><?php echo ($detail["title"]); ?></a></p>
                <p class="sj">时间：<?php echo ($detail["ctime"]); ?>　来源：<?php if($detail['comfrom'] == 0): ?>速格<?php else: echo ($detail["comfrom"]); endif; ?>　作者：<?php echo ($detail['rootUser']['rootName']); ?>  浏览次数：<?php echo ($detail["traffic"]); ?></p>
            </div>
            <div class="xnewsl_con">
            	<?php echo ($detail["content"]); ?>
            </div>
        </div>
        <div class="xnews_right">
        	<div class="xnewsr_a1">
            	<dl>
                	<dt><a href="">最新消息</a></dt>
					<?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
            <div class="xnewsr_a2">
            	<dl>
                	<dt><a href="">阅读排行</a></dt>
					<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?><span color="blue">[<?php echo ($v["traffic"]); ?>]</span></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
            <div class="xn_gg"><a href=""><img src="__PUBLIC__/Home/images/qzimages/xn_gg.jpg" /></a></div>
        </div>
        <div class="clear"></div>     <!--  清除M_xnews左右2快的浮动  -->
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