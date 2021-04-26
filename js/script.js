$(function() {
	$('.samplemodal-open').click(function(){
	 $('#sampleModal').fadeIn();
	 $('html').addClass('modalset');
	});
	$('.samplemodal .samplemodal-bg,.samplemodal .samplemodal-close').click(function(){
	 $('#sampleModal').fadeOut();
	 $('html').removeClass('modalset');
	});
   });	