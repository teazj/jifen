<?php if (!defined('THINK_PATH')) exit();?>
   			<!-- banner的js -->   
        		<script type="text/javascript">
				$(function(){
					
				$("#Mget_img").kinMaxShow({
						height:273,
						button:{
								showIndex:false,
								normal:{background:'url(__PUBLIC__/images/shop/Mget_ban_button.png) no-repeat -14px 0',right:'16px',bottom:'6px',opacity:0.8,border:"0",color:"#CCCCCC",marginRight:'6px'},
								focus:{background:'url(__PUBLIC__/images/shop/Mget_ban_button.png) no-repeat 0 0',border:'0',color:"#000000"}
							}			
					});
				
				
				});
				
				</script>
                
	<div class="M_get">
        <div class="ban_news">
            <div id="Mget_ban">
                <div id="Mget_img">
                    <div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div>
                    <div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div>
                    <div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div>
                    <div><a href=""><img src="__PUBLIC__/images/shop/Mget_ban.jpg" /></a></div>		
                </div>
            </div>
            <div class="Mget_news">
                <dl>
                    <dt><a href="">获取积分规则</a></dt>
                    <dd><a href="">积分获取规则积分获取规则</a></dd>
                    <dd><a href="">积分获取规则</a></dd>
                    <dd><a href="">积分获取规则</a></dd>
                    <dd><a href="">积分获取规则</a></dd>
                </dl>
            </div>
            <div class="clear"></div>    <!--  清楚ban_news浮动  -->
        </div>
        <div class="get_jf">
            <div class="getjf_tit"><a href="">积分获取</a></div>
            <div class="getjf_con">
<script type="text/javascript">
$(function(){
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
</script>
				  
                <table cellspacing="0" cellspacing="0" border="0px none">
                <form action="<?php echo U('Index/ShopGetGift/gain','','');?>" method="post" onsubmit="return checkNum()">
                    <tr>
                        <td class="haoma">输入订单号：</td>
                        <td><input type="text" class="ddh" id="ipt_1" name="orderNumber"/><input type="button" name="" value="查看剩余积分" class="get_inp2" id="ipt_2"/>&nbsp;<span id="sp" style="font-size:14px;"></span></td>
                    </tr>
                    <tr style="text-align:left;">
                        <td class="haoma">输入积分数目：</td>
                        <td><input type="text" name="num"  class="sxjf" /> 分 *(最少两位数,例如20)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2" class="inp_jf">
                          <input type="submit" name="sub_1" value="立即获取" class="abc" />
                            </form>
                          <!--   <div class="showbox">
                                <div class="suge"><img src="__PUBLIC__/images/shop/tc_logo.png""><a class="close" href="#"></a></div>
                                <div class="mainlist">
                                    <p>恭喜您：成功兑换积分</p>
                                    <input type="button" name="" value="点击查看我的积分" class="tc_inp1" />
                                </div>
                            </div>	
                            <div id="zhezhao"></div>
                         --></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clear"></div>       <!--  清楚M_get浮动  -->
    </div>