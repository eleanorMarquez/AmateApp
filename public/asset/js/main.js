/***************************************************
==================== JS INDEX ======================
****************************************************
01. ScrollToTop Js
02. Smooth Scroll
03. WOW Js
04. NiceSelect
05. Number Input
06. Mean-menu Navbar
07. OwlCarousel for Hero (Home 01)
08. OwlCarousel for Hero (Home 02)
09. Sticky Menu 
10. CounterUp
11. Isotope Js
12. Fancy Box for Gallery 01
13. Fancy Box for Gallery 02
14. Fancy Box for Gallery 03
15. Fancy Box for Gallery 04
16. Search Box
17. Info bar
18. OwlCarousel for Service 01
19. OwlCarousel for Feature
20. OwlCarousel for Pricing
21. OwlCarousel for Blog
22. OwlCarousel for Service 02
23. OwlCarousel for Gallery
24. OwlCarousel for Testimonial 01
25. OwlCarousel for Testimonial 03
26. OwlCarousel for Client
27. OwlCarousel for Appointment
28. OwlCarousel for Service 03
29. OwlCarousel for Testimonial 02
30. Preloader Js
****************************************************/


(function ($) {
    "use strict";


    ////////////////////////////////////////////////////
    // 01. ScrollToTop Js
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    $('.scrollToTop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });


    ////////////////////////////////////////////////////
    // 02. Smooth Scroll
    $('a.smooth-scroll').on('click', function (event) {
        event.preventDefault();
        var section_smooth = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(section_smooth).offset().top
        }, 1250, 'easeInOutExpo');
    });


    ////////////////////////////////////////////////////
    // 03. WOW Js
    new WOW().init();


    ////////////////////////////////////////////////////
    // 04. NiceSelect
    $('select').niceSelect();


    ////////////////////////////////////////////////////
    // 05. Number Input
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fas fa-plus"></i></div><div class="quantity-button quantity-down"><i class="fas fa-minus"></i></div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');
        btnUp.on('click', function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on('click', function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });


    //////////////////////////////////////////////////////
    // 06. Mean-menu Navbar
    $("#mobile-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "991"
    });


    ////////////////////////////////////////////////////
    // 07. OwlCarousel for Hero (Home 01)
    function homeSlider() {
        var slider = $('.slider1__active');
        slider.owlCarousel({
            loop: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplay: true,
            nav: false,
            dots: true,
            navText: ['<i class="ti-angle-double-left"></i>', '<i class="ti-angle-double-right"></i>'],
            smartSpeed: 500,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        slider.on('translate.owl.carousel', function () {
            var layer = $("[data-animation]");
            layer.each(function () {
                var slider_animation = $(this).data('animation');
                $(this).removeClass('animated ' + slider_animation).css('opacity', '0');
            });
        });
        $("[data-delay]").each(function () {
            var animation_delay = $(this).data('delay');
            $(this).css('animation-delay', animation_delay);
        });
        $("[data-duration]").each(function () {
            var animation_dutation = $(this).data('duration');
            $(this).css('animation-duration', animation_dutation);
        });
        slider.on('translated.owl.carousel', function () {
            var layer = slider.find('.owl-item.active').find("[data-animation]");
            layer.each(function () {
                var slider_animation = $(this).data('animation');
                $(this).addClass('animated ' + slider_animation).css('opacity', '1');
            });
        });
    }
    homeSlider();


    ////////////////////////////////////////////////////
    // 08. OwlCarousel for Hero (Home 02) 
    function homeSlider2() {
        var slider = $('.slider2__active');
        slider.owlCarousel({
            loop: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplay: true,
            nav: true,
            dots: false,
            navText: ['<i class="ti-angle-double-left"></i>', '<i class="ti-angle-double-right"></i>'],
            smartSpeed: 1000,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        slider.on('translate.owl.carousel', function () {
            var layer = $("[data-animation]");
            layer.each(function () {
                var slider_animation = $(this).data('animation');
                $(this).removeClass('animated ' + slider_animation).css('opacity', '0');
            });
        });
        $("[data-delay]").each(function () {
            var animation_delay = $(this).data('delay');
            $(this).css('animation-delay', animation_delay);
        });
        $("[data-duration]").each(function () {
            var animation_dutation = $(this).data('duration');
            $(this).css('animation-duration', animation_dutation);
        });
        slider.on('translated.owl.carousel', function () {
            var layer = slider.find('.owl-item.active').find("[data-animation]");
            layer.each(function () {
                var slider_animation = $(this).data('animation');
                $(this).addClass('animated ' + slider_animation).css('opacity', '1');
            });
        });
    }
    homeSlider2();


    ////////////////////////////////////////////////////
    // 09. Sticky Menu 
    if (screen.width >= 992) {
        $(document).on('scroll', function (e) {
            var scrollPos = $(this).scrollTop();
            if (scrollPos > 400) {
                $('.header__menu-wrapper').addClass('menu_sticky');
                $('.header__menu-wrapper').addClass('animated');
                $('.header__menu-wrapper').addClass('slideInDown');
            } else {
                $('.header__menu-wrapper').removeClass('menu_sticky');
                $('.header__menu-wrapper').removeClass('animated');
                $('.header__menu-wrapper').removeClass('slideInDown');
            }
        });
    };


    ////////////////////////////////////////////////////
    // 10. CounterUp
    $('.counter').counterUp({
        delay: 10,
        time: 1500
    });


    ////////////////////////////////////////////////////
    // 11. Isotope Js
    $('.your_class_name li').on('click', function () {
        $(".your_class_name li").removeClass("active");
        $(this).addClass("active");
        var selector = $(this).attr('data-filter');
        $("#isotope-container").isotope({
            filter: selector
        });
    });
    $(window).on("load", function () {
        $("#isotope-container").isotope();
    });


    //////////////////////////////////////////////////
    // 12. Fancy Box for Gallery 01
    $('[data-fancybox="gallery_1"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        animationEffect: "zoom-in-out",
        transitionEffect: "circular"
    });


    //////////////////////////////////////////////////
    // 13. Fancy Box for Gallery 02
    $('[data-fancybox="gallery_2"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        animationEffect: "zoom-in-out",
        transitionEffect: "circular"
    });


    //////////////////////////////////////////////////
    // 14. Fancy Box for Gallery 03
    $('[data-fancybox="gallery_3"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        animationEffect: "zoom-in-out",
        transitionEffect: "circular"
    });


    //////////////////////////////////////////////////
    // 15. Fancy Box for Gallery 04
    $('[data-fancybox="gallery_4"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        animationEffect: "zoom-in-out",
        transitionEffect: "circular"
    });


    ////////////////////////////////////////////////////
    // 16. Search Box
    if ($(".search_box_container").length) {
        var searchToggleBtn = $(".search_btn");
        var searchContent = $(".search_form");
        var body = $("body");

        searchToggleBtn.on("click", function (e) {
            searchContent.toggleClass("search_form_toggle");
            e.stopPropagation();
        });

        body.on("click", function () {
            searchContent.removeClass("search_form_toggle");
        }).find(searchContent).on("click", function (e) {
            e.stopPropagation();
        });
    };


    ////////////////////////////////////////////////////
    // 17. Info bar
    $(".extra_info_btn").on("click", function () {
        $(".extra_info").addClass("extra_info_open");
    });

    $(".extra_info_close").on("click", function () {
        $(".extra_info").removeClass("extra_info_open");
    });


    ////////////////////////////////////////////////////
    // 18. OwlCarousel for Service 01
    $('.service1__carousel').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 8000,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 19. OwlCarousel for Feature
    $('.feature1__carousel').owlCarousel({
        loop: true,
        autoplay: false,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 0,
        autoplayTimeout: 8000,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 20. OwlCarousel for Pricing
    $('.pricing2__carousel').owlCarousel({
        loop: true,
        autoplay: false,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 8000,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 21. OwlCarousel for Blog
    $('.blog2__carousel').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 8000,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 22. OwlCarousel for Service 02
    $('.service2__carousel').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 8000,
        nav: false,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: true,
        responsive: {
            0: {
                items: 1,
                dots: false
            },
            401: {
                items: 1,
                dots: true
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 23. OwlCarousel for Gallery
    $('.gallery1__wrapper').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 5000,
        nav: false,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });


    ////////////////////////////////////////////////////
    // 24. OwlCarousel for Testimonial 01
    $('.testimonial1__wrapper').owlCarousel({
        loop: true,
        autoplay: false,
        smartSpeed: 500,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 5000,
        nav: false,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    ////////////////////////////////////////////////////
    // 25. OwlCarousel for Testimonial 03
    $('.testimonial3__carousel').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 8000,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    ////////////////////////////////////////////////////
    // 26. OwlCarousel for Client
    $('.client1__active').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        margin: 60,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 3
            },
            700: {
                items: 4
            },
            1000: {
                items: 5,
                margin: 20
            }
        }
    });


    ////////////////////////////////////////////////////
    // 27. OwlCarousel for Appointment
    $('.appointment4__carousel').owlCarousel({
        loop: true,
        autoplay: false,
        smartSpeed: 500,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            401: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });


    ////////////////////////////////////////////////////
    // 28. OwlCarousel for Service 03
    $('.service3__active').owlCarousel({
        loop: true,
        autoplay: false,
        smartSpeed: 500,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            991: {
                items: 2
            },
            1199: {
                items: 3
            },
            1200: {
                items: 4,
                margin: 20
            }
        }
    });


    ////////////////////////////////////////////////////
    // 29. OwlCarousel for Testimonial 02
    $('.testimonial2__carousel').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        margin: 70,
        autoplayTimeout: 6000,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            991: {
                items: 1
            },
            992: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });



    //////////////////////////////////////////////////////
    // window load function
    $(window).on("load", function () {

        //////////////////////////////////////////////////////
        // 30. Preloader Js
        $(".preloader").delay(100).fadeOut('slow');

    });

})(jQuery);