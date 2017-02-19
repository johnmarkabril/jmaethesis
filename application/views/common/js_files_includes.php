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

<?php if ($this->curpage == "Dashboard") { ?>
    <script src="<?php echo base_url();?>public/js/plugins/chartJs/Chart.min.js"></script>
<?php } ?>

<?php if ( $this->curpage == 'Reports' ) { ?>
    <script src="<?php echo base_url();?>public/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?php echo base_url();?>public/js/plugins/chartist/chartist.min.js"></script>
<?php } ?>



<script>

    <?php 
        if($this->session->flashdata('error_message')){
        ?>
            toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
    <?php } ?>

    <?php 
        if($this->session->flashdata('success_message')){
        ?>
            toastr.success("<?php echo $this->session->flashdata('success_message'); ?>");
    <?php } ?>

	// PUT THE DEFAULT CODE HERE - START
	$(document).ready(function(){
        
        // DONT DELETE IT - REGULAR EXPRESSION
            //     var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_team_firstname);
            //     var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_team_lastname);
            //     var checkContact    = /^(0|\[0-9]{1,5})?([7-9][0-9]{9})$/.test(txt_team_contact);
            //     var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_team_email);
        // END OF DONT DELETE CODE

        $('#btn_create_wt').click(function(){
            var txt_name_wt_create         =   $('#txt_name_wt_create').val();
            var txt_category_wt_create     =   $('#txt_category_wt_create').val();
            var txt_description_wt_create  =   $('#txt_description_wt_create').val();
            var txt_library_wt_create      =   $('#txt_library_wt_create').val();
            var txt_price_wt_create        =   $('#txt_price_wt_create').val();

            if ( txt_name_wt_create.length > 5 ) {
                if ( txt_category_wt_create.length > 5 ) {
                    if ( txt_description_wt_create.length > 5 ) {
                        if ( txt_library_wt_create.length > 5 ) {
                            if ( txt_price_wt_create.length > 3 ) {
                                $.ajax({
                                    url: "<?php echo base_url();?>admin/website_template/create",
                                    method: "POST",
                                    data: {  
                                        txt_name_wt_create         : txt_name_wt_create,
                                        txt_category_wt_create     : txt_category_wt_create,
                                        txt_description_wt_create  : txt_description_wt_create,
                                        txt_library_wt_create      : txt_library_wt_create,
                                        txt_price_wt_create        : txt_price_wt_create
                                    },
                                    success:function(data){
                                        location.reload('/admin/website_template');
                                    },
                                    error:function(){
                                        toastr.error("ERROR!");
                                    }
                                });
                            } else {
                                toastr.error("ERROR: Minimum of 3 characters!");
                            }
                        } else {
                            toastr.error("ERROR: Minimum of 5 characters!");
                        }
                    } else {
                        toastr.error("ERROR: Minimum of 5 characters!");
                    }
                } else {
                    toastr.error("ERROR: Minimum of 5 characters!");
                }
            } else {
                toastr.error("ERROR: Minimum of 5 characters!");
            }
        });

        $('#btn_update_wt').click(function(){
            var txt_no_wt           =   $('#txt_no_wt').val();
            var txt_name_wt         =   $('#txt_name_wt').val();
            var txt_category_wt     =   $('#txt_category_wt').val();
            var txt_description_wt  =   $('#txt_description_wt').val();
            var txt_library_wt      =   $('#txt_library_wt').val();
            var txt_price_wt        =   $('#txt_price_wt').val();

            if ( txt_name_wt.length > 5 ) {
                if ( txt_category_wt.length > 5 ) {
                    if ( txt_description_wt.length > 5 ) {
                        if ( txt_library_wt.length > 5 ) {
                            if ( txt_price_wt.length > 5 ) {
                                $.ajax({
                                    url: "<?php echo base_url();?>admin/website_template/update",
                                    method: "POST",
                                    data: {  
                                        txt_no_wt           : txt_no_wt,
                                        txt_name_wt         : txt_name_wt,
                                        txt_category_wt     : txt_category_wt,
                                        txt_description_wt  : txt_description_wt,
                                        txt_library_wt      : txt_library_wt,
                                        txt_price_wt        : txt_price_wt
                                    },
                                    success:function(data){
                                        location.reload('/admin/website_template');
                                    },
                                    error:function(){
                                        toastr.error("ERROR!");
                                    }
                                });
                            } else {
                                toastr.error("ERROR: Minimum of 5 characters!");
                            }
                        } else {
                            toastr.error("ERROR: Minimum of 5 characters!");
                        }
                    } else {
                        toastr.error("ERROR: Minimum of 5 characters!");
                    }
                } else {
                    toastr.error("ERROR: Minimum of 5 characters!");
                }
            } else {
                toastr.error("ERROR: Minimum of 5 characters!");
            }

        });


        $('#btn_update_wo').click(function(){
            var txt_no_wo       = $('#txt_no_wo').val();
            var txt_title_wo    = $('#txt_title_wo').val();
            var txt_owner_wo    = $('#txt_owner_wo').val();

            if ( txt_title_wo.length > 5 ) {
                if ( txt_owner_wo.length > 5 ) {
                    $.ajax({
                        url: "<?php echo base_url();?>admin/website_online/update",
                        method: "POST",
                        data: {  
                            txt_no_wo       : txt_no_wo,
                            txt_title_wo    : txt_title_wo,
                            txt_owner_wo    : txt_owner_wo
                        },
                        success:function(data){
                            location.reload('/admin/website_online');
                        },
                        error:function(){
                            toastr.error("ERROR!");
                        }
                    });
                } else {
                    toastr.error("ERROR: Minimum of 5 characters - owners name!");
                }
            } else {
                toastr.error("ERROR: Minimum of 5 characters - title!");
            }
        });

        $('#btn_create_coa_save').click(function(){
            var txt_create_coa_fname    = $('#txt_create_coa_fname').val();
            var txt_create_coa_lname    = $('#txt_create_coa_lname').val();
            var txt_create_coa_uname    = $('#txt_create_coa_uname').val();
            var txt_create_coa_email    = $('#txt_create_coa_email').val();
            var txt_create_coa_pword    = $('#txt_create_coa_pword').val();
            var txt_create_coa_conpword = $('#txt_create_coa_conpword').val();

            var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_create_coa_fname);
            var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_create_coa_lname);
            var checkUname      = /\w$/.test(txt_create_coa_uname);
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_create_coa_email);

            if ( checkFname ) {
                if ( checkLname ) {
                    if ( checkUname ) {
                        if ( checkEmail ) {
                            if ( txt_create_coa_pword.length >= 7 ) {
                                if ( txt_create_coa_pword == txt_create_coa_conpword ) {
                                    $.ajax ({
                                        url: "<?php echo base_url(); ?>admin/co_administrator/create",
                                        method: "POST",
                                        data: {
                                            txt_create_coa_fname    : txt_create_coa_fname,
                                            txt_create_coa_lname    : txt_create_coa_lname,
                                            txt_create_coa_uname    : txt_create_coa_uname,
                                            txt_create_coa_email    : txt_create_coa_email,
                                            txt_create_coa_pword    : txt_create_coa_pword
                                        },
                                        success:function(data){
                                            location.reload('/admin/co_administrator');
                                        },
                                        error:function(){
                                            toastr.error("Error: Please refresh the page or contact the administrator");
                                        }
                                    });
                                } else {
                                    toastr.error("ERROR: Password doesn't match");
                                }
                            } else {
                                toastr.error("ERROR: Minimum of 7 characters");
                            }
                        } else {
                            toastr.error("ERROR: Invalid email address format");
                        }
                    } else {
                        toastr.error("ERROR: Invalid username format");
                    }
                } else {
                    toastr.error("ERROR: Letters only");
                }
            } else {
                toastr.error("ERROR: Letters only");
            }
        });

        $('#btn_update_coa').click(function(){
            var txt_update_coa_no   = $('#txt_update_coa_no').val();
            var txt_select_perm_coa = $('#txt_select_perm_coa').val();

            if ( txt_select_perm_coa != "" ) {
                $.ajax({
                    url: "<?php echo base_url();?>admin/co_administrator/update",
                    method: "POST",
                    data: {  
                        txt_update_coa_no     : txt_update_coa_no,
                        txt_select_perm_coa   : txt_select_perm_coa  
                    },
                    success:function(data){
                        location.reload('/admin/co_administrator');
                        // alert(data);
                    },
                    error:function(){
                        toastr.error("ERROR!");
                    }
                });
            } else {
                toastr.error("Please select a permission!");
            }
        });

        $('#btn_create_agent').click(function(){
            var txt_fname_agent     = $('#txt_fname_agent').val();
            var txt_lname_agent     = $('#txt_lname_agent').val();
            var txt_uname_agent     = $('#txt_uname_agent').val();
            var txt_email_agent     = $('#txt_email_agent').val();
            var txt_password_agent  = $('#txt_password_agent').val();
            var txt_confirm_agent   = $('#txt_confirm_agent').val();

            var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_fname_agent);
            var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_lname_agent);
            var checkUname      = /\w$/.test(txt_uname_agent);
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_email_agent);

            if ( checkFname ) {
                if ( checkLname ) {
                    if ( checkUname ) {
                        if ( checkEmail ) {
                            if ( txt_password_agent.length >= 7 ) {
                                if ( txt_password_agent == txt_confirm_agent ) {
                                    $.ajax ({
                                        url: "<?php echo base_url(); ?>admin/agent/create",
                                        method: "POST",
                                        data: {
                                            txt_fname_agent     : txt_fname_agent,
                                            txt_lname_agent     : txt_lname_agent,
                                            txt_uname_agent     : txt_uname_agent,
                                            txt_email_agent     : txt_email_agent,
                                            txt_password_agent  : txt_password_agent
                                        },
                                        success:function(data){
                                            location.reload('/admin/agent');
                                        },
                                        error:function(){
                                            toastr.error("Error: Please refresh the page or contact the administrator");
                                        }
                                    });
                                } else {
                                    toastr.error("ERROR: Password doesn't match");
                                }
                            } else {
                                toastr.error("ERROR: Minimum of 7 characters");
                            }
                        } else {
                            toastr.error("ERROR: Invalid email address format");
                        }
                    } else {
                        toastr.error("ERROR: Invalid username format");
                    }
                } else {
                    toastr.error("ERROR: Letters only");
                }
            } else {
                toastr.error("ERROR: Letters only");
            }

        });

        $('#btn_update_paypal_account').click(function(){
            var txt_paypal_no           = $('#txt_paypal_no').val();
            var txt_paypal_email_upd    = $('#txt_paypal_email_upd').val();
            var paypal_email_status     = $('#paypal_email_status').val();
            if ( txt_paypal_email_upd ) {
                $.ajax ({
                    url: "<?php echo base_url(); ?>admin/paypal_configuration/update",
                    method: "POST",
                    data: {
                        txt_paypal_no           :   txt_paypal_no,
                        txt_paypal_email_upd    :   txt_paypal_email_upd,
                        paypal_email_status     :   paypal_email_status
                    },
                    success:function(data){
                        location.reload('/paypal_configuration');
                    },
                    error:function(){
                        toastr.error("Error: Please refresh the page or contact the administrator");
                    }
                });
            } else {
                $('#error_message_paypal').text('ERROR: No email address found!');
            }
        });
        
        $('#btn_paypal_save_new').click(function(){
            var paypal_email = $('#txt_paypal_email').val();
            var checkEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(paypal_email);
            if ( paypal_email ) {
                if ( checkEmail ) {
                    $.ajax ({
                        url: "<?php echo base_url(); ?>admin/paypal_configuration/create",
                        method: "POST",
                        data: {
                            paypal_email : paypal_email
                        },
                        success:function(data){
                            location.reload('/paypal_configuration');
                        },
                        error:function(){
                            toastr.error('ERROR: Please refresh the page!');
                        }
                    });
                } else {
                    $('#error_message_paypal').text('ERROR: Email address is invalid!');
                }
            } else {
                $('#error_message_paypal').text('ERROR: No email address found!');
            }
        });

        function clearAllErrorMessage()
        {
            $('#error_cm_subject').text('');
            $('#error_cm_message').text('');
        }

        $('#cm_create').click(function(){
            var email = $('#cm_email').val();
            var subject = $('#cm_subject').val();
            var message = $('#cm_message').val();
            if ( email ) {

                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/message/checkEmail',
                    method: "POST",
                    data: {
                        email    :     $('#cm_email').val()
                    },
                    success:function(data){
                        if ( data == 0 ) {
                            $('#error_cm_email').text('  ERROR: Email address is invalid!');
                            // alert('asdf');
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

        $('#cm_email').on('input',function(e){
            var email = $('#cm_email').val();
            if ( email.length >= 10 ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/message/checkEmail',
                    method: "POST",
                    data: {
                        email    :     $('#cm_email').val()
                    },
                    success:function(data){
                        if ( data == 0 ) {
                            $('#error_cm_email').text('  ERROR: Email address is invalid!');
                            // alert('asdf');
                        } else {
                            $('#error_cm_email').text('');
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });            
            } else {
                $('#error_cm_email').text('');
            }
        });

        $('#messageReply').keypress(function(event) {
            if (event.keyCode == 13 && !event.shiftKey) {
                if ( $('#messageReply').val() ) {
                    $.ajax ({
                        url: '<?php echo base_url(); ?>admin/message/insert_reply',
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

        <?php 
            if ( $this->curpage == "Dashboard" ) {
                if ( !empty ($get_all_issue_tracker) ) {
                    foreach ( $get_all_issue_tracker as $gait ) :
        ?>
                        $('#replyforIssueID<?php echo $gait->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#replyforIssueID<?php echo $gait->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>admin/dashboard/insert_reply',
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
                                url: '<?php echo base_url(); ?>admin/dashboard/getReplyIssueTracker',
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

        // CHOSEN
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
        //  END CHOSEN

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
          valueNames: [ 'name', 'contact', 'email', 'title', 'username', 'date', 'link' ]
        };

        var searchList = new List('search', options);  

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
                            data: [9000, 6000, 0, 0, 0, 0, 0,0,0,0,0,0]
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

    <?php if ( $this->curpage == 'Reports' ) { ?>
        $(document).ready(function(){

            // START - USER
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(35,198,200,0.9)",
                        strokeColor: "rgba(35,198,200,0.9)",
                        pointColor: "rgba(237,85,101,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(237,85,101,1)",
                        data: [65, 59, 40, 51, 36, 25, 40]
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


            var ctx = document.getElementById("lineChartUser").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
            // END - USER

            // START - USER ACTIVITY
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [48, 48, 60, 39, 56, 37, 30]
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
            // END - USER ACTIVITY

            // START - SALES
            new Chartist.Bar('#ct-chart4', {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                series: [
                    [5, 4, 3, 7, 5, 10, 3]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: true,
                horizontalBars: true,
                axisY: {
                    offset: 70
                }
            });

            // END - SALES
        });
    <?php } ?>
</script>