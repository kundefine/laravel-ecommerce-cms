(function ($) {
    "use strict";


    $(document).ready(function ($) {
        /*==========================
        javaScript for Navbar - Scroll
        ============================*/
        
    $('.selected-area .select-box').on('click', 'button', function () {
        $(this).addClass('active').siblings().removeClass('active')
    });


        $('.select-by-olds').on('click', function () {
            $(this).toggleClass('active')
        });
        
    //     $('.menu-title').on('click', function () {
    //         $('.vertical_megamenu').toggleClass('open')
    //     });

    //     /*======================
    //     Search Box Layer
    //     =======================*/
    //     $(".search-form").focus(function(){
    //         $(".search-overlay").addClass("open");
    //     });
        
    //     $('.search-overlay').on('click', function () {
    //         $(this).removeClass("open");
    //     });

        
    //     //owl Carousel Slider
    //     /*============================

    //     javaScript for OwlCarousel Js
    //     ============================*/
    // $('.main_slider').owlCarousel({
    //     loop:true,
    //     margin:0,
    //     nav:true,
    //     dots:true,
    //     navText: ["<span uk-icon='chevron-left'></span>", "<span uk-icon='chevron-right'></span>"],
    //     autoplay: false,
    //     items:1,
    //     animateOut: 'fadeOut',
    //     animateIn: 'fadeIn',
    //     touchDrag: false,
    //     mouseDrag: false
    // });	


    // $('.browse_catagory-slider').owlCarousel({
    //     loop:true,
    //     margin:0,
    //     nav:true,
    //     dots:false,
    //     navText: ["<span uk-icon='chevron-left'></span>", "<span uk-icon='chevron-right'></span>"],
    //     autoplay: false,
    //     animateOut: 'fadeOut',
    //     animateIn: 'fadeIn',
    //     touchDrag: false,
    //     mouseDrag: false,
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:2
    //         },
    //         900:{
    //             items:3
    //         },
    //         1000:{
    //             items:4
    //         }
    //     }
    // });	

    // //single slider
    // $('.catagory-slider').owlCarousel({
    //     loop:true,
    //     margin:0,
    //     nav:true,
    //     dots:false,
    //     navText: ["<span uk-icon='chevron-left'></span>", "<span uk-icon='chevron-right'></span>"],
    //     autoplay: false,
    //     animateOut: 'fadeOut',
    //     animateIn: 'fadeIn',
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:2
    //         },
    //         900:{
    //             items:3
    //         },
    //         1000:{
    //             items:5
    //         }
    //     }
    // });
    
    


});
})(jQuery);
