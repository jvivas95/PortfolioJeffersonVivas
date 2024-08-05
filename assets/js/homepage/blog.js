jQuery(function($) {
	  // Blog
      $(".post-carousel").owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        loop: true,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        margin: 30,
        stagePadding: 15,
        autoplay: false,
        autoplayTimeout: 10000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive: {
          0: {
            items: 1
          },
          601: {
            items: 2
          },
          992: {
            items: blog_settings.items,
          }
        }
      });
});