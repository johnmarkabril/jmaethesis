<script src="<?php echo base_url();?>public/js/jquery-3.1.1.min.js"></script>

<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>public/js/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url();?>public/js/jquery.md5.js"></script>

<!-- CUSTOM AND PLUGIN JAVASCRIPT -->
<script src="<?php echo base_url();?>public/js/inspinia.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/wow/wow.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/owncarousel/own.carousel.min.js"></script>

<script src="<?php echo base_url();?>public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>

	// PUT THE DEFAULT CODE HERE - START
	$(document).ready(function(){

        $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        itemsMobile:[600,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        slideSpeed:1000,
        autoPlay:true
    });

		// TOOLTIP AND POPOVER
        $('[data-toggle="tooltip"]').tooltip(); 
        $('[data-toggle="popover"]').popover();
        
        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });
    });

	var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();
    
    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

	// END CODE - DEFAULT
</script>