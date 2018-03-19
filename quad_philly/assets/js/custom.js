jQuery(document).ready(function($){
	$(".tm-sub-faq .tm-sub-question").click(function() {
	  $(this).toggleClass("tm-clicked");
	});

	if($('body').hasClass('page-template-template-feature')) {
		if(window.location.hash) {
			var feature = window.location.hash.substr(1);
			var link = $('a[href="#'+ feature + '"]');
			$(window).load(function(){
				link.trigger('click');
			});
			console.log(link);
			//$('a[href="#'+ feature + '"]').trigger('click');
		}
	}

});
