jQuery(function($) {
	var owlMainSlider = $('.service-slide');
	owlMainSlider.owlCarousel({
		items: 5,
		margin: 25,
		loop: true,
		dots: false,
		nav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 800,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: service_settings.items
			}
		}
	});
});