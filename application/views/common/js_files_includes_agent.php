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
<script src="<?php echo base_url();?>public/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/staps/jquery.steps.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/chosen/chosen.jquery.js"></script>

<!-- LIST -->
<script src="<?php echo base_url();?>public/js/plugins/list/list.min.js"></script>

<script>
	$(document).ready(function(){

        <?php 
            if ( $curpage == 'Profile' ) {
                if ( !empty($get_all_post) ) {
                    foreach ( $get_all_post as $gap ) :
        ?>
                        $('#adminReplyPost<?php echo $gap->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#adminReplyPost<?php echo $gap->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>agent/profile/insert_reply',
                                        method: "POST",
                                        data: {
                                            replyMessage    :     $('#adminReplyPost<?php echo $gap->NO; ?>').val(),
                                            messageNo       :     '<?php echo $gap->NO; ?>'
                                        },
                                        success:function(data){
                                            html =  '<div class="padding-top">';
                                            html += '   <div class="ibox-content no-border" style="background-color: #F2F2F2;">';
                                            html += '       <div>';
                                            html += '           <div class="row">';
                                            html += '               <div class="col-xs-1">';
                                            html += '                   <img src="<?php echo base_url(); ?>public/img/<?php echo $session_image; ?>" style="width:40px;height:40px;" />';
                                            html += '               </div>';
                                            html += '               <div style="padding-left: 75px;"><span class="text-bold"><?php echo $session_name; ?></span> | <span><?php echo $date; ?></span></div>';
                                            html += '               <div style="padding-left: 75px;">'+ $('#adminReplyPost<?php echo $gap->NO; ?>').val() +'</div>';
                                            html += '           </div>';
                                            html += '       </div>';
                                            html += '   </div>';
                                            html += '</div>';

                                            $('#newReplyPostNo<?php echo $gap->NO; ?>').append(html);
                                            $('#adminReplyPost<?php echo $gap->NO; ?>').val('');
                                        },
                                        error:function(){
                                            toastr.error('ERROR: Please refresh the page!');
                                        }
                                    });
                                }
                            }
                        });
        <?php
                    endforeach;
                }
        ?>

                $('#btn_post_profile').click(function(){
                    var txt_post            = $('#txt_post').val();
                    var txt_no_prof_post    = $('#txt_no_prof_post').val();

                    if ( txt_post ) {
                        $.ajax({
                            url: "<?php echo base_url();?>agent/profile/create",
                            method: "POST",
                            data: {  
                                txt_post     : txt_post 
                            },
                            success:function(data){
                                $('#txt_post').val("");
                                html =  '<div class="padding-top">';
                                html += '   <div class="ibox-content no-border">';
                                html += '       <div class="row">';
                                html += '           <span class="pull-right" style="color:blue;padding-right: 15px;"><a>X</a></span>';
                                html += '           <div class="col-xs-1">';
                                html += '               <img src="<?php echo base_url(); ?>public/img/<?php echo $session_image; ?>" style="width:50px;height:50px;" />';
                                html += '           </div>';
                                html += '           <div class="text-bold " style="padding-left: 75px;"><?php echo $session_name; ?></div>';
                                html += '           <div class="" style="padding-left: 75px;"><?php echo $date; ?></div>';
                                html += '       </div>';
                                html += '       <hr class="no-margin margin-top"/>';
                                html += '       <div class="padding-top" style="padding-left: 20px;padding-right: 20px;font-size: 17px;">';
                                html += txt_post;
                                html += '       </div>';
                                html += '       <input type="text" value="'+ data +'" id="txt_no_prof_post" style="display:none;" />';
                                html += '       <div class="padding-top">';
                                html += '           <textarea class="form-control" id="adminReplyPost'+ data +'" style="max-width: 100%;max-height: 50px;min-height: 50px;" placeholder="Comment"></textarea>';
                                html += '       </div>';
                                html += '       <div id="newReplyPostNo'+ data +'"></div>';
                                html += '   </div>';
                                html += '</div>';
                                $('#newPostAdmin').append(html);
                            },
                            error:function(){
                                toastr.error("ERROR!");
                            }
                        });
                    } else{
                        toastr.error("Write something");
                    }
                });
        <?php
            }
        ?>

        $("#event_create").click(function(){
            var event_title_create           = $("#event_title_create").val();
            var event_description_create     = $("#event_description_create").val();

            if ( event_title_create && event_description_create ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>agent/events/insert',
                    method: "POST",
                    data: {
                        event_title_create       : event_title_create,
                        event_description_create : event_description_create
                    },
                    success:function(data){
                        html     =  '<tr>';
                        html    +=  '   <td class="title">';
                        html    +=  '       <a href="<?php echo base_url();?>agent/events" >'+ event_title_create +'</a>';
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

        $('#messageReply').keypress(function(event) {
            if (event.keyCode == 13 && !event.shiftKey) {
                if ( $('#messageReply').val() ) {
                    $.ajax ({
                        url: '<?php echo base_url(); ?>agent/message/insert_reply',
                        method: "POST",
                        data: {
                            replyMessage    :     $('#messageReply').val(),
                            messageNo       :     '<?php echo $this->uri->segment(4); ?>'
                        },
                        success:function(data){
                            location.reload('/message/content/'+'<?php echo $this->uri->segment(4); ?>');
                        },
                        error:function(){
                            toastr.error('ERROR: Please refresh the page!');
                        }
                    });
                } else {
                    return false;
                }
            }
        });

        $('#cm_create').click(function(){
            var email = $('#cm_email').val();
            var subject = $('#cm_subject').val();
            var message = $('#cm_message').val();
            if ( email ) {

                $.ajax ({
                    url: '<?php echo base_url(); ?>agent/message/checkEmail',
                    method: "POST",
                    data: {
                        email    :     $('#cm_email').val()
                    },
                    success:function(data){
                        if ( data == 0 ) {
                            $('#error_cm_email').text('  ERROR: Email address is invalid!');
                        } else {
                            $('#error_cm_email').text('');
                            if ( subject ) {
                                if ( message ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>admin/message/new_message',
                                        method: "POST",
                                        data: {
                                            email       :       $('#cm_email').val(),
                                            subject     :       $('#cm_subject').val(),
                                            message     :       $('#cm_message').val()
                                        },
                                        success:function(data){
                                            location.reload('/message/');
                                            // alert(data);
                                        },
                                        error:function(){
                                            toastr.error('ERROR: Please refresh the page!');
                                        }
                                    }); 
                                } else {
                                    clearAllErrorMessage();
                                    $('#error_cm_message').text('  ERROR: Please fill this field!');
                                }
                            } else {
                                clearAllErrorMessage();
                                $('#error_cm_subject').text('  ERROR: Please fill this field!');
                            }
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });   
            } else {
                clearAllErrorMessage();
                $('#error_cm_email').text('  ERROR: Please fill this field!');
            }
        });

        <?php 
            if ( $this->curpage == "Issue Tracker" ) {
                if ( !empty ($get_all_issue_tracker) ) {
                    foreach ( $get_all_issue_tracker as $gait ) :
        ?>
		              $('#replyforIssueID<?php echo $gait->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#replyforIssueID<?php echo $gait->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>agent/issue_tracker/insert_reply',
                                        method: "POST",
                                        data: {
                                            issueTrackerNo      :   '<?php echo $gait->NO; ?>',
                                            issueTrackerReply   :   $('#replyforIssueID<?php echo $gait->NO; ?>').val()
                                        },
                                        success:function(data){
                                            location.reload('/admin');
                                        },
                                        error:function(){
                                            toastr.error('ERROR: Please refresh the page!');
                                        }
                                    });
                                } else {
                                    return false;
                                }
                            }
                        });

                        $("#replyID<?php echo $gait->NO; ?>").click(function(){
                            $.ajax ({
                                url: '<?php echo base_url(); ?>agent/issue_tracker/getReplyIssueTracker',
                                method: "POST",
                                data: {
                                    no           : $("#replyNO<?php echo $gait->NO; ?>").val()
                                },
                                success:function(data){
                                    $("#data-body-modal-issue-tracker<?php echo $gait->NO; ?>").html(data);
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
		// DEFAULT CODE - START DONT DELETE IT
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"100%"}
            }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

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

        // CODE FOR SEARCH
        var options = {
          valueNames: [ 'name', 'contact', 'email', 'title', 'username', 'date', 'link', 'issue-info', 'status']
        };

        var searchList = new List('search', options);  
        // END OF DEFAULT CODE
	});

	// DEFAULT CODE - DONT DELETE - START
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
    // END OF DEFAULT CODE 
</script>