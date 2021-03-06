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





$('label#close-quick-buy-form').click(function(){
    $('#quick-buy-form').removeClass('show');
});

$('#quick-buy').click(function(e){
    e.preventDefault();

    $('#quick-buy-form').addClass('show');
});




// payment method option

$(`#payment_method`).change(function(){

    if( $(this).val() === "bkash") {
        // show Bkash
        showOnlyBkash();
    } else if($(this).val() === "rocket") {
        // show Rocket
        showOnlyRocket()
    } else {
        // hide all payment option
        hideAllPaymentOption();
    }

    function showOnlyBkash() {
        $('.payment_option').hide();
        $('#bkash').show();
    }
    function showOnlyRocket() {
        $('.payment_option').hide();
        $('#rocket').show();
    }

    function hideAllPaymentOption() {
        $('.payment_option').hide();
    }


});

/*---------------------------
IMAGES SLIDER
-----------------------------*/
$(".owl-img").owlCarousel({
    loop: true,
    margin: 10,
    center:true,
    autoWidth: true,
    autoHeight:true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 10,
        }
    }
});

/*---------------------------
IMAGES SLIDER
-----------------------------*/
$(".owl-img2").owlCarousel({
    loop: true,
    margin: 10,
    center:true,
    autoWidth: true,
    autoHeight:true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 10,
        }
    }
});



$(document).ready(function(){
    $('#close-registration-sidebar').click(function() {
        $('.registration-sidebar').hide('slow');
    })

    $('#registrationSideView').click(function(e){
        e.preventDefault();
        $('.registration-sidebar').show('slow');
    })
});