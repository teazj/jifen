<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>积分商城首页</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/index.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ty.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ny.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/function.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/new.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/ss.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/tcc.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.kinMaxShow-1.1.min.js"></script>
</head>
<body>
	<div class="container">
	<div class="header">
    	<div class="topnavbg">
        	<div class="topnav">
            	<div class="leftsidebar">
                	<a href="">欢迎访问本店</a> | <a href="">返回首页</a> | <a href="">收藏本站</a>
               	</div>
                <div class="rightsidebar">
                	<a href="">
                	<?php if($_SESSION['uname']== null): ?><a href="<?php echo U('Index/Com/login','','');?>">登陆
					</a> | <a href="<?php echo U('Index/ShopReg/register','','');?>">注册</a>
                	<?php else: ?>您好：<?php echo (session('uname')); ?><a href="<?php echo U('Index/ShopReg/logOut',array('act'=>'out'),'');?>">[退出]</a><?php endif; ?>
                	| <a href="<?php echo U('Index/Vip/index');?>">我的账户</a> | <a href="">我的积分</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="header-two">
        	<div class="logo"><a href="<?php echo U('Index/Index/index','','');?>"><img src="__PUBLIC__/Home/images/shop/logo.jpg" /></a></div>

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
                    <li><a href="<?php echo U('Index/index','','');?>">商城首页</a></li>
                    <li class="shuxian"></li>
                    <li><a href="<?php echo U('ShopGetGift/index');?>">积分获取</a></li><!--<?php echo U('Index/ShopGetGift/index','','');?>-->
                    <li class="shuxian"></li>
                    <li><a href="<?php echo U('Vip/index');?>">我的积分</a></li><!--<?php echo U('Index/Vip/index');?>-->
                    <li class="shuxian"></li>
                    <li><a href="">热门兑换</a></li>
                    <li class="shuxian"></li>
					<li><a href="<?php echo U('Qzindex/index');?>">签证服务</a></li>
                    <li class="shuxian"></li>
					<li><a href="<?php echo U('Rzindex/index');?>">认证服务</a></li>
                </ul>
            </div>
        </div>
        <div class="banner">
        	<div class="ban_left">
        		<div id="sidebar">
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--second start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--third start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--one start-->
                    <div class="sidelist">
                        <span class="type_big"><h3><a href="" class="snav">数码产品</a><span class="ss"><a href="">数码产品</a>  <a href="">电脑配件</a>  <a href="">手机配件</a></span></h3></span>
                        <div class="i-list">
                            <div class="mnav">
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>
                                </ul>
                                <ul>
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |
                                                <p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</p><span class="type_so">| <a href="">电水壶</a></span> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> |<br /></li>	
                                </ul>
                                <ul class="no_btm">
                                    <li><a href="##" class="big">厨房电气</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> | <a href="">电磁炉</a> | <a href="">面包机</a> | <a href="">电水壶</a> | <a href="">豆浆机</a> |</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

        	</div>
        	<div class="ban_right"><a href=""><img src="__PUBLIC__/Home/images/shop/banner.jpg" /></a></div>
    	
    	</div>
        <div class="clear"></div>
        <div class="shop">
			<div class="shop-left">
            	<div class="shop-navtit">默认</div>
                <div class="shop-nav">
                	<a href="">热门兑换</a><span class="shop-nav-fx">&nbsp;</span><a href="">精品推荐</a><span class="shop-nav-fx">&nbsp;</span><a href="">畅销热惠</a><span class="shop-nav-fx">&nbsp;</span><a href="">清仓兑换</a>
                </div>
            </div>
            
            <div class="shop-right">
            	<table width="100%">
                	<form>
                    	<td class="shop-mz">礼品分类</td>
                        <td>
                        	<select name="yp" class="yj">
                            	<option value="">数码产品</option>
                                <option value="">数码产品</option>
                                <option value="">数码产品</option>
                                <option value="">数码产品</option>
                            </select>
                        </td>
                        <td class="shop-mz">积分范围</td>
                        <td>
                        	<select name="jf" class="yj">
                            	<option value="">100~1000</option>
                                <option value="">1000~5000</option>
                                <option value="">5000~10000</option>
                                <option value="">10000~50000</option>
                            </select>
                        </td>
                        <td><input type="text" name="" id="sea_key" value="" class="search_two" /></td>
                        <td><input type="button" value="搜索" class="shop-mz" /></td>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <div class="main">
    	<div class="main-one">
        	<div class="main-onename">
            	<div class="main-one-titbg"></div>
                <div class="main-one-tit"><span><a href="">查看更多</a></span><a href="">热门兑换</a></div>
                <div class="clear"></div>
            </div>            
            <div class="main-one-pic">
            	<dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl style="margin-right:-8px;">
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
            </div>
        </div>
        
        <div class="main-two">
        	<div class="main-twoname">
            	<div class="main-two-titbg"></div>
                <div class="main-two-tit"><span><a href="">查看更多</a></span><a href="">精品推荐</a></div>
                <div class="clear"></div>
            </div>
           
            <div class="main-two-pic">
            	<dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl style="margin-right:-8px;">
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
            </div>
        </div>
        <div class="main-thr">
        	<div class="main-thrname">
            	<div class="main-thr-titbg"></div>
                <div class="main-thr-tit"><span><a href="">查看更多</a></span><a href="">畅销特惠</a></div>
                <div class="clear"></div>
            </div>
            <div class="main-thr-pic">
            	<dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl>
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
                <dl style="margin-right:-8px;">
                	<dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_pic_10.jpg" /></a></dt>
                    <dd style=" text-align:left; margin-left:16px;"><a href="">施华寇羊绒脂滋养系列</a></dd>
                    <dd class="bb">积分值：<span class="red">1200</span>积分起<br />￥：<span class="red">150.00</span></dd>
                    <dd><span class="aa"><a href="">立即兑换</a><a href="">立即购买</a></span></dd>
                </dl>
            </div>
        </div>
        <div class="clear"></div>
        <div class="four">
        	<div class="main-four-tit">
            	<span><a href="">清仓兑换</a></span>
            	<div class="miaosu"></div>
            </div>
            <div class="clear"></div>
            <div class="main-four-con">
                <dl>
                    <dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_four_pic.jpg" /></a></dt>
                    <dd><a href="">美的1.5磅大容量面包机</a></dd>
                    <dd><span class="yellow">300</span>积分</dd>
                    <dd class="cc"><a href="">立刻兑换</a></dd>
                </dl>
                <dl>
                    <dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_four_pic.jpg" /></a></dt>
                    <dd><a href="">美的1.5磅大容量面包机</a></dd>
                    <dd><span class="yellow">300</span>积分</dd>
                    <dd class="cc"><a href="">立刻兑换</a></dd>
                </dl>
                <dl>
                    <dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_four_pic.jpg" /></a></dt>
                    <dd><a href="">美的1.5磅大容量面包机</a></dd>
                    <dd><span class="yellow">300</span>积分</dd>
                    <dd class="cc"><a href="">立刻兑换</a></dd>
                </dl>
                <dl>
                    <dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_four_pic.jpg" /></a></dt>
                    <dd><a href="">美的1.5磅大容量面包机</a></dd>
                    <dd><span class="yellow">300</span>积分</dd>
                    <dd class="cc"><a href="">立刻兑换</a></dd>
                </dl>
                <dl>
                    <dt><a href=""><img src="__PUBLIC__/Home/images/shop/main_four_pic.jpg" /></a></dt>
                    <dd><a href="">美的1.5磅大容量面包机</a></dd>
                    <dd><span class="yellow">300</span>积分</dd>
                    <dd class="cc"><a href="">立刻兑换</a></dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="clear"></div>
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