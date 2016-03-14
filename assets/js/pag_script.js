/** PAG Script
 *	Author: Binh Bui
 *	Created date: 03/10/2016
 */
 
$(document).ready(function() {	
	
	var offset = 250;
	var duration = 500;
	$('.back_to_top').css({"display": "none"});	
	$(window).scroll(function() {
	if ($(this).scrollTop() > offset) 
	{
		$('.back_to_top').fadeIn(duration); 
	} 
	else 
	{
		$('.back_to_top').fadeOut(duration);
	}
	
	});
	
	$('.back_to_top').click(function(event) {			
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	})
	
}); 


 
 
 function pag_js_toggle(el){	
	// go up to the outer and find the first div
	//$(el).parents("li").find('div.pag_list_item_detail').toggleClass("pag_hidden");
	$(el).parents("li").find('div.pag_list_item_detail').slideToggle(function(){
		if($(el).html() == 'Less...')
			$(el).html('More...');
		else
			$(el).html('Less...');
	});
	
}

 