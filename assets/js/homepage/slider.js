jQuery(function($) {	

	var autopl = (slider_settings.autoplay == 'true')?true:false;
	var sloop = (slider_settings.slider_loop == 'true')?true:false;
	
	$('.slider-main').owlCarousel({
		loop: sloop,
		margin:0,
		nav:true,
		dots:true,
		autoplayHoverPause:true,
		autoplayTimeout: slider_settings.animationSpeed,
		autoplay: autopl,
		animateOut: "zoomOut",
		animateIn: "zoomIn",
		navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
});