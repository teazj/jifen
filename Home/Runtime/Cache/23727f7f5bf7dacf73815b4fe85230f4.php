<?php if (!defined('THINK_PATH')) exit();?><div class="nav_vipbg">
        <div class="nav_vip">
            	<div class="nav">
                    <ul class="topnav">
                        <li><a href="__APP__/Qzindex/index">վ����ҳ</a></li>
                        <li><a href="__APP__/AlonePage/aboutUs">��������</a>
                        	<ul class="subnav">
                                <li><a href="__APP__/AlonePage/aboutUs">��˾���</a></li>
                                <li><a href="__APP__/AlonePage/wmdys">���ǵ�����</a></li>
                                <li><a href="__APP__/AlonePage/qzsgdt">�ٸ�̬</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo U('Index/RzColumn/zsbd','','');?>">֪ʶ����</a>
                        	<!-- <ul class="subnav">
                                <li><a href="">ǩ֤��Ѷ</a></li>
                                <li><a href="">����ָ��</a></li>
                            </ul> -->
                        </li>
                        <li><a href="__APP__/QzCountry/qzList">��֤��ʹ��ǩ֤</a></li>
                        <li><a href="__APP__/Rzindex/index">�ٸ���֤</a></li>
                        <li><a href="__APP__/Index/index">�����̳�</a></li>
                    </ul>
                </div>
                <div class="vip">
					<?php if($_SESSION['uname']== null): ?><a href="__APP__/Com/login" class="login" />��Ա��¼</a>
                    	<a href="__APP__/ShopReg/register" class="register" />��Աע��</a>
					<?php else: ?>
						����:<a href="__APP__/Vip/index" class="login" /><?php echo (session('loginuser')); ?></a><?php endif; ?>
                </div>
		</div>
</div>