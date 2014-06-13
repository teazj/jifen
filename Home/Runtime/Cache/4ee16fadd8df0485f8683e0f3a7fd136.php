<?php if (!defined('THINK_PATH')) exit();?><!--菜单开始-->      
   <div id="menu">
	<div class="w">
        <div class="menu">
        	<ul class="fl home">            	
                <li class="on"><a href="__APP__/Index/index">首页</a></li>
            </ul>
            <div class="fl allsort">
				{foreach $list as $v}
				<dl>
					<dt><a href="__APP__/List/index/tid/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?><i></i></a></dt>
					<dd>
						<ul>
							{foreach $v['_child'] as $w}
								<li><a href="__APP__/List/index/tid/<?php echo ($w["id"]); ?>"><?php echo ($w["name"]); ?></a></li>
								{foreach $v['_child'] as $w1}
									<li><a href="__APP__/List/index/tid/<?php echo ($w["id"]); ?>"><?php echo ($w1["name"]); ?></a></li>
								{/foreach}
							{/foreach}
						</ul>
					</dd>
				</dl>
				{/foreach}
				
			</div>
        </div>
     </div>
  </div>
</div>
<!--菜单结束-->