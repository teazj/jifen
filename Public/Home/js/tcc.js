					// 弹出层js
					$(document).ready(function(){
						$(".showdiv").click(function(){
							var box =300;
							var th= $(window).scrollTop()+$(window).height()/1.6-box;
							var h =document.body.clientHeight;
							var rw =$(window).width()/2-box;
							$(".showbox").animate({top:th,opacity:'show',width:468,height:260,right:rw},500);
							$("#zhezhao").css({
								display:"block",height:$(document).height()
							});
							return false;
						});
						$(".showbox .close").click(function(){
							$(this).parents(".showbox").animate({top:0,opacity: 'hide',width:0,height:0,right:0},500);
							$("#zhezhao").css("display","none");
						});
					});


					// reqister页面弹出层js
					$(document).ready(function(){
						$(".showdiv_1").click(function(){
							var box =420;
							var th= $(window).scrollTop()+$(window).height()/1.6-box;
							var h =document.body.clientHeight;
							var rw =$(window).width()/2-box;
							$(".showbox_1").animate({top:th,opacity:'show',width:828,height:511,right:rw},500);
							$("#zhezhao").css({
								display:"block",height:$(document).height()
							});
							return false;
						});
						$(".showbox_1 .close_1").click(function(){
							$(this).parents(".showbox_1").animate({top:0,opacity: 'hide',width:0,height:0,right:0},500);
							$("#zhezhao").css("display","none");
						});
					});
					
					
					
					// exchange页面弹出层js
					$(document).ready(function(){
						$(".showdiv_2").click(function(){
							var box =300;
							var th= $(window).scrollTop()+$(window).height()/1.6-box;
							var h =document.body.clientHeight;
							var rw =$(window).width()/2-box;
							$(".showbox_2").animate({top:th,opacity:'show',width:707,height:350,right:rw},300);
							$("#zhezhao").css({
								display:"block",height:$(document).height()
							});
							return false;
						});
						$(".showbox_2 .close_2").click(function(){
							$(this).parents(".showbox_2").animate({top:0,opacity: 'hide',width:0,height:0,right:0},300);
							$("#zhezhao").css("display","none");
						});
					});
					
					
					
					
					
					
					//  兑换成功弹出层
					$(document).ready(function(){
						$(".showdiv_3").click(function(){
							var box =300;
							var th= $(window).scrollTop()+$(window).height()/1.6-box;
							var h =document.body.clientHeight;
							var rw =$(window).width()/2-box;
							$(".showbox_3").animate({top:th,opacity:'show',width:707,height:350,right:rw},200);
							$("#zhezhao").css({
								display:"block",height:$(document).height()
							});
							return false;
						});
						$(".showbox_3 .close_2").click(function(){
							$(this).parents(".showbox_3").animate({top:0,opacity: 'hide',width:0,height:0,right:0},200);
							$("#zhezhao").css("display","none");
						});
					});