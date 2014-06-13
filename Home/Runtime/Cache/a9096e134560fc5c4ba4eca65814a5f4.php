<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线登录</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ty.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ny.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script>
</head>
				
                <!--  搜索js (外联没效果) --> 
				<script type="text/javascript">
				$(function(){
        			var default_key = '请输入相关关键字';
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


<body>
	<div class="header">
    	<div class="topnavbg">
        	<div class="topnav">
            	<div class="leftsidebar">
                	<a href="">欢迎访问本店</a> | <a href="">返回首页</a> | <a href="">收藏本站</a>
               	</div>
                <div class="rightsidebar">
                	<a href="">登录</a> | <a href="">注册</a> | <a href="">我的账户</a> | <a href="">我的积分</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="header-two">
        	<div class="logo"><a href=""><img src="__PUBLIC__/Home/images/shop/logo.jpg" /></a></div>

            <div class="search">
            	<table>
                	<form>
                    	<td><input type="text" name="" id="search_key" value="" class="search_one" /></td>
                        <td><a href=""><input type="button" name="" value="搜索" class="ss" /></a></td>
                    </form>
                </table>
            </div>
            <div class="clear"></div>
        </div>
        <div class="navbg">
        	<div class="nav">
            	<ul>
                	<li class="Mnav"><a class="type_lock" href="javascript:void(0)">礼品分类</a></li>
                    <li><a href="">商城首页</a></li>
                    <li class="shuxian"></li>
                    <li><a href="">积分获取</a></li>
                    <li class="shuxian"></li>
                    <li><a href="">我的积分</a></li>
                    <li class="shuxian"></li>
                    <li><a href="">积分查询</a></li>
                    <li class="shuxian"></li>
                    <li><a href="">热门兑换</a></li>
                    <li class="shuxian"></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="M_loin">
    	<div class="loin">
        	<dl>
            <form action="<?php echo U('Index/Com/dologin');?>" method="post">
            	<dt><h3>您尚未登录</h3></dt>
                <dd class="user_mm">用户名</dd>
                <dd><input type="text" name="uname" value="" class="user" /></dd>
                <dd class="user_mm">密码<span class="forget"><a href="">忘记密码？</a></span></dd>
                <dd><input type="password" name="upwd" value="" class="mm" /></dd>
                <dd class="dz"><input type="submit" name="" value="登录" class="btn_loin" /><span class="zhuce">还没注册？　　<a href="">立即注册</a></span></dd>
            </form>
            </dl>
        </div>
        <div class="loin_ban"><a href=""><img src="__PUBLIC__/Home/images/shop/loin_ban.jpg" /></a></div>
        <div class="clear"></div>       <!--  清楚M_loin浮动  -->
    </div>
    <div class="M_loin_dx"></div>
    <div class="footer">
    	<div class="linkbg">
        	<div class="footer-con">
                <div class="min-nav">
                	<dl>
                    	<dt class="xinshou"><h4><a href="">新手上路</a></h4></dt>
                        <dd><a href="">客户登陆</a></dd>
                        <dd><a href="">10000知道</a></dd>
                    </dl>
                    <dl>
                    	<dt class="peisong"><h4><a href="">配送服务</a></h4></dt>
                        <dd><a href="">配送时限/范围</a></dd>
                        <dd><a href="">礼品签收注意事项</a></dd>
                        <dd><a href="">关于订单拆分</a></dd>
                        <dd><a href="">配送流程</a></dd>
                    </dl>
                    <dl>
                    	<dt class="shouhou"><h4><a href="">售后服务</a></h4></dt>
                        <dd><a href="">配送时限/范围</a></dd>
                        <dd><a href="">礼品签收注意事项</a></dd>
                        <dd><a href="">关于订单拆分</a></dd>
                        <dd><a href="">配送流程</a></dd>
                    </dl>
                    <dl>
                    	<dt class="help"><h4><a href="">帮助中心</a></h4></dt>
                        <dd><a href="">配送时限/范围</a></dd>
                        <dd><a href="">礼品签收注意事项</a></dd>
                        <dd><a href="">关于订单拆分</a></dd>
                        <dd><a href="">配送流程</a></dd>
                    </dl>
                </div>
                <div class="partner">
                	<dl>
                    	<dt><h4><a href="">合作伙伴</a></h4></dt>
                        <dd class="nh"><a href="">南航</a><span class="pn"><a href="">平安万里通</a></span></dd>
                        <dd class="yyt"><a href="">乐益通</a><span class="jfx"><a href="">聚分享</a></span></dd>
                        <dd class="gh"><a href="">国航</a><span class="al"><a href="">安利</a></span></dd>
                    </dl>
                </div>
                <div class="link">
                	<dl>
                    	<dt><h4><a href="">友情链接</a></h4></dt>
                        <dd class="lx"><a href="">翼游旅行</a></dd>
                        <dd class="jd"><a href="">尊茂酒店</a></dd>
                        <dd class="kg"><a href="">号百控股</a></dd>
                    </dl>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="copyright">
        	<p>Copyright @ 2011-2012 义乌市速格报检代理有限公司 版权所有<br />地&nbsp;&nbsp;址：浙江义乌市城北路258号福田商务公寓313室（商检局对面）&nbsp;&nbsp;电&nbsp;&nbsp;话：86&nbsp;&nbsp;0579&nbsp;&nbsp;85365501 - 86&nbsp;&nbsp;0579&nbsp;&nbsp;85591661<br />
            </p>
        </div>
    </div>
</body>
</html>