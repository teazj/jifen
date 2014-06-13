<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购买页面</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzny.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/qzty.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/dh.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/top.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/date.js"></script>
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
			//出行时间
			var c = new Calendar("c");
				document.write(c);
			</script>
    <div class="M_xq">
    	<div class="Mcaut_tit"><a href="">首页</a> > <a href="">认证</a> > <a href=""><?php echo ($vo["name"]); echo ($vo["catename"]); ?></a> > <a href=""><?php echo ($vo["name"]); echo ($vo["catename"]); echo ($vo["desc"]); ?></a></div>
        <div class="gm_right">
        	<div class="Mxq_r1">
            	<div class="Mxqr1_tit"><a href="" class="Mr1_a1"><?php echo ($vo["name"]); echo ($vo["catename"]); echo ($vo["desc"]); ?></a><a href="" class="Mr1_a2">【产品编号】：<?php echo ($vo["protectid"]); ?></a></div>
            	<div class="Mxqr1_con">
                	<div class="r1_left">
                    	<div class="guoqi">
                        	<img src="__PUBLIC__/Admin/Images/Rzvista/m_<?php echo ($vo["logo"]); ?>"/>
                            <div class="guoqi_yy"></div>
                        </div>
                        <div class="xq_xx">
                        	<ul>
								<li>速格价格：¥<span class="red_18"><?php echo ($a[0]); ?></span></li>
							<?php if(is_array($a)): $k = 0; $__LIST__ = array_slice($a,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k % 2 );++$k;?><li style="display:none">速格价格：¥<span class="red_18"><?php echo ($vo1); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
								<p>累计销量：<?php echo ($vo["buys"]); ?></p>
                                <p>用户评价：<img src="__PUBLIC__/Home/images/qzimages/xq_xing.png" /><span class="blue2">（累计30条评价）</span></p>
                        </div>
                    </div>
                    <div class="r1_right">
                    	<ul>
                        	<li><span class="f_hw">办理时间：</span>预计至少<?php echo ($vo["workday"]); ?>个工作日</li>
                            <li><span class="rr_f"><span class="f_hw">是否面试：</span><?php if($vo['isface'] == 0): ?>不需要<?php else: ?>需要<?php endif; ?></span><span class="rr_f"><span class="f_hw">有效时间：</span><?php echo ($vo["vday"]); ?>天</span><span class="rr_f"><span class="f_hw">最多停留：</span><?php echo ($vo["staday"]); ?></span><span class="rr_f"><span class="f_hw">入境次数：</span>1</li>
                        	<li><span class="f_hw">受理范围：</span><?php echo ($vo["mian"]); ?></li>
                            <li><span class="f_hw">产品名称：</span><?php if(is_array($b)): $k = 0; $__LIST__ = $b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k % 2 );++$k;?><span class="af"><a onclick="price(<?php echo ($k-1); ?>)"><?php echo ($vo2); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?></li>
                            <form action="<?php echo U('Index/Rzorder/index');?>" method="post">
								<input type="hidden" name="logo" value="<?php echo ($vo["logo"]); ?>">
								<input type="hidden" name="price" id="price" value="">
								<input type="hidden" name="sid" value="<?php echo ($_GET['id']); ?>">
								<input type="hidden" name="vname" id="vname" value="">
								<input type="hidden" name="tname" value="<?php echo ($vo["name"]); echo ($vo["catename"]); echo ($vo["desc"]); ?>">
								<input type="hidden" name="place" id="place" value="">
								<input type="id" name="tname" value="<?php echo ($vo["name"]); echo ($vo["catename"]); echo ($vo["desc"]); ?>">
								<li><span class="f_hw">选择人数：</span>
									<input type="button" value="-" class="jian" />
									<input name="num" type="text" value="1" class="shuzi" />
									<input type="button" value="+" class="jia" />
								<span class="f_hw">预计出行时间：</span><input name="gtime" value="" class="xq_date" onfocus="c.showMoreDay = false;c.show(this,'2014-05-08');" readonly="readonly" />
								<span class="f_hw">办理地点：</span>
									<select class="xq_se1">
										<?php if(is_array($place)): $i = 0; $__LIST__ = $place;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["pid"]); ?>"><?php echo ($v["place"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</li>
								<li class="ri_inp1bg"><input type="submit" value="立即办理" class="r1_inp1 banli" /></li>
							</form>
                        </ul>
                    </div>
                </div>
				<script>
					var num=parseInt($('.shuzi').val());
					$(".jian").click(function(){
						if(num<2){
							num=1;
						}else{
							num=num*1-1;
							$('.shuzi').val(num);
						}
					})
					
					$('.jia').click(function(){
							num=num*1+1;
							$('.shuzi').val(num);
					})
					
					//点击产品名称价格变化
					function price(k){
						$('.af').click(function(){
							$(".af").children('a').not(k).css('background',"url('__PUBLIC__/Home/images/qzimages/xq_xxabg1.jpg')");
							$(this).children("a").css('background',"url('__PUBLIC__/Home/images/qzimages/xq_xxabg2.jpg')");
							$(".xq_xx ul li").not(k).hide();
							$(".xq_xx ul li").eq(k).show();
							$('#price').val($(".xq_xx ul li").eq(k).children('span').text());
							$('#vname').val($(".af").eq(k).children('a').text());
						})
					}
					
					//办理地点选择对应产品和价格
					$('.xq_se1').change(function(){
						var url="<?php echo U('Index/Rzdetails/info');?>";
						var pid=$(this).children('option:selected').val(); 
						var id=<?php echo ($_GET['id']); ?>;
						//隐藏的办理地点名称
						$("#place").val($(this).children('option:selected').text());
						$.get(url,{"pid":pid,"id":id},function(datas){
								var data=eval("("+datas+")");
								var item;
								var na=data.vname.split('|');
								var pr=data.price.split('|');
								//产品名称
								for(var i=0;i<na.length;i++){
								$('.r1_right .af').eq(i).html(" <a onclick='price("+i+")'>"+na[i]+"</a>");
								}
								//产品价格
								for(var i=0;i<pr.length;i++){
								$('.xq_xx ul li span').eq(i).text(pr[i]);
								}
							
							})
						})
				</script>
            </div>
            <div class="Mxq_r2">
            	<ul>
                	<li><span class="r2_a1">选择认证</span></li>
                    <li class="li_jg"></li>
                    <li><span class="r2_a2">确定订单</span></li>
                    <li class="li_jg"></li>
                    <li><span class="r2_a3">支付费用</span></li>
                    <li class="li_jg"></li>
                    <li><span class="r2_a4">递交资料</span></li>
                    <li class="li_jg"></li>
                    <li><span class="r2_a5">认证办理</span></li>
                    <li class="li_jg"></li>
                    <li><span class="r2_a6">认证结果已出</span></li>
                </ul>
                <div class="clear"></div>
            </div>
            
            <!--  Mxq_r3的滑动门选项卡  -->
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
            
            <div class="Mxq_r3">
            	<div class="nTab">
                    <div class="TabTitle">
                        <ul id="myTab">
                            <li class="active" onmouseover="nTabs(this,0);">所需材料</li>
                            <li class="normal" onmouseover="nTabs(this,1);">特别提示</li>
                            <li class="normal" onmouseover="nTabs(this,2);">客户评价</li>
                            <li class="normal" onmouseover="nTabs(this,3);">预定须知</li>
                        </ul>
                    </div>
                    <div class="TabContent">
                        <div id="myTab_Content0">
                        	<div class="tab_c1">
                           		<dl>
                                	<?php echo ($vo["need"]); ?>
                                </dl>
                           </div>
                        </div>
                        <div id="myTab_Content1" class="none">
                        	<div class="tab_c2">
                           		<div class="tabc2_tit">特别提示</div>
								<?php echo ($vo["note"]); ?>
                           </div>
                        </div>
                        <div id="myTab_Content2" class="none">
                        	<div class="tab_c3">
                           		<div class="tabc3_tit">客户评价</div>
                                <dl>
                                	<dd>
                                    	<span class="pingjia"><p>suyuecheng</p><p>还不错</p></span>
                                        <span class="data"><p>2013-09-06</p></span>
                                        <div class="clear"></div>
                                    </dd>
                                    <dd>
                                    	<span class="pingjia"><p>suyuecheng</p><p>还不错</p></span>
                                        <span class="data"><p>2013-09-06</p></span>
                                        <div class="clear"></div>
                                    </dd>
                                    <dd>
                                    	<span class="pingjia"><p>suyuecheng</p><p>还不错</p></span>
                                        <span class="data"><p>2013-09-06</p></span>
                                        <div class="clear"></div>
                                    </dd>
                                    <dd>
                                    	<span class="pingjia"><p>suyuecheng</p><p>还不错</p></span>
                                        <span class="data"><p>2013-09-06</p></span>
                                        <div class="clear"></div>
                                    </dd>
                                </dl>
                                <div class="clear"></div>
                           </div>
                           <div class="tab_c4">
                               <div class="inquiry_down">
                                    <ul>
                                        <li><a href="" class="end">第3页总共10页</a></li>
                                        <li><a href=""><<</a></li>
                                        <li><a href="">1</a></li>
                                        <li><a href="">2</a></li>
                                        <li><a href="">3</a></li>
                                        <li><a href="">4</a></li>
                                        <li><a href="">5</a></li>
                                        <li><a href="">...</a></li>
                                        <li><a href="" class="end">尾页</a></li>
                                    </ul>
                                </div>
                           </div>
                        </div>
                        <div id="myTab_Content3" class="none">
                        	<div class="tab_c5">
                           		<div class="tabc3_tit">预定须知</div>
                                <div class="tabc5_con">
									<?php echo ($vo["note"]); ?>
								</div>
                           </div>
                        </div>
                    </div>	
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