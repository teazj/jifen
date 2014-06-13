<?php if (!defined('THINK_PATH')) exit();?><span class="clear"></span>
<div id="tire" style="z-index:9999;display:none;position:absolute;width:75%;left:0px;height:32px;top:121px;">

	<div id="tire1" style="z-index:9999;display:none;float:right;width:100%;line-height:32px;height:32px;background:white;overflow:hidden;font-size:12pt">
		<font style="float:right;">亲，逛累了吗？要不来放松放松，守护下咱的小伙伴吧！</font>
		<input name="tire" type="hidden" value="<?php echo ($smarty["session"]["click"]); ?>"/>
	</div>
</div>
    
<!--<script type="text/javascript"> var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://"); document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F20c0ecbc8e13d3cdc5b2076b3b129e71' type='text/javascript'%3E%3C/script%3E")) </script><script src="__PUBLIC__/Home/Js/h.js" type="text/javascript"></script>-->
<script>
	 var tires=20;
	$(function(){
		//开启定时器
		var tireid=setInterval(tire,2000);
	
	})
	//判断是否是5次,是则提示消息
		function tire(){
			if("<?php echo ($smarty["session"]["click"]); ?>"%tires==19){
				dotire();
				tires=tires+1;
			}
			
		}
	//执行特效
		function dotire(){
			$("#tire").css("display","block");
			$("#tire1").fadeIn(2000);
			$("#tire1").delay(3000).animate({
				width:"0%",
			},6000,function(){
				$("#tire").css("display","none");
				$("#tire1").css("display","none");
				$("#tire1").css("width","100%");
			})
		}
</script>


<span class="clear"></span>
<div class="foot-ensure">
  <ul class="b990">
    <li><span class="zheng" title="专柜正品 假一罚十"></span></li>
    <li><span class="piao" title="正规商业发票"></span></li>
    <li><span class="mian" title="满149全场包邮"></span></li>
    <li><span class="qi" title="7天无理由退换货"></span></li>
  </ul>
</div>
<!--客服-->
<div class="services">
  <div class="b990">
    <div class="foot-links fl">
      <dl>
        <dt><span>关于我们</span></dt>
        <dd><a rel="nofollow" href="javascript:return false;">公司简介</a></dd>
        <dd><a rel="nofollow" href="javascript:return false;">发展概况</a></dd>
        <dd><a rel="nofollow" href="javascript:return false;">人才招聘</a></dd>
        <dd><a href="__APP__/News/index">最新资讯</a></dd>        
      </dl>
      <dl>
        <dt><span>物流配送</span></dt>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/1">配送方式</a></dd>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/18">发货时效</a></dd>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/21">运费政策</a></dd>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/22">签收须知</a></dd>        
      </dl>
      <dl>
        <dt><span>售后服务</span></dt>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/25">退换货政策</a></dd>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/26">退换货流程</a></dd>
      </dl>
      <dl>
        <dt><span>常用链接</span></dt>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/23">支付方式</a></dd>
        <dd><a rel="nofollow" href="__APP__/Help/details/id/24">无法支付？</a></dd>
        <dd><a rel="nofollow" href="__APP__/Service/index">常见问题</a></dd>
        <dd><a rel="nofollow" href="javascript:return false;">联系我们</a></dd>
      </dl>
    </div>
    <div class="foot-gam fl">
      <div class="foot-gam-title">
        <p>关注我们的微博微信</p>
      </div>
      <div class="foot-gam-info">
        <div class="foot-gam-ewm fl"></div>
        <div class="foot-gam-wb fl"> <a href="javascript:return false;" class="sina" rel="nofollow" ></a><a href="javascript:return false;" class="qq" rel="nofollow" ></a> </div>
      </div>
    </div>
    <div class="foot-ser fl">
      <div class="foot-ser-phone">免长途费，周一至周六9:00-23:00</div>
      <div class="foot-ser-online"><a href="javascript:return false;" rel="nofollow"></a></div>
    </div>
  </div>
</div>



<span class="clear"></span>
<div class="footer b990">
<div class="copyright">Copyright 2009-2013 Outlets365. Ltd All Right Reserved <a href="http://www.miibeian.gov.cn/" target="_blank" class="black" rel="nofollow">沪ICP备09018450号</a>

<!--<script src="__PUBLIC__/Home/Images/Users/stat.php" language="JavaScript"></script><script src="__PUBLIC__/Home/Images/Users/core.php" charset="utf-8" type="text/javascript"></script><a href="" target="_blank" title="站长统计">站长统计</a>-->
</div>  


  <div class="authenticate">
   <script language="javascript" type="text/javascript"> 　  
　  document.write("<a href=\"http://www.ectrustprc.org.cn/certificate.id/certificateb.php?id=20062957\" target=\"_blank\" rel=\"nofollow\" class=\"cxdw\"></a>");　
　　document.write("<a href=\"http://huodong.ebrun.com/2010b2c/chatrs.php\" target=\"_blank\"  rel=\"nofollow\" class=\"cxpp\"></a>");　
　　document.write("<a href=\"http://www.itrust.org.cn/yz/pjwx.asp?wm=1557457470\" target=\"_blank\"  rel=\"nofollow\" class=\"xyqy\"></a>");　　　
　　document.write("<a href=\"http://www.sgs.gov.cn/lz/etpsInfo.do?method=index\" target=\"_blank\"  rel=\"nofollow\" class=\"ga\"></a>");　
　　</script>
  </div>
  
</div>







<!--<script type="text/javascript">
  (function(i,s,o,g,r,a,m){ i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//','ga');

  ga('create', 'UA-45002187-1', 'outlets365.com');
  ga('send', 'pageview');

</script>-->

</body></html>