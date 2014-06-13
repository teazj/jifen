<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员中心、个人信息</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/shop/vipty.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/shop/ny.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ss.js"></script>
</head>

<body>
	<div class="header">
    	<div class="header_topbg">
        	<div class="head">
            	<div class="date">欢迎访问速格　2014年3月12日　星期二</div>
                <div class="tel">全国免费咨询热线：<span class="tel_bg">400-888-8585</span></div>
                <div class="top_nav"><a href="" class="fenxiang">一键分享</a><a href="" class="weixin">+微信</a><a href="" class="shoucang">+收藏</a></div>
            </div>
        </div>
        <div class="top_yy"></div>
        <div class="logo_search">
        	<div class="logo"><a href=""><img src="__PUBLIC__/images/shop/vip_logo.jpg" /></a></div>
            
            <!--  显示的收索内容和ss.js不一样  -->
            <!--<script type="text/javascript">
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
			</script>-->
            
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
                    <ul>
                        <li><a href="<?php echo U('Index/RzIndex/index');?>">站内首页</a></li>
                        <li><a href="<?php echo U('Index/AlonePage/aboutUs');?>">关于我们</a></li>
                        <li><a href="<?php echo U('Index/RzColumn/zsbd','','');?>">知识宝鼎</a></li>
                        <li><a href="<?php echo U('Index/RzCountry/rzList');?>">单证与使馆认证</a></li>
                        <li><a href="<?php echo U('Index/Index/index');?>">积分商城</a></li>
                    </ul>
                </div>
                <div class="vip">
                	<ul>
                    <form>
                    	<li>Hi <?php echo (session('uname')); ?><a href="<?php echo U('Index/ShopReg/logOut',array('act'=>'out'),'');?>" class="out">[退出]</a></li>
                    </form>
                    </ul>
                </div>
        	</div>
        </div>
        <div class="clear"></div>     <!--  清除header的浮动  -->
    </div>
    <div class="M_vipmm">
    	<div class="Mvip_left">
        	<div class="Mvip_1">
            	<dl>
                	<dt><a href="">我的速格</a></dt>
                    <dd><a href="" class="blue1"><?php echo ($_SESSION['index']['uname']); ?></a><a href="" class="ziji"></a><div class="clear"></div></dd>
                    <dd>欢迎您回来</dd>
                    <dd>速格会员 <a href="" class="huiyuan">尊享会员服务</a></dd>
                    <dd>上次登录时间：</dd>
                    <dd><?php echo (date('Y/m/d H:i:s',$_SESSION['index']['preTime'])); ?></dd>
                </dl>
            </div>
            <div class="Mvip_2">
            	<dl>
                	<dt><a href="">我的订单</a></dt>
                    <dd><a href="<?php echo U('Index/Vip/order');?>">新订单</a></dd>
                    <dd><a href="<?php echo U('Index/Vip/myorder');?>">签证订单</a></dd>
                    <dd><a href="">认证订单</a></dd>
                    <dd id="nobor_tom"><a href="">兑换订单</a></dd>
                </dl>
            </div>
            <div class="Mvip_3">
            	<dl>
                	<dt><a href="">我的积分</a></dt>
                    <dd><a href="<?php echo U('Index/Vip/exchange');?>">积分兑换</a></dd>
                    <dd id="nobor_tom"><a href="">兑换记录</a></dd>
                </dl>
            </div>
            <div class="Mvip_4">
            	<dl>
                	<dt><a href="">我的设置</a></dt>
                    <dd><a href="<?php echo U('Index/Vip/userinfo');?>">个人资料</a></dd>
                    <dd><a href="<?php echo U('Index/Vip/pwd');?>">修改密码</a></dd>
                </dl>
            </div>
            <div class="Mvip_5">
            	<dl>
                	<dt><a href="">配送地址</a></dt>
                    <dd><a href="<?php echo U('Index/Vip/address');?>">我的配送地址</a></dd>
                    <dd id="nobor_tom"><a href="<?php echo U('Index/Vip/addaddress');?>">新增配送地址</a></dd>
                </dl>
            </div>
        </div>
        <div class="Mvip_right">
        	<div class="vipr_tit"><a href="">个人信息</a></div>
            <div class="xperson">
            	<div class="xperson_t">
                	<ul>
                    	<li>用 户 名：<span class="blue2"><?php echo ($v["uname"]); ?></span></li>
                        <li>联系电话：<span class="blue2"><?php echo ($v["uphone"]); ?></span></li>
                        <li>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<span class="blue2"><?php echo ($v["uemail"]); ?></span></li>
                        <li>会员级别：<span class="blue2"><?php if($v['lev'] == 1): ?>青铜会员<?php elseif($v['lev'] == 2): ?>白银会员<?php else: ?>黄金会员<?php endif; ?></span></li>
                        <li>积分总是：<span class="blue2"><?php echo ($v["jifen"]); ?></span></li>
                        <li>优 惠 券：<span class="blue2"><?php echo ($v["yhj"]); ?></span></li>
                    </ul>
                </div>
                <div class="person_m">
                	<ul>
                    	<li>真实姓名：<?php echo ($v["truename"]); ?></li>
                        <li>性&nbsp;&nbsp;&nbsp;&nbsp;别：<?php if($v['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></li>
                        <li>昵&nbsp;&nbsp;&nbsp;&nbsp;称：<?php echo ($v["uname"]); ?></li>
                        <li>联系电话：<?php echo ($v["uphone"]); ?></li>
                        <li>所属省份：<?php echo ($v["address"]); ?></li>
                        <li>详细地址：<?php echo ($v["address"]); ?></li>
                        <li>邮政编码：<?php echo ($v["zipCode"]); ?></li>
                    </ul>
                </div>
                <div class="person_d">
                	<ul>
                    	<li>注册时间： <?php echo (date('Y/m/d H:i:s',$v["regTime"])); ?></li>
                        <li>最后登录： <?php echo (date('Y/m/d H:i:s',$v["preTime"])); ?></li>
                        <li>登录次数： 1</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>      <!--  清除主体部分M_vipmm的浮动  -->
    </div>
    <div class="footer_topbg"></div>
    <div class="footer">
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
</body>
</html>