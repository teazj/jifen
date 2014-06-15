$(function(){
		var con=$('.flash_ul').html();
		$('.flash_ul').html(con+con);//Í¼Æ¬¸´ÖÆÒ»·Ý
		w=$('.flash_ul li').width();
		x=$('.flash_ul li').length;
		$('.flash_ul').width(w*x);
		//alert($('.flash_ul').width())
		var ftimer=setInterval(doflash,3000)
		
		$('.flash_ul li').mouseover(function(){
			clearInterval(ftimer);
		}).mouseout(function(){
			ftimer=setInterval(doflash,2000)		
		})
		$('.flash_mark').mouseover(function(){
				$(this).animate({'opacity':0.7},1000)	
		}).mouseout(function(){
				$(this).animate({'opacity':0.3},1000)		
		})
		$('.flash_but li').mouseover(function(){
			clearInterval(ftimer);
			var offset=-w*$('.flash_but li').eq($(this).index()).index();
			$('.flash_ul').stop().animate({'left':offset},'600');

			$('.flash_but li').css('background','white');
			$(this).css('background','#d2691e')		
		}).mouseout(function(){
			ftimer=setInterval(doflash,2000)
		})
	
})
function doflash(){
		if($('.flash_ul').position().left <= (-$('.flash_ul').width()/2)){
				$('.flash_ul').css('left',0);						
		}
		$('.flash_ul').animate({'left':($('.flash_ul').position().left-739)},'normal',function(){
			$('.flash_but li').css('background','white');
			var num=Math.abs(($('.flash_ul').position().left/739)-1)-1;
			if(num>($('.flash_but li').length-1)){
				num=0
			}
			$('.flash_but li').eq(num).css('background','#D2691E');	
		});
		
};
	