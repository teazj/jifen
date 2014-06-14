<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>积分商城首页</title><link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/index.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ty.css" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/shop/ny.css" /><script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script><script type="text/javascript" src="__PUBLIC__/Home/js/function.js"></script><script type="text/javascript" src="__PUBLIC__/Home/js/new.js"></script><script type="text/javascript" src="__PUBLIC__/Home/js/ss.js"></script><script type="text/javascript" src="__PUBLIC__/Home/js/tcc.js"></script><script type="text/javascript" src="__PUBLIC__/Home/js/jquery.kinMaxShow-1.1.min.js"></script></head><body><div class="container"><div class="header"><div class="topnavbg"><div class="topnav"><div class="leftsidebar"><a href="">欢迎访问本店</a> | <a href="">返回首页</a> | <a href="">收藏本站</a></div><div class="rightsidebar"><a href=""><?php if($_SESSION['uname']== null): ?><a href="<?php echo U('Index/Com/login','','');?>">登陆
					</a> | <a href="<?php echo U('Index/ShopReg/register','','');?>">注册</a><?php else: ?>您好：<?php echo (session('uname')); ?><a href="<?php echo U('Index/ShopReg/logOut',array('act'=>'out'),'');?>">[退出]</a><?php endif; ?>                	| <a href="<?php echo U('Index/Vip/index');?>">我的账户</a> | <a href="">我的积分</a></div><div class="clear"></div></div></div><div class="header-two"><div class="logo"><a href="<?php echo U('Index/Index/index','','');?>"><img src="__PUBLIC__/Home/images/shop/logo.jpg" /></a></div><div class="search"><table><form><td><input type="text" name="" id="search_key" value="" class="search_one" /></td><td><a href=""><input type="button" name="" value="搜索" class="ss" /></a></td></form></table></div><div class="clear"></div></div><div class="navbg"><div class="nav"><ul><li class="Mnav"><a class="type_lock" href="javascript:void(0)">礼品分类</a></li><li><a href="<?php echo U('Index/index','','');?>">商城首页</a></li><li class="shuxian"></li><li><a href="<?php echo U('ShopGetGift/index');?>">积分获取</a></li><!--<?php echo U('Index/ShopGetGift/index','','');?>--><li class="shuxian"></li><li><a href="<?php echo U('Vip/index');?>">我的积分</a></li><!--<?php echo U('Index/Vip/index');?>--><li class="shuxian"></li><li><a href="">热门兑换</a></li><li class="shuxian"></li><li><a href="<?php echo U('Qzindex/index');?>">签证服务</a></li><li class="shuxian"></li><li><a href="<?php echo U('Rzindex/index');?>">认证服务</a></li></ul></div></div><!-- banner的js --><script type="text/javascript">				$(function(){
					
				$("#Mget_img").kinMaxShow({
						height:273,
						button:{
								showIndex:false,
								normal:{background:'url(__PUBLIC__/images/shop/Mget_ban_button.png) no-repeat -14px 0',right:'16px',bottom:'6px',opacity:0.8,border:"0",color:"#CCCCCC",marginRight:'6px'},
								focus:{background:'url(__PUBLIC__/images/shop/Mget_ban_button.png) no-repeat 0 0',border:'0',color:"#000000"}
							}			
					});
				
				
				});
				
				</script><div class="M_get"><div class="ban_news"><div id="Mget_ban"><div id="Mget_img"><div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div><div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div><div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div><div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div></div></div><div class="Mget_news"><dl><dt><a href="">获取积分规则</a></dt><dd><a href="">积分获取规则积分获取规则</a></dd><dd><a href="">积分获取规则</a></dd><dd><a href="">积分获取规则</a></dd><dd><a href="">积分获取规则</a></dd></dl></div><div class="clear"></div><!--  清楚ban_news浮动  --></div><div class="get_jf"><div class="getjf_tit"><a href="">积分获取</a></div><div class="getjf_con"><script type="text/javascript">$(function(){
	var url = "<?php echo U('Index/ShopGetGift/getGift','','');?>";
	var oIpt_1 = $('#ipt_1');
	var oIpt_2 = $('#ipt_2');
	var oSp = $('#sp');
	var oSub = $("input[name='sub_1']");
	oSub.attr("disabled",true);
	
	oIpt_2.click(function(){
		if(oIpt_1.val()==''){
			alert('订单号不为空.!');
			return false;
		}
		
		$.post(url,{orderCode:oIpt_1.val()},function(data){
			if(data['status']==1){
				oSp.text(data['info']);
				if(data['sign']=='eo'){
					oSub.attr("disabled",true);
					return false;
				}else{
					oSub.attr("disabled",false);
				}
			}else{
				alert(data['msg']);
			}
		},'json');
	});
});

function checkNum(){
	var oIpt_1 = $("input[name='num']");
	if(oIpt_1.val()=='' || !oIpt_1.val().match(/[1-9]{1}[0]{1}/)){
		alert('兑换积分数目不正确');
		return false;
	}
}
</script><table cellspacing="0" cellspacing="0" border="0px none"><form action="<?php echo U('Index/ShopGetGift/gain','','');?>" method="post" onsubmit="return checkNum()"><tr><td class="haoma">输入订单号：</td><td><input type="text" class="ddh" id="ipt_1" name="orderNumber"/><input type="button" name="" value="查看剩余积分" class="get_inp2" id="ipt_2"/>&nbsp;<span id="sp" style="font-size:14px;"></span></td></tr><tr style="text-align:left;"><td class="haoma">输入积分数目：</td><td><input type="text" name="num"  class="sxjf" /> 分 *(最少两位数,例如20)</td></tr><tr><td>&nbsp;</td><td colspan="2" class="inp_jf"><input type="submit" name="sub_1" value="立即获取" class="abc" /></form><!--   <div class="showbox"><div class="suge"><img src="__PUBLIC__/images/shop/tc_logo.png""><a class="close" href="#"></a></div><div class="mainlist"><p>恭喜您：成功兑换积分</p><input type="button" name="" value="点击查看我的积分" class="tc_inp1" /></div></div><div id="zhezhao"></div>                         --></td></tr></table></div></div><div class="clear"></div><!--  清楚M_get浮动  --></div><div class="footer"><div class="linkbg"><div class="footer-con"><div class="min-nav"><dl><dt class="xinshou"><h4><a href="">新手上路</a></h4></dt><dd><a href="">客户登陆</a></dd><dd><a href="">10000知道</a></dd></dl><dl><dt class="peisong"><h4><a href="">配送服务</a></h4></dt><dd><a href="">配送时限/范围</a></dd><dd><a href="">礼品签收注意事项</a></dd><dd><a href="">关于订单拆分</a></dd><dd><a href="">配送流程</a></dd></dl><dl><dt class="shouhou"><h4><a href="">售后服务</a></h4></dt><dd><a href="">配送时限/范围</a></dd><dd><a href="">礼品签收注意事项</a></dd><dd><a href="">关于订单拆分</a></dd><dd><a href="">配送流程</a></dd></dl><dl><dt class="help"><h4><a href="">帮助中心</a></h4></dt><dd><a href="">配送时限/范围</a></dd><dd><a href="">礼品签收注意事项</a></dd><dd><a href="">关于订单拆分</a></dd><dd><a href="">配送流程</a></dd></dl></div><div class="partner"><dl><dt><h4><a href="">合作伙伴</a></h4></dt><dd class="nh"><a href="">南航</a><span class="pn"><a href="">平安万里通</a></span></dd><dd class="yyt"><a href="">乐益通</a><span class="jfx"><a href="">聚分享</a></span></dd><dd class="gh"><a href="">国航</a><span class="al"><a href="">安利</a></span></dd></dl></div><div class="link"><dl><dt><h4><a href="">友情链接</a></h4></dt><dd class="lx"><a href="">翼游旅行</a></dd><dd class="jd"><a href="">尊茂酒店</a></dd><dd class="kg"><a href="">号百控股</a></dd></dl></div><div class="clear"></div></div></div><div class="copyright"><p>Copyright @ 2011-2012 义乌市速格报检代理有限公司 版权所有<br />地&nbsp;&nbsp;址：浙江义乌市城北路258号福田商务公寓313室（商检局对面）&nbsp;&nbsp;电&nbsp;&nbsp;话：86&nbsp;&nbsp;0579&nbsp;&nbsp;85365501 - 86&nbsp;&nbsp;0579&nbsp;&nbsp;85591661<br /></p></div></div></body></html>