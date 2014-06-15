$(document).ready(function(){
//$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)
//$("ul.topnav li a").mouseover(function() { //When trigger is clicked...
////Following events are applied to the subnav itself (moving subnav up and down)
//$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click
//$(this).parent().hover(function() {
//}, function(){
//$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
//});
////Following events are applied to the trigger (Hover events for the trigger)
//}).hover(function() {
//$(this).addClass("subhover"); //On hover over, add class "subhover"
//}, function(){ //On Hover Out
//$(this).removeClass("subhover"); //On hover out, remove class "subhover"
//});





$("ul.topnav li").hover(
function(){$(this).find(".subnav").show();$(this).find("A").addClass("subhover");},
function(){
	//$("ul.topnav li a").removeClass("subhover");
	//if(!$(".subnav").is(":hidden")){$("ul.topnav li a").removeClass("subhover");$(this).removeClass("subhover");};	
	//$(this).parent().find(".subnav").hover(function(){$(this).parent().children("A").addClass("subhover");},function(){$(this).slideUp('slow');$(this).parent().children("A").removeClass("subhover");})
	$(this).find(".subnav").hide();$(this).find("A").removeClass("subhover");
	})
}); 
