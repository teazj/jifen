$(function(){
	$("#af a").click(function(){
		$(this).parent().find("A").removeClass("a_2");
		$(this).addClass("a_2");
		$("#iHidden").val($(this).text());
		})

})