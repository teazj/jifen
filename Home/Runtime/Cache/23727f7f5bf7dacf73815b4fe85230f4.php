<?php if (!defined('THINK_PATH')) exit();?><div class="nav_vipbg">
        <div class="nav_vip">
            	<div class="nav">
                    <ul class="topnav">
                        <li><a href="__APP__/Qzindex/index">站内首页</a></li>
                        <li><a href="__APP__/AlonePage/aboutUs">关于我们</a>
                        	<ul class="subnav">
                                <li><a href="__APP__/AlonePage/aboutUs">公司简介</a></li>
                                <li><a href="__APP__/AlonePage/wmdys">我们的优势</a></li>
                                <li><a href="__APP__/AlonePage/qzsgdt">速格动态</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo U('Index/RzColumn/zsbd','','');?>">知识宝鼎</a>
                        	<!-- <ul class="subnav">
                                <li><a href="">签证资讯</a></li>
                                <li><a href="">旅行指南</a></li>
                            </ul> -->
                        </li>
                        <li><a href="__APP__/QzCountry/qzList">单证与使馆签证</a></li>
                        <li><a href="__APP__/Rzindex/index">速格认证</a></li>
                        <li><a href="__APP__/Index/index">积分商城</a></li>
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