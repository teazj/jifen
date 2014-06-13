<?php if (!defined('THINK_PATH')) exit();?><!--logo开始-->   
   <div class="w header">
        <div id="logo"><a href="__APP__/Index/index" title="速格积分商城"></a></div>
        <div id="search">
		 
            <div class="s-form">
				<form name="search" method="post" action="__APP__/List/search">
				<input id="keyid" name="keyword" class="ptext" {if $keyword} value="<?php echo ($keyword); ?>" {else} value="" {/if} onblur="if (this.value==''){ this.value='商品搜索';}" onfocus="if (this.value=='商品搜索'){ this.value='';}$('#longtexiao').slideDown(2000);" autocomplete="off" id="keyword"  type="text">
				<input name="tid" type="hidden" value="<?php echo ($tid); ?>"/>
				<input name="input" class="pbtn" value="搜索" onfocus="this.blur()" type="submit">                       
				</form>
			</div>
          </div>
		 
        <div id="shopcart">
		<?php if($Think.session.loginuser): ?><a href="__APP__/Cart/index">
			<i></i>购物车<span class="s-num"><?php if($Think['session']['cartnum']): echo (session('cartnum')); ?> <?php else: ?> 0<?php endif; ?></span>件</a>
		<?php else: ?>
			<a href="__APP__/User/login" rel="nofollow"><i></i>登录后使用购物车</a><?php endif; ?>
		</div>
   </div>
   <!--logo结束-->