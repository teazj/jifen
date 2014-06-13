<?php if (!defined('THINK_PATH')) exit();?></head>
<!--头部开始-->
<body id="">
<div id="header">
 	<!--顶部开始-->   
  <div class="h-r-top">
    <div class="w">
      <ul class="fl topleft">
        <li><a href="__APP__/Index/index" rel="nofollow">网站首页</a></li>        
        <li class="collect"><i></i><a onclick="return false">加入收藏</a></li> 
      </ul>
      <div class="fr top-menu">
        <ul>
         
          <li>欢迎来到速格积分商城！</li>
          <li class="nav">
          <?php if($Think['session']['loginuser']): ?><p><a href="" rel="nofollow"><font color="#666666">欢迎您,</font>&nbsp;<?php echo (session('loginuser')); ?><i></i></a></p>
            <ul>
              <li class="out"><i></i><a href="__APP__/User/userInfo" rel="nofollow">个人中心<i></i></a></li>
                <li class="zfb"><i></i><a href="__APP__/Order/index" rel="nofollow">我的订单</a></li>
                <li class="zfb"><i></i><a href="__APP__/User/update_password" rel="nofollow">修改密码</a></li>
                <li class="out"><i></i><a href="__APP__/User/logout" rel="nofollow" target="_self">退出登录</a></li>                
            </ul>
          </li>
          <?php else: ?>       
          	<p><a href="__APP__/User/login" rel="nofollow">会员登录</a></p>
            
          	<ul>
            	<li class="out"><i></i><a href="__APP__/User/login" rel="nofollow">会员登录<i></i></a></li>
            	<li class="qq"><i></i><a href="javascript:return false;" rel="nofollow">QQ联合登录</a></li>
                <li class="zfb"><i></i><a href="javascript:return false;" rel="nofollow">新浪微博登录</a></li>
                <li class="out"><i></i><a href="javascript:return false;" rel="nofollow" target="_blank">忘记用户名？</a></li>                
            </ul>
          
          </li>
          <li><a href="__APP__/User/register" rel="nofollow">免费注册</a><span class="separator">|</span></li><?php endif; ?>  
        
        <li><a href="__APP__/Help/index" rel="nofollow">帮助中心</a><span class="separator">|</span></li>
        <li><a href="__APP__/List/history" rel="nofollow">浏览历史</a></li>
      
        </ul>
      </div>
      <!--顶部结束-->   
     
    </div>
  </div>
  <span class="clear"></span>