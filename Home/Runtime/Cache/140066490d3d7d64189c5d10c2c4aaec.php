<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                        <li><a href="<?php echo U('Index/RzColumn/zsbd','','');?>">知识宝鼎</a>
                        	<!-- <ul class="subnav">
                                <li><a href="">签证资讯</a></li>
                                <li><a href="">旅行指南</a></li>
                            </ul> -->
                        </li>
                        <li><a href="__APP__/QzCountry/qzList">单证与使馆签证</a></li>
                        <li><a href="__APP__/Rzindex/index">速格认证</a></li>
                        <li><a href="<?php echo U('Index/Index/index');?>">积分商城</a></li>
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
		
        <div class="vise_ban">
        	<div class="vise">
            	<div class="vise_t">
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
                                	<!--<dt>国家或地区：</dt>-->
									<div class="visa_gj">
                <div class="visa_gj_nr">
                    <em>国家或地区</em>
                    <input name="Visa_countryInput" style="width:160px; margin:20px 0px;" id="Visa_countryInput" value="请输入国家名或地区名" type="text" title="请输入国家名或地区名" onblur="this.value==&#39;&#39;?this.value=this.title:null" onfocus="this.value==this.title?this.value=&#39;&#39;:null" onclick="javascript:void(0)" class="oddput_txt Gicon_x13  gico_a1_17 ac_input" autocomplete="off">
                </div>
                <!--弹出层-->
                <div class="BC_layer" id="layer01" style="display: none; ">
                    <div class="layer_frame">
                        <div class="theme_02">
                            <div class="city_hd">
                                <span class="city_title"></span><a class="city_close" href="javascript:;"></a>
                            </div>
                            <div class="layer_content">
                                <div class="city_content">
                                    <ul class="layer_filter">
                                        <li class="layer_current"><a href="javascript:;" id="A1" onclick="javascript:setTab(1,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            热门</a></li>
                                        <li><a href="javascript:;" id="tab_2" onclick="javascript:setTab(2,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            ABCD</a></li>
                                        <li><a href="javascript:;" id="tab_3" onclick="javascript:setTab(3,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            EFGHJ</a></li>
                                        <li><a href="javascript:;" id="tab_4" onclick="javascript:setTab(4,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            KLM</a></li>
                                        <li><a href="javascript:;" id="tab_5" onclick="javascript:setTab(5,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            NPQRSTW</a></li>
                                        <li><a href="javascript:;" id="tab_6" onclick="javascript:setTab(6,6,&#39;tab_&#39;,&#39;divCity_Tab&#39;,&#39;hover&#39;);">
                                            XYZ</a></li>
                                    </ul>
                                    <div class="clear">
                                    </div>
                                    <div class="city_main">
                                        
                                                <ul class="city_box layer_on" id="divCity_Tab1" style="">
                                                    
                                                            <li><a id="1|223|0|英国|yingguo" onclick="javascript:hotClick(this);">
                                                                英国</a></li>
                                                        
                                                            <li><a id="1|133|0|美国|meiguo" onclick="javascript:hotClick(this);">
                                                                美国</a></li>
                                                        
                                                            <li><a id="1|93|0|加拿大|jianada" onclick="javascript:hotClick(this);">
                                                                加拿大</a></li>
                                                        
                                                            <li><a id="1|58|0|法国|faguo" onclick="javascript:hotClick(this);">
                                                                法国</a></li>
                                                        
                                                            <li><a id="1|20|0|澳大利亚|aodaliya" onclick="javascript:hotClick(this);">
                                                                澳大利亚</a></li>
                                                        
                                                            <li><a id="1|50|0|德国|deguo" onclick="javascript:hotClick(this);">
                                                                德国</a></li>
                                                        
                                                            <li><a id="1|83|0|韩国|hanguo" onclick="javascript:hotClick(this);">
                                                                韩国</a></li>
                                                        
                                                            <li><a id="1|159|0|日本|riben" onclick="javascript:hotClick(this);">
                                                                日本</a></li>
                                                        
                                                            <li><a id="1|188|0|泰国|taiguo" onclick="javascript:hotClick(this);">
                                                                泰国</a></li>
                                                        
                                                            <li><a id="1|211|0|新西兰|xinxilan" onclick="javascript:hotClick(this);">
                                                                新西兰</a></li>
                                                        
                                                            <li><a id="1|220|0|意大利|yidali" onclick="javascript:hotClick(this);">
                                                                意大利</a></li>
                                                        
                                                            <li><a id="1|124|0|马来西亚|malaixiya" onclick="javascript:hotClick(this);">
                                                                马来西亚</a></li>
                                                        
                                                            <li><a id="1|84|0|荷兰|helan" onclick="javascript:hotClick(this);">
                                                                荷兰</a></li>
                                                        
                                                            <li><a id="1|64|0|菲律宾|feilvbin" onclick="javascript:hotClick(this);">
                                                                菲律宾</a></li>
                                                        
                                                            <li><a id="1|49|0|丹麦|danmai" onclick="javascript:hotClick(this);">
                                                                丹麦</a></li>
                                                        
                                                            <li><a id="1|161|0|瑞士|ruishi" onclick="javascript:hotClick(this);">
                                                                瑞士</a></li>
                                                        
                                                            <li><a id="1|207|0|西班牙|xibanya" onclick="javascript:hotClick(this);">
                                                                西班牙</a></li>
                                                        
                                                            <li><a id="1|221|0|印度|yindu" onclick="javascript:hotClick(this);">
                                                                印度</a></li>
                                                        
                                                            <li><a id="1|18|0|奥地利|aodili" onclick="javascript:hotClick(this);">
                                                                奥地利</a></li>
                                                        
                                                            <li><a id="1|96|0|柬埔寨|jianpuzhai" onclick="javascript:hotClick(this);">
                                                                柬埔寨</a></li>
                                                        
                                                            <li><a id="1|150|0|尼泊尔|niboer" onclick="javascript:hotClick(this);">
                                                                尼泊尔</a></li>
                                                        
                                                            <li><a id="1|160|0|瑞典|ruidian" onclick="javascript:hotClick(this);">
                                                                瑞典</a></li>
                                                        
                                                            <li><a id="1|209|0|新加坡|xinjiapo" onclick="javascript:hotClick(this);">
                                                                新加坡</a></li>
                                                        
                                                            <li><a id="1|222|0|印尼|yinni" onclick="javascript:hotClick(this);">
                                                                印尼</a></li>
                                                        
                                                            <li><a id="1|226|0|越南|yuenan" onclick="javascript:hotClick(this);">
                                                                越南</a></li>
                                                        
                                                            <li><a id="1|35|0|比利时|bilishi" onclick="javascript:hotClick(this);">
                                                                比利时</a></li>
                                                        
                                                            <li><a id="1|12|0|爱尔兰|aierlan" onclick="javascript:hotClick(this);">
                                                                爱尔兰</a></li>
                                                        
                                                </ul>
                                            
                                                <ul class="city_box" id="divCity_Tab2" style="display: none; ">
                                                    
                                                            <li><a id="1|4|0|阿根廷|agenting" onclick="javascript:hotClick(this);">
                                                                阿根廷</a></li>
                                                        
                                                            <li><a id="1|5|0|阿联酋|alianqiu" onclick="javascript:hotClick(this);">
                                                                阿联酋</a></li>
                                                        
                                                            <li><a id="1|10|0|埃及|aiji" onclick="javascript:hotClick(this);">
                                                                埃及</a></li>
                                                        
                                                            <li><a id="1|12|0|爱尔兰|aierlan" onclick="javascript:hotClick(this);">
                                                                爱尔兰</a></li>
                                                        
                                                            <li><a id="1|18|0|奥地利|aodili" onclick="javascript:hotClick(this);">
                                                                奥地利</a></li>
                                                        
                                                            <li><a id="1|20|0|澳大利亚|aodaliya" onclick="javascript:hotClick(this);">
                                                                澳大利亚</a></li>
                                                        
                                                            <li><a id="1|29|0|巴西|baxi" onclick="javascript:hotClick(this);">
                                                                巴西</a></li>
                                                        
                                                            <li><a id="1|32|0|保加利亚|baojialiya" onclick="javascript:hotClick(this);">
                                                                保加利亚</a></li>
                                                        
                                                            <li><a id="1|35|0|比利时|bilishi" onclick="javascript:hotClick(this);">
                                                                比利时</a></li>
                                                        
                                                            <li><a id="1|38|0|波兰|bolan" onclick="javascript:hotClick(this);">
                                                                波兰</a></li>
                                                        
                                                            <li><a id="1|49|0|丹麦|danmai" onclick="javascript:hotClick(this);">
                                                                丹麦</a></li>
                                                        
                                                            <li><a id="1|50|0|德国|deguo" onclick="javascript:hotClick(this);">
                                                                德国</a></li>
                                                        
                                                </ul>
                                            
                                                <ul class="city_box" id="divCity_Tab3" style="display: none; ">
                                                    
                                                            <li><a id="1|55|0|俄罗斯|eluosi" onclick="javascript:hotClick(this);">
                                                                俄罗斯</a></li>
                                                        
                                                            <li><a id="1|58|0|法国|faguo" onclick="javascript:hotClick(this);">
                                                                法国</a></li>
                                                        
                                                            <li><a id="1|64|0|菲律宾|feilvbin" onclick="javascript:hotClick(this);">
                                                                菲律宾</a></li>
                                                        
                                                            <li><a id="1|66|0|芬兰|fenlan" onclick="javascript:hotClick(this);">
                                                                芬兰</a></li>
                                                        
                                                            <li><a id="1|77|0|古巴|guba" onclick="javascript:hotClick(this);">
                                                                古巴</a></li>
                                                        
                                                            <li><a id="1|83|0|韩国|hanguo" onclick="javascript:hotClick(this);">
                                                                韩国</a></li>
                                                        
                                                            <li><a id="1|84|0|荷兰|helan" onclick="javascript:hotClick(this);">
                                                                荷兰</a></li>
                                                        
                                                            <li><a id="1|90|0|吉尔吉斯斯坦|jierjisisitan" onclick="javascript:hotClick(this);">
                                                                吉尔吉斯斯坦</a></li>
                                                        
                                                            <li><a id="1|93|0|加拿大|jianada" onclick="javascript:hotClick(this);">
                                                                加拿大</a></li>
                                                        
                                                            <li><a id="1|96|0|柬埔寨|jianpuzhai" onclick="javascript:hotClick(this);">
                                                                柬埔寨</a></li>
                                                        
                                                            <li><a id="1|97|0|捷克|jieke" onclick="javascript:hotClick(this);">
                                                                捷克</a></li>
                                                        
                                                </ul>
                                            
                                                <ul class="city_box" id="divCity_Tab4" style="display: none; ">
                                                    
                                                            <li><a id="1|105|0|科威特|keweite" onclick="javascript:hotClick(this);">
                                                                科威特</a></li>
                                                        
                                                            <li><a id="1|111|0|老挝|laowo" onclick="javascript:hotClick(this);">
                                                                老挝</a></li>
                                                        
                                                            <li><a id="1|124|0|马来西亚|malaixiya" onclick="javascript:hotClick(this);">
                                                                马来西亚</a></li>
                                                        
                                                            <li><a id="1|133|0|美国|meiguo" onclick="javascript:hotClick(this);">
                                                                美国</a></li>
                                                        
                                                            <li><a id="1|137|0|孟加拉国|mengjialaguo" onclick="javascript:hotClick(this);">
                                                                孟加拉国</a></li>
                                                        
                                                            <li><a id="1|138|0|秘鲁|milu" onclick="javascript:hotClick(this);">
                                                                秘鲁</a></li>
                                                        
                                                            <li><a id="1|140|0|缅甸|miandian" onclick="javascript:hotClick(this);">
                                                                缅甸</a></li>
                                                        
                                                            <li><a id="1|144|0|莫桑比克|mosangbike" onclick="javascript:hotClick(this);">
                                                                莫桑比克</a></li>
                                                        
                                                            <li><a id="1|145|0|墨西哥|moxige" onclick="javascript:hotClick(this);">
                                                                墨西哥</a></li>
                                                        
                                                </ul>
                                            
                                                <ul class="city_box" id="divCity_Tab5" style="display: none; ">
                                                    
                                                            <li><a id="1|147|0|南非|nanfei" onclick="javascript:hotClick(this);">
                                                                南非</a></li>
                                                        
                                                            <li><a id="1|150|0|尼泊尔|niboer" onclick="javascript:hotClick(this);">
                                                                尼泊尔</a></li>
                                                        
                                                            <li><a id="1|155|0|挪威|nuewei" onclick="javascript:hotClick(this);">
                                                                挪威</a></li>
                                                        
                                                            <li><a id="1|158|0|葡萄牙|putaoya" onclick="javascript:hotClick(this);">
                                                                葡萄牙</a></li>
                                                        
                                                            <li><a id="1|159|0|日本|riben" onclick="javascript:hotClick(this);">
                                                                日本</a></li>
                                                        
                                                            <li><a id="1|160|0|瑞典|ruidian" onclick="javascript:hotClick(this);">
                                                                瑞典</a></li>
                                                        
                                                            <li><a id="1|161|0|瑞士|ruishi" onclick="javascript:hotClick(this);">
                                                                瑞士</a></li>
                                                        
                                                            <li><a id="1|179|0|斯里兰卡|sililanka" onclick="javascript:hotClick(this);">
                                                                斯里兰卡</a></li>
                                                        
                                                            <li><a id="1|188|0|泰国|taiguo" onclick="javascript:hotClick(this);">
                                                                泰国</a></li>
                                                        
                                                            <li><a id="1|204|0|乌克兰|wukelan" onclick="javascript:hotClick(this);">
                                                                乌克兰</a></li>
                                                        
                                                            <li><a id="1|206|0|乌兹别克斯坦|wuzibiekesitan" onclick="javascript:hotClick(this);">
                                                                乌兹别克斯坦</a></li>
                                                        
                                                </ul>
                                            
                                                <ul class="city_box" id="divCity_Tab6" style="display: none; ">
                                                    
                                                            <li><a id="1|207|0|西班牙|xibanya" onclick="javascript:hotClick(this);">
                                                                西班牙</a></li>
                                                        
                                                            <li><a id="1|208|0|希腊|xila" onclick="javascript:hotClick(this);">
                                                                希腊</a></li>
                                                        
                                                            <li><a id="1|209|0|新加坡|xinjiapo" onclick="javascript:hotClick(this);">
                                                                新加坡</a></li>
                                                        
                                                            <li><a id="1|211|0|新西兰|xinxilan" onclick="javascript:hotClick(this);">
                                                                新西兰</a></li>
                                                        
                                                            <li><a id="1|212|0|匈牙利|xiongyali" onclick="javascript:hotClick(this);">
                                                                匈牙利</a></li>
                                                        
                                                            <li><a id="1|220|0|意大利|yidali" onclick="javascript:hotClick(this);">
                                                                意大利</a></li>
                                                        
                                                            <li><a id="1|221|0|印度|yindu" onclick="javascript:hotClick(this);">
                                                                印度</a></li>
                                                        
                                                            <li><a id="1|222|0|印尼|yinni" onclick="javascript:hotClick(this);">
                                                                印尼</a></li>
                                                        
                                                            <li><a id="1|223|0|英国|yingguo" onclick="javascript:hotClick(this);">
                                                                英国</a></li>
                                                        
                                                            <li><a id="1|226|0|越南|yuenan" onclick="javascript:hotClick(this);">
                                                                越南</a></li>
                                                        
                                                </ul>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/弹出层-->
                
                
                
            </div>
                                   <!--  <form action="<?php echo U('Index/Vista/index');?>" method="post"> -->
										
										<dd><input type="submit"  id="btnSearch" value="查询" class="inp_cx" /></dd>
									<!-- </form> -->
                                    <dd class="country_a">
										<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/Vista/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
									</dd>
                                    <dd class="more"><a href="">更多>></a></dd>
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
                                <dl>
                                    <dd class="country_a">
										<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/Vista/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
									</dd>
                                    <dd class="more"><a href="">更多>></a></dd>
                                </dl>
                            </div>
                        </div>	
                	</div>
                </div>
                <div class="vise_tyy"></div>
                <div class="vise_d">
                	<div class="vise_b">99.8%</div>
                    <div class="vise_con"><h3>出签成功率</h3>已有<span class="yellow">1586325</span>位客户成功办理签证</div>
                </div>
            </div>
			<div class='focus_r'>
				<ul class='flash_ul'>
					<?php if(is_array($plist)): foreach($plist as $key=>$pvo): ?><li><a href='<?php echo ($pvo["url"]); ?>'><img src='__PUBLIC__/Admin/Images/Ppt/l_<?php echo ($pvo["pic"]); ?>'/></a>
						<div class='flash_mark'>
							<span><a href='<?php echo ($pvo["url"]); ?>'><?php echo ($pvo["title"]); ?></a></span>
						</div>
					</li><?php endforeach; endif; ?>	
				</ul>
				<ul class='flash_but'>
					<li style='background:#D2691E'></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
        </div>
    </div>
    <div class="main_bg">
    	<div class="main">
            <div class="liucheng">
                <ul>
                    <li class="li_1"><a href="" class="ma">选择</a><br /><a href="">提交订单</a></li>
                    <li class="fx"></li>
                    <li class="li_2"><a href="" class="ma">电话</a><br /><a href="">确定订单</a></li>
                    <li class="fx"></li>
                    <li class="li_3"><a href="" class="ma">材料</a><br /><a href="">可邮寄</a> / <a href="">门市交件</a></li>
                    <li class="fx" style=" margin-left:-40px;"></li>
                    <li class="li_4"><a href="" class="ma">审核</a><br /><a href="">接受材料</a></li>
                    <li class="fx"></li>
                    <li class="li_5"><a href="" class="ma">递交</a><br /><a href="">同城送签</a></li>
                    <li class="fx"></li>
                    <li class="li_6"><a href="" class="ma">出签</a><br /><a href="">寄回材料</a></li>
                </ul>
            </div>
            <div class="liuc_yy"></div>
            <div class="main_one">
                <div class="mone_left">
                	<iframe width=280 height=181 frameborder=0 scrolling="no" src="http://jifen.gouaixin.com/test/qzl_1.html">
					</iframe>
                    <div class="question">
                    	<dl>
                        	<dt><a href=""><?php echo ($mlist1[0]['tname']); ?></a></dt>
							<?php if(is_array($mlist1)): $i = 0; $__LIST__ = $mlist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>">> <?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                            <dd div class="more"><a href="">>>更多</a></dd>
                        </dl>
                    </div>
                </div>
                <div class="mone_right">
                    <div class="moner_tit"><a href="">热点签证</a>根据送签城市不同，价格略有浮动</div>
                    <div class="moner_con">
                    	<ul style=" margin-top:20px;">
							<?php if(is_array($vlist)): $i = 0; $__LIST__ = $vlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<span style="float:left; margin-right:10px;"><a href="<?php echo U('Index/Details/index',array('id'=>$v['id']));?>"><img src="__PUBLIC__/Admin/Images/Vista/s_<?php echo ($v["logo"]); ?>" /></a></span>
                            	<span style=" float:left;"><p><a href="<?php echo U('Index/Details/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); echo ($v["catename"]); ?></a></p><p>￥ <span class="red"><?php echo ($v["loprice"]); ?></span> 起</p></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            
            <!-- 主体部分选项卡滑动门js  -->
            <script type="text/javascript">
			function nTabs(thisObj,Num){
			if(thisObj.className == "active")return;
			var tabObj = thisObj.parentNode.id;
			var tabList = document.getElementById(tabObj).getElementsByTagName("li");
			for(i=0; i <tabList.length; i++)
			{
			  if (i == Num)
			  {
			   thisObj.className = "active"; 
				  document.getElementById(tabObj+"_Content"+i).style.display = "block";
			  }else{
			   tabList[i].className = "normal"; 
			   document.getElementById(tabObj+"_Content"+i).style.display = "none";
			  }
			} 
			}
			</script> 
            
            <div class="main_two">
            	<div class="policy">
                	<dl>
                    	<dt><a href=""><?php echo ($mlist4[0]['tname']); ?></a></dt>
							<?php if(is_array($mlist4)): $i = 0; $__LIST__ = $mlist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>">> <?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        <dd div class="more"><a href="">>>更多</a></dd>
                	</dl>
                </div>
                <div class="mtwo_right">
                	<div class="nTab">
                        <div class="TabTitle">
                            <ul id="myTab">
                                <li class="active" onmouseover="nTabs(this,0);"><a href=""><?php echo ($mlist3[0]['tname']); ?></a></li>
                                <li class="normal" onmouseover="nTabs(this,1);"><a href=""><?php echo ($mlist2[0]['tname']); ?></a></li> 			      
                            </ul>
                        </div>
                        <div class="TabContent">
                            <div id="myTab_Content0">
                                <dl>
									<?php if(is_array($mlist3)): $i = 0; $__LIST__ = $mlist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>">> <?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                               </dl>
                               	
                            </div>
                            <div id="myTab_Content1" class="none">
                            	<dl>
									<?php if(is_array($mlist2)): $i = 0; $__LIST__ = $mlist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Index/Details/detail',array('id'=>$v['id']));?>">> <?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                               </dl>
                            </div>
                        </div>	
                	</div>
                </div>
            </div>
    	</div>
    </div>
    <div class="clear"></div>
    <div class="footer">
    	<div class="down_navbg">
        	<div class="down_nav">
                <dl>
                    <dt><a href="" class="chanpin">产品更全面</a></dt>
                    <dd>土耳其出口商务登记表认证 co产地证<br />使馆公证认证书-外交部认证 公证书-<br />使馆认证 健康证使馆认证</dd>
                </dl>
                <dl>
                    <dt><a href="" class="fuwu">服务更全面</a></dt>
                    <dd>土耳其出口商务登记表认证 co产地证<br />使馆公证认证书-外交部认证 公证书-<br />使馆认证 健康证使馆认证</dd>
                </dl>
                <dl>
                    <dt><a href="" class="jiage">价格更全面</a></dt>
                    <dd>土耳其出口商务登记表认证 co产地证<br />使馆公证认证书-外交部认证 公证书-<br />使馆认证 健康证使馆认证</dd>
                </dl>
                <dl>
                    <dt><a href="" class="fanwei">范围更全面</a></dt>
                    <dd>土耳其出口商务登记表认证 co产地证<br />使馆公证认证书-外交部认证 公证书-<br />使馆认证 健康证使馆认证</dd>
                </dl>
            </div>
        </div>
        <div class="footer"></div>
        <div class="footer_bg">
        	<div class="footer_bg">
        	<div class="link">友情连接：
				<?php if(is_array($flink)): $i = 0; $__LIST__ = $flink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="copyright">
            	<p>CopyRight @ 2011-2012 义乌市速格报俭代理有限公司 版权所有　地 址：浙江 义乌市城北路258号福田商务公寓313（商检局对面）<br />
                	电 话：86 0579 85365501 - 86 0579 85591661　　　　　技术支持：武汉尚科在线网络技术有限公司
                </p>
            </div>
</div>

        </div>
    </div>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/Home/js/byecity.min.js"></script>
	<script language="javascript" type="text/javascript" src="__PUBLIC__/Home/js/index.js"></script>
</body>
</html>