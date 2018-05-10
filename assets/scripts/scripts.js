jQuery(document).ready(function($){
	/* ---------------------------------------------------------------------------
                                Start your custom code here
   -------------------------------------------------------------------------- */
    //home page slick slider
    $('.home-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        autoplay: true,
        prevArrow: '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>',
        cssEase: 'linear',
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    infinite: true
                }
            }
         ]
    });

    //Gallery Lightbox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
   /* ---------------------------------------------------------------------------
                                 End your custom code here
    -------------------------------------------------------------------------- */
});