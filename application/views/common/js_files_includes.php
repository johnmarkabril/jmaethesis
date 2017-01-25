<script src="<?php echo base_url();?>public/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url();?>public/js/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url();?>public/js/jquery.md5.js"></script>

<!-- CUSTOM AND PLUGIN JAVASCRIPT -->
<script src="<?php echo base_url();?>public/js/inspinia.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/wow/wow.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/owncarousel/own.carousel.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/validate/jquery.validate.min.js"></script>


<?php if ($this->curpage == "Dashboard") { ?>
    <script src="<?php echo base_url();?>public/js/plugins/chartJs/Chart.min.js"></script>
<?php } ?>


<script>

	// PUT THE DEFAULT CODE HERE - START
	$(document).ready(function(){

        <?php 
            if ( $this->curpage == "Dashboard" ) {
                if ( !empty($get_all_todo_for_specific_admin) ) {
                    foreach ( $get_all_todo_for_specific_admin as $gatfsa ) :
        ?> 

                        $("#dashTodoCheckID<?php echo $gatfsa->NO; ?>").click(function(){
                            $.ajax ({
                                url: '<?php echo base_url(); ?>admin/dashboard/checked',
                                method: "POST",
                                data: {
                                    dashTodoNo           : $("#dashTodoNo<?php echo $gatfsa->NO; ?>").val()
                                },
                                success:function(data){
                                    location.reload('/admin');
                                },
                                error:function(){
                                    toastr.error('ERROR: Please refresh the page!');
                                }
                            });
                        });
                        $("#dashTodoNotCheckID<?php echo $gatfsa->NO; ?>").click(function(){
                            $.ajax ({
                                url: '<?php echo base_url(); ?>admin/dashboard/notchecked',
                                method: "POST",
                                data: {
                                    dashTodoNo           : $("#dashTodoNo<?php echo $gatfsa->NO; ?>").val()
                                },
                                success:function(data){
                                    location.reload('/admin');
                                },
                                error:function(){
                                    toastr.error('ERROR: Please refresh the page!');
                                }
                            });

                        });
        <?php
                    endforeach;
                }
            }
        ?>

        $("#formContactDash").validate({
            rules: {
                contactDash_name_create: {
                    required: true,
                    minlength: 5
                },
                contactDash_contact_create: {
                    required: true,
                    minlength: 11,
                    maxlength: 13
                },
                contactDash_address_create: {
                    require: true,
                    minlength: 5
                }
            }
        });

        $("#event_update").click(function(){
            var event_no_update             = $("#event_no_update").val();
            var event_title_update          = $("#event_title_update").val();
            var event_description_update    = $("#event_description_update").val();

            if ( event_title_update && event_description_update ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/events/update',
                    method: "POST",
                    data: {
                        event_no_update           : event_no_update,
                        event_title_update        : event_title_update,
                        event_description_update  : event_description_update
                    },
                    success:function(data){
                        location.reload('/admin/event/information/'+event_no_update+'');
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('ERROR: Incomplete field!');
            }
        });

        $("#event_create").click(function(){
            var event_title_create           = $("#event_title_create").val();
            var event_description_create     = $("#event_description_create").val();

            if ( event_title_create && event_description_create ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/events/insert',
                    method: "POST",
                    data: {
                        event_title_create       : event_title_create,
                        event_description_create : event_description_create
                    },
                    success:function(data){
                        html     =  '<tr>';
                        html    +=  '   <td class="title">';
                        html    +=  '       <a href="<?php echo base_url();?>admin/events" >'+ event_title_create +'</a>';
                        html    +=  '   </td>';
                        html    +=  '</tr>';  
                        $('#event_left_list').prepend(html);

                        $('#eventModal').modal('toggle');
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('ERROR: Incomplete field!');
            }
        });

        $("#ams_create").click(function(){
            var ams_title           = $("#ams_title").val();
            var ams_description     = $("#ams_description").val();

            if ( ams_title && ams_description ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/about_my_site/insert',
                    method: "POST",
                    data: {
                        ams_title       : ams_title,
                        ams_description : ams_description
                    },
                    success:function(data){
                        html     =  '<tr>';
                        html    +=  '   <td class="title">';
                        html    +=  '       <a href="<?php echo base_url();?>admin/about_my_site" >'+ ams_title +'</a>';
                        html    +=  '   </td>';
                        html    +=  '</tr>';  
                        $('#aboutmysite_left_list').prepend(html);
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('ERROR: Incomplete field!');
            }
        });

        $("#ams_update").click(function(){
            var ams_no_update           = $("#ams_no_update").val();
            var ams_title_update           = $("#ams_title_update").val();
            var ams_description_update     = $("#ams_description_update").val();

            if ( ams_title_update && ams_description_update ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/about_my_site/update',
                    method: "POST",
                    data: {
                        ams_no_update           : ams_no_update,
                        ams_title_update        : ams_title_update,
                        ams_description_update  : ams_description_update
                    },
                    success:function(data){
                        location.reload('/admin/about_my_site/information/'+ams_no_update+'');
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('ERROR: Incomplete field!');
            }
        });

        $("#testimonial-slider").owlCarousel({
            items:2,
            itemsDesktop:[1199,2],
            itemsDesktopSmall:[979,2],
            itemsTablet:[768,2],
            itemsMobile:[600,1],
            pagination:true,
            navigation:false,
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


    $(document).on('click', '.browse', function(){
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });

    $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

	// END CODE - DEFAULT

    <?php if ( $this->curpage == "Dashboard" ) { ?>
        $(function() {
            var lineData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "Example dataset",
                            fillColor: "rgba(35,198,200,1)",
                            strokeColor: "rgba(32,152,109,1)",
                            pointColor: "rgba(237,85,101,1)",
                            pointStrokeColor: "#F8AC59",
                            pointHighlightFill: "#F8AC59",
                            pointHighlightStroke: "rgba(237,85,101,1)",
                            data: [65, 59, 80, 81, 56, 55, 40,54,32,10,87,92]
                        }
                    ]
                };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };

            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

                
        });

    <?php } ?>
</script>