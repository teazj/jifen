<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
<TITLE>跳转页面</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">

<STYLE type=text/css>
INPUT {
	FONT-SIZE: 12px
}

TD {
	FONT-SIZE: 12px
}

.p2 {
	FONT-SIZE: 12px
}

.p6 {
	FONT-SIZE: 13px;
	COLOR: #1b6ad8;
	font-weight:bold;
}

A {
	COLOR: #1b6ad8;
	TEXT-DECORATION: none
}

A:hover {
	COLOR: red
}
</STYLE>

</HEAD>
<BODY>
<P align=center></P>
<P align=center></P>
<TABLE class="aniye" cellSpacing=0 cellPadding=0 width=530 align=center
	border=0>
	<TBODY>
		<TR>
			<TD vAlign=top height=270>
			<DIV align=center><BR>
			<IMG height=211 src="__PUBLIC__/Home/images/shop/error.gif" width=329><BR>
			<BR>
			<DIV align=center><FONT class=p6 id=errorMessage></FONT></DIV>
			</DIV>
			</TD>
		</TR>
		<tr>
		<div class="system-message">
			<td align="center"></br><?php if(isset($message)): echo ($message); ?> <?php else: echo ($error); endif; ?><span class="jump">系统<b id="wait"><?php echo ($waitSecond); ?></b>秒后将自动跳转到页面...</span></br></br><A id="href" href="<?php echo ($jumpUrl); ?>">如果您的浏览器没有自动跳转，请点击这里</A></td>
		</tr>
	</TBODY>
</TABLE>
</BODY>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</HTML>