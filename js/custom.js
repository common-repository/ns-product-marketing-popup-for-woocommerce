jQuery(window).resize(nsAdjustLayout);

function nsAdjustLayout(){
   jQuery('#ns-pmpfw-container').css({
	   position:'fixed',
	   left: (jQuery(window).width() - jQuery('#ns-pmpfw-container').outerWidth())/2,
	   top: (jQuery(window).height() - jQuery('#ns-pmpfw-container').outerHeight())/2
   });

}

jQuery(document).ready(function( $ ) {
	
	nsAdjustLayout();
	
	// $('#ns-pmpfw-layer-box').delay(2000).fadeIn();
	// $('#ns-pmpfw-container').delay(2000).fadeIn();
	
	$('#ns-pmpfw-layer-box').click(function() {
		$('#ns-pmpfw-layer-box').fadeOut();
		$('#ns-pmpfw-container').fadeOut();
		$('html').removeClass('ns-marketing-stop-scrolling');
	});
	$('#ns-pmpfw-container').click(function() {
		
	});

});
