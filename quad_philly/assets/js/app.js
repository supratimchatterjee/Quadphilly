jQuery(document).ready(function($) {
	var slider = $('#imageGallery').lightSlider({
		gallery:true,
		item:1,
		thumbItem:4,
		slideMargin: 0,
		speed:500,
		auto:false,
		loop:true,
	});

	$('.tm-sub-question').click(function(event) {
		$('.tm-sub-question').removeClass('active');
		$('.tm-sub-answer').hide();
		$(this).addClass('active').next().show();
	});
	$('.property-tabs').on('show.uk.switcher', function(event, area){
		slider.refresh();
		$(window).trigger('resize');
	});
});
