//未登录时购买提示页面弹出层  s
$(function(){
	
	$(".showbox1").click(function(){
		$("#TB_overlayBG").css({
			display:"block",height:$(document).height()
		});
		$(".box").css({
			left:($("body").width()-$(".box").width())/2-20+"px",
			top:($(window).height()-$(".box").height())/2+$(window).scrollTop()+"px",
			display:"block"
		});
	});
	
	$(".close").click(function(){
		$("#TB_overlayBG").css("display","none");
		$(".box ").css("display","none");
	});
	
})
//未登录时购买提示页面弹出层  e











