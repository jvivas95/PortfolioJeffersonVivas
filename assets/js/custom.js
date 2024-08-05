(function($) {
    'use strict';


$(document).ready(function(){

    $('.slider-main').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:true,
        autoplayHoverPause:true,
        autoplay:true,
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
    })


    $('.testimonial-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        dots:false,
        mouseDrag : false,
        touchDrag : false,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        autoplayHoverPause:true,
        autoplay:true,
        navText: ["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],
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
    })


    $('.sponsor-slide').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:false,
        autoplayHoverPause:true,
        autoplay:true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    })


    $(window).on('scroll', function () {
          if ($(this).scrollTop() > 200) {
            $('.scrollingUp').addClass('is-active');
          } else {
            $('.scrollingUp').removeClass('is-active');
          }
        });
        $('.scrollingUp').on('click', function () {
          $("html, body").animate({
            scrollTop: 0
          }, 600);
          return false;
    });


    // counter up
    // $('.counter').counterUp({
    //     delay: 10,
    //     time: 1000
    // });


    // Mobile Menu Toggle
    $(".menubar .menu-wrap").clone().appendTo(".mobile-menu");
    var $mob_menu = $("body");
    $(".header-close-menu").on("click", function() {
      $mob_menu.removeClass("header-menu-active");
      $mob_menu.removeClass( "overlay-enabled" );
    });

    $(".menu-toggle").on("click", function() {
      $mob_menu.addClass("header-menu-active");
      $mob_menu.addClass( "overlay-enabled" );
    });
    $(".mobile-toggler").on("click", function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("current");
        $(this).next().slideToggle();
    });

    //Mobile TRAP
    var mobileTrap = function (elem) {
        let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
        let firstTabbable = tabbable.first();
        let lastTabbable = tabbable.last();
        /set focus on first input/
        firstTabbable.focus();
        //redirect last tab to first input/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });
        //redirect first shift+tab to last input/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });
    };

    //mobile Menu
    $(".menu-toggle").on("click", function() {
      $mob_menu.addClass("header-menu-active");
      $mob_menu.addClass( "overlay-enabled" );
            mobileTrap($('.mobile-menu'));
    });

    // Sticky Header
    $(window).on('scroll', function() {
      if ($(window).scrollTop() >= 250) {
          $('.sticky-nav').addClass('sticky-menu');
      }
      else {
          $('.sticky-nav').removeClass('sticky-menu');
      }
    });

    //Search TRAP
    var searchTrap = function (elem) {
        let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');
        let firstTabbable = tabbable.first();
        let lastTabbable = tabbable.last();
            
        // /set focus on first input/
        firstTabbable.focus();
        //redirect last tab to first input/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });
        //redirect first shift+tab to last input/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });
    };

    //header search Popup
    $(document).on('click','.header-search-toggle', function(e){
      $( "body" ).addClass( 'header-search-active' );
      $( "body" ).addClass( "overlay-enabled" );
      searchTrap($('.header-search-popup'));
    });

    $(document).on('click','.header-search-close', function(e){
        $( "body" ).removeClass('header-search-active');
        $( "body" ).removeClass( "overlay-enabled" );
        return this;
    });


    // nt Filter Tab
    activePostFilter();
    function activePostFilter(){
        var postFilter = $('.nt-filter-init');
        $.each(postFilter,function (index,value) {
            var el = $(this);
            var parentClass = $(this).parent().attr('class');
            var $selector = $('#'+el.attr('id'));
            $($selector).imagesLoaded(function () {
                var festivarMasonry = $($selector).isotope({
                    itemSelector: '.nt-filter-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: 0,
                        gutter:0
                    }
                });
                $(document).on('click', '.'+parentClass+' .nt-tab-filter a', function () {
                    var filterValue = $(this).attr('data-filter');
                    festivarMasonry.isotope({
                        filter: filterValue
                    });
                });
                 $('.nt-filter-wrapper-1 .nt-tab-filter a:first-child').click();
            });
        });
    }
    $(document).on('click','.nt-tab-filter a', function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });


    // cooming soon Timer
    var date = $(".coming-soon-wrapper .evita_ct-countdown").attr("data-timer");
    let msec = Date.parse(`${date}`);
    const d = new Date(msec);

    var timer = setInterval(function() {
      timeBetweenDates(d);
    }, 1000);

    function timeBetweenDates(toDate) {
      var dateEntered = toDate;
      var now = new Date();
      var difference = dateEntered.getTime() - now.getTime();

      if (difference <= 0) {

        // Timer done
        clearInterval(timer);
      
      } else {
        
        var seconds = Math.floor(difference / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);

        hours %= 24;
        minutes %= 60;
        seconds %= 60;

        $("#days").text(days);
        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
      }
    }
    // end

    
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 250) {
            $('.switcher').addClass('show-dark_mode');
        }
        else {
            $('.switcher').removeClass('show-dark_mode');
        }
      });



    // interval = setInterval(function() {      
        
        $( ".progress_item .percentNum" ).each(function(e) {
            var water_val = $( this ).text();
            $(this).parent().next().css({'transform':`translate(0,${100 - water_val}%)`});
        });




        
});
})(jQuery);