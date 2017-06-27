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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5h8RE_Re9V9PJ-ROp7TKXQBKbMnWXDVE&callback=initMap">
    </script>
<?php } ?>

<?php if ( $this->curpage == 'Reports' ) { ?>
    <script src="<?php echo base_url();?>public/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?php echo base_url();?>public/js/plugins/chartist/chartist.min.js"></script>
<?php } ?>

<?php if ( $this->curpage == "Profile" ) { ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5h8RE_Re9V9PJ-ROp7TKXQBKbMnWXDVE&callback=initMap">
    </script>
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
        function tError(message){
            toastr.error("Error: "+ message +"!");
        }   

        $('#btn_latlong_submit_user').click(function(){
            var txt_lat_prof    = $('#txt_lat_prof_user').val();
            var txt_long_prof   = $('#txt_long_prof_user').val();
            if ( txt_lat_prof && txt_long_prof ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>profile/updateLocation',
                    method: "POST",
                    data: {
                        txt_lat_prof    : txt_lat_prof,
                        txt_long_prof   : txt_long_prof
                    },
                    success:function(data){
                        location.reload('/agent/profile');
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                tError('Select your place');
            }
        });

        $('#btn_latlong_submit').click(function(){
            var txt_lat_prof    = $('#txt_lat_prof').val();
            var txt_long_prof   = $('#txt_long_prof').val();
            if ( txt_lat_prof && txt_long_prof ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/profile/updateLocation',
                    method: "POST",
                    data: {
                        txt_lat_prof    : txt_lat_prof,
                        txt_long_prof   : txt_long_prof
                    },
                    success:function(data){
                        location.reload('/agent/profile');
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                tError('Select your place');
            }
        });

        $('#btn_submit_change_password_profile_admin').click(function(){
            var txt_current_pword = $('#txt_current_pword_admin').val();
            var txt_pword_changeprofile     = $('#txt_pword_changeprofile_admin').val();
            var txt_conpword_changeprofile  = $('#txt_conpword_changeprofile_admin').val();

            if ( txt_current_pword ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/profile/check_pword',
                    method: "POST",
                    data: {
                        txt_current_pword   : txt_current_pword
                    },
                    success:function(data){
                        if ( data == 1 ) {
                            if ( txt_pword_changeprofile.length >= 6 ) {
                                if ( txt_pword_changeprofile == txt_conpword_changeprofile ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>admin/profile/changePassword',
                                        method: "POST",
                                        data: {
                                            txt_pword_changeprofile   : txt_pword_changeprofile
                                        },
                                        success:function(data){
                                            location.reload('/admin/profile');
                                        },
                                        error:function(){
                                            toastr.error('ERROR: Please refresh the page!');
                                        }
                                    });
                                } else {
                                    tError('Password and confirm password is not the same');
                                }
                            } else {
                                tError('Password must be 6 characters and above');
                            }
                        } else {
                            tError('Current password doesnt match');
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                tError('Current password is empty');
            }
            
        });

        $('#txt_current_pword_admin').keyup(function(){
            var txt_current_pword = $('#txt_current_pword_admin').val();

            $.ajax ({
                url: '<?php echo base_url(); ?>admin/profile/check_pword',
                method: "POST",
                data: {
                    txt_current_pword   : txt_current_pword
                },
                success:function(data){
                    if ( data == 1 ) {
                        $("#txt_pword_changeprofile_admin").prop('disabled', false);
                        $("#txt_conpword_changeprofile_admin").prop('disabled', false);
                    } else {
                        $("#txt_pword_changeprofile_admin").prop('disabled', true);
                        $("#txt_conpword_changeprofile_admin").prop('disabled', true);
                    }
                },
                error:function(){
                    toastr.error('ERROR: Please refresh the page!');
                }
            });
        });

        $('#btn_submit_change_information_profile_admin').click(function(){
            var txt_fname_profile_change    = $('#txt_fname_profile_change_admin').val();
            var txt_lname_profile_change    = $('#txt_lname_profile_change_admin').val();
            var txt_email_profile_change    = $('#txt_email_profile_change_admin').val();
            var txt_uname_profile_change    = $('#txt_uname_profile_change_admin').val();
            var txt_contact_profile_change  = $('#txt_contact_profile_change_admin').val();

            var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_fname_profile_change);
            var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_lname_profile_change);
            var checkUname      = /\w$/.test(txt_uname_profile_change);
            var checkContact    = /^(0|\[0-9]{1,5})?([7-9][0-9]{9})$/.test(txt_contact_profile_change);
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_email_profile_change);

            if ( txt_fname_profile_change ) {
                if ( checkFname ) {
                    if ( txt_lname_profile_change ) {
                        if ( checkLname ) {
                            if ( txt_email_profile_change ) {
                                if ( checkEmail ) {
                                    if ( txt_contact_profile_change ) {
                                        if ( checkContact ) {
                                            $.ajax ({
                                                url: '<?php echo base_url(); ?>admin/profile/changeInformation',
                                                method: "POST",
                                                data: {
                                                    txt_fname_profile_change    : txt_fname_profile_change,
                                                    txt_lname_profile_change    : txt_lname_profile_change,
                                                    txt_email_profile_change    : txt_email_profile_change,
                                                    txt_uname_profile_change    : txt_uname_profile_change,
                                                    txt_contact_profile_change  : txt_contact_profile_change
                                                },
                                                success:function(data){
                                                    location.reload('/admin/profile');
                                                },
                                                error:function(){
                                                    toastr.error('ERROR: Please refresh the page!');
                                                }
                                            });
                                        } else {
                                            tError('Invalid format of contact');
                                        }
                                    } else {
                                        tError('Contact field is empty');
                                    }
                                } else {
                                    tError('Invalid format of ');
                                }
                            } else {
                                tError(' field is empty');
                            }
                        } else {
                            tError('Invalid format of ');
                        }
                    } else {
                        tError(' field is empty');
                    }
                } else {
                    tError('Invalid format of ');
                }
            } else {
                tError('Firstname field is empty');
            }
        });

        $('#btn_submit_change_password_profile').click(function(){
            var txt_current_pword = $('#txt_current_pword').val();
            var txt_pword_changeprofile     = $('#txt_pword_changeprofile').val();
            var txt_conpword_changeprofile  = $('#txt_conpword_changeprofile').val();
            if ( txt_current_pword ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>profile/check_pword',
                    method: "POST",
                    data: {
                        txt_current_pword   : txt_current_pword
                    },
                    success:function(data){
                        if ( data == 1 ) {
                            if ( txt_pword_changeprofile.length >= 6 ) {
                                if ( txt_pword_changeprofile == txt_conpword_changeprofile ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>profile/changePassword',
                                        method: "POST",
                                        data: {
                                            txt_pword_changeprofile   : txt_pword_changeprofile
                                        },
                                        success:function(data){
                                            location.reload('/profile');
                                        },
                                        error:function(){
                                            toastr.error('ERROR: Please refresh the page!');
                                        }
                                    });
                                } else {
                                    tError('Password and confirm password is not the same');
                                }
                            } else {
                                tError('Password must be 6 characters and above');
                            }
                        } else {
                            tError('Current password doesnt match');
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                tError('Current password is empty');
            }
            
        });

        $('#txt_current_pword').keyup(function(){
            var txt_current_pword = $('#txt_current_pword').val();

            $.ajax ({
                url: '<?php echo base_url(); ?>profile/check_pword',
                method: "POST",
                data: {
                    txt_current_pword   : txt_current_pword
                },
                success:function(data){
                    if ( data == 1 ) {
                        $("#txt_pword_changeprofile").prop('disabled', false);
                        $("#txt_conpword_changeprofile").prop('disabled', false);
                    } else {
                        $("#txt_pword_changeprofile").prop('disabled', true);
                        $("#txt_conpword_changeprofile").prop('disabled', true);
                    }
                },
                error:function(){
                    toastr.error('ERROR: Please refresh the page!');
                }
            });
        });

        $('#btn_submit_change_information_profile').click(function(){
            var txt_fname_profile_change    = $('#txt_fname_profile_change').val();
            var txt_lname_profile_change    = $('#txt_lname_profile_change').val();
            var txt_email_profile_change    = $('#txt_email_profile_change').val();
            var txt_uname_profile_change    = $('#txt_uname_profile_change').val();
            var txt_contact_profile_change  = $('#txt_contact_profile_change').val();

            var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_fname_profile_change);
            var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_lname_profile_change);
            var checkUname      = /\w$/.test(txt_uname_profile_change);
            var checkContact    = /^(0|\[0-9]{1,5})?([7-9][0-9]{9})$/.test(txt_contact_profile_change);
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_email_profile_change);

            if ( txt_fname_profile_change ) {
                if ( checkFname ) {
                    if ( txt_lname_profile_change ) {
                        if ( checkLname ) {
                            if ( txt_email_profile_change ) {
                                if ( checkEmail ) {
                                    if ( txt_contact_profile_change ) {
                                        if ( checkContact ) {
                                            $.ajax ({
                                                url: '<?php echo base_url(); ?>profile/changeInformation',
                                                method: "POST",
                                                data: {
                                                    txt_fname_profile_change    : txt_fname_profile_change,
                                                    txt_lname_profile_change    : txt_lname_profile_change,
                                                    txt_email_profile_change    : txt_email_profile_change,
                                                    txt_uname_profile_change    : txt_uname_profile_change,
                                                    txt_contact_profile_change  : txt_contact_profile_change
                                                },
                                                success:function(data){
                                                    location.reload('/profile');
                                                },
                                                error:function(){
                                                    toastr.error('ERROR: Please refresh the page!');
                                                }
                                            });
                                        } else {
                                            tError('Invalid format of contact');
                                        }
                                    } else {
                                        tError('Contact field is empty');
                                    }
                                } else {
                                    tError('Invalid format of ');
                                }
                            } else {
                                tError(' field is empty');
                            }
                        } else {
                            tError('Invalid format of ');
                        }
                    } else {
                        tError(' field is empty');
                    }
                } else {
                    tError('Invalid format of ');
                }
            } else {
                tError('Firstname field is empty');
            }
        });

        $('#btn_issue_tracker_user').click(function(){
            var txt_title_isu   = $('#txt_title_isu').val();
            var txt_desc_isu    = $('#txt_desc_isu').val();
            if ( txt_title_isu ) {
                if ( txt_desc_isu ) {
                    $.ajax ({
                        url: '<?php echo base_url(); ?>profile/newIssueTracker',
                        method: "POST",
                        data: {
                            txt_title_isu   : txt_title_isu,
                            txt_desc_isu    : txt_desc_isu
                        },
                        success:function(data){
                            location.reload('/profile/issue_tracker');
                        },
                        error:function(){
                            toastr.error('ERROR: Please refresh the page!');
                        }
                    });
                } else {
                    toastr.error("Error: Description must not be blank!");
                }
            } else {
                toastr.error("Error: Title must not be blank!");
            }
        });

        <?php 
            if ( $curpage == "Issue Tracker" && $this->session->userdata('account_type') == "User" ) {
                if ( !empty ($get_all_issue_tracker) ) {
                    foreach ( $get_all_issue_tracker as $gait ) :
        ?>
                        $('#replyforIssueIDUSER<?php echo $gait->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#replyforIssueIDUSER<?php echo $gait->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>profile/insert_reply_it',
                                        method: "POST",
                                        data: {
                                            issueTrackerNo      :   '<?php echo $gait->NO; ?>',
                                            issueTrackerReply   :   $('#replyforIssueIDUSER<?php echo $gait->NO; ?>').val()
                                        },
                                        success:function(data){
                                            location.reload('/profile/issue_tracker');
                                            // alert(data);
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

                        $("#replyIDUSER<?php echo $gait->NO; ?>").click(function(){
                            $.ajax ({
                                url: '<?php echo base_url(); ?>profile/getReplyIssueTracker',
                                method: "POST",
                                data: {
                                    no           : $("#replyNO<?php echo $gait->NO; ?>").val()
                                },
                                success:function(data){
                                    $("#dataBodyIssueTrackerProfile<?php echo $gait->NO; ?>").html(data);
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

        <?php 
            if ( $curpage == 'Profile' && $this->session->userdata('account_type') == "User" ) {
                if ( !empty($get_all_post) ) {
                    foreach ( $get_all_post as $gap ) :
        ?>
                        $('#adminReplyPost<?php echo $gap->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#adminReplyPost<?php echo $gap->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>profile/insert_reply',
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
                            url: "<?php echo base_url();?>profile/create",
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
                                $('#newPostUser').append(html);
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

        <?php 
            if ( $curpage == 'Home' ) {
                if ( !empty($get_all_available_templates) ) {
                    foreach ( $get_all_available_templates as $gaat ) :
        ?>
                        $('#btn_back_rts<?php echo $gaat->NO; ?>').click(function(){
                            $('#first_form_rts<?php echo $gaat->NO; ?>').show();
                            $('#second_form_rts<?php echo $gaat->NO; ?>').hide();
                        });

                        $('#btn_submit_rts<?php echo $gaat->NO; ?>').click(function(){
                            var txt_no_rts          = $('#txt_no_rts<?php echo $gaat->NO; ?>').val();
                            var txt_period_rts      = $('#txt_period_rts<?php echo $gaat->NO; ?>').val();
                            var txt_subdomain_rts   = $('#txt_subdomain_rts<?php echo $gaat->NO; ?>').val();
                            var txt_jmaedomain_rts  = $('#txt_jmaedomain_rts<?php echo $gaat->NO; ?>').val();
                            var checkSubDomain      = /^[a-zA-Z-_]*$/.test(txt_subdomain_rts);
                            var arrayCustom = '';
                            if ( txt_period_rts ) { 
                                if ( txt_subdomain_rts ) {
                                    if ( checkSubDomain ) {
                                        arrayCustom = 'subdomain='+txt_subdomain_rts+txt_jmaedomain_rts+'&'+txt_period_rts;
                                        $('#custom_js_rts<?php echo $gaat->NO; ?>').val(arrayCustom);
                                        $('#first_form_rts<?php echo $gaat->NO; ?>').hide();
                                        $('#second_form_rts<?php echo $gaat->NO; ?>').show();
                                        $('#item_price<?php echo $gaat->NO; ?>').val(txt_period_rts.substring(23));
                                    } else {
                                        toastr.error('Error: Letters only on sub-domain!');
                                    }
                                } else {
                                    toastr.error('Error: Sub-domain not found!');
                                }
                            } else {
                                toastr.error('Error: Select a period of time!');
                            }
                        });
        <?php
                    endforeach;
                }
            }
        ?>

        $('#btn_changepword_fp').click(function(){
            var txt_email_fp        = $('#txt_email_fp').val();
            var txt_pword_fp        = $('#txt_pword_fp').val();
            var txt_conpword_fp     = $('#txt_conpword_fp').val();
            if ( txt_pword_fp.length >= 6 ) {
                if ( txt_pword_fp == txt_conpword_fp ) {
                    $.ajax ({
                        url: "<?php echo base_url(); ?>signup/reset_password",
                        method: "POST",
                        data: {
                            txt_pword_fp    : txt_pword_fp,
                            txt_email_fp    : txt_email_fp
                        },
                        success:function(data){
                            $('#third_forgotpassword_form').hide();
                            $('#fourth_forgotpassword_form').show();
                        },
                        error:function(){
                            toastr.error('ERROR: Please refresh the page!');
                        }
                    });
                } else {
                    toastr.error('ERROR: Password and confirm password doesnt match!');
                }
            } else {
                toastr.error('ERROR: Password must be at least 6 characters!');
            }
        });

        $('#btn_submit_fp').click(function(){
            var txt_email_fp                = $('#txt_email_fp').val();
            var txt_verificationcode_fp     = $('#txt_verificationcode_fp').val();

            if ( txt_verificationcode_fp ) {
                $.ajax ({
                    url: "<?php echo base_url(); ?>signup/verify_fp",
                    method: "POST",
                    data: {
                        txt_verificationcode_fp     : txt_verificationcode_fp,
                        txt_email_fp                : txt_email_fp
                    },
                    success:function(data){
                        if ( data == 1 ) {
                            toastr.success("You can now change your password!");
                            $('#first_forgotpassword_form').hide();
                            $('#second_forgotpassword_form').hide();
                            $('#third_forgotpassword_form').show();
                        } else {
                            toastr.error('ERROR: Verification code is incorrect!');
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('Error: Incomplete field!');
            }
        });

        $('#btn_submit_email_fp').click(function(){
            var txt_email_fp            = $('#txt_email_fp').val();
            var randomCode              = randomString();
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_email_fp);
            if ( txt_email_fp ) {
                if ( checkEmail ) {
                    $.ajax ({
                        url: "<?php echo base_url(); ?>signup/forgotpassword_send",
                        method: "POST",
                        data: {
                            txt_email_fp    : txt_email_fp,
                            randomCode      : randomCode
                        },
                         success:function(data){
                            if ( data == 1 ) {
                                toastr.success("We send your verification code on your email provided!");
                                $('#first_forgotpassword_form').hide();
                                $('#second_forgotpassword_form').show();
                            } else {
                                toastr.error("Email address is not registered!");
                            }
                        },
                        error:function(){
                            toastr.error('ERROR: Please refresh the page!');
                        }
                    });
                } else {
                    toastr.error('ERROR: Invalid Email address format');
                }
            } else{
                toastr.error('ERROR: Email address is incomplete!')
            }
            
        });

        $('#resend_code_vc').click(function(){
            var txt_email_vc            = $('#txt_email_vc').val();
            var randomCode              = randomString();
            $.ajax ({
                url: "<?php echo base_url(); ?>signup/resend",
                method: "POST",
                data: {
                    txt_email_vc    : txt_email_vc,
                    randomCode      : randomCode
                },
                 success:function(data){
                    toastr.success("We re-send your verification code on your email provided!");
                },
                error:function(){
                    toastr.error('ERROR: Please refresh the page!');
                }
            });
        });

        $('#btn_submit_vc').click(function(){
            var txt_verificationcode_vc = $('#txt_verificationcode_vc').val();
            var txt_email_vc            = $('#txt_email_vc').val();

            if ( txt_verificationcode_vc ) {
                $.ajax ({
                    url: "<?php echo base_url(); ?>signup/verify",
                    method: "POST",
                    data: {
                        txt_verificationcode_vc     : txt_verificationcode_vc,
                        txt_email_vc                : txt_email_vc
                    },
                    success:function(data){
                        if ( data == 1 ) {
                            $('#modalVerificationCode').modal('hide');
                            $('#modalSuccessSignup').modal('show');
                            $('#txt_verificationcode_vc').val('');
                            $('#reopen_verification_code').hide();
                        } else {
                            toastr.error('ERROR: Verification code is incorrect!');
                        }
                    },
                    error:function(){
                        toastr.error('ERROR: Please refresh the page!');
                    }
                });
            } else {
                toastr.error('Error: Incomplete field!');
            }
        });

        function randomString() {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 8;
            var randomstring = '';
            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            return randomstring;
        }

        $('#btn_submit_signup').click(function(){
            var txt_firstname_signup    = $('#txt_firstname_signup').val();
            var txt_lastname_signup     = $('#txt_lastname_signup').val();
            var txt_username_signup     = $('#txt_username_signup').val();
            var txt_contact_signup      = $('#txt_contact_signup').val();
            var txt_email_signup        = $('#txt_email_signup').val();
            var txt_pword_signup        = $('#txt_pword_signup').val();
            var txt_conpword_signup     = $('#txt_conpword_signup').val();
            var randomCode              = randomString();

            var checkFname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_firstname_signup);
            var checkLname      = /^[a-zA-Z-_]+( [a-zA-Z-_]+)*$/.test(txt_lastname_signup);
            var checkContact    = /^(0|\[0-9]{1,5})?([7-9][0-9]{9})$/.test(txt_contact_signup);
            var checkEmail      = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(txt_email_signup);
            if ( txt_firstname_signup ) {
                if ( checkFname ) {
                    if ( txt_lastname_signup ) {
                        if ( checkLname ) {
                            if ( txt_username_signup ) {
                                if ( txt_contact_signup ) {
                                    if ( checkContact ) {
                                        if ( txt_email_signup ) {
                                            if ( checkEmail ) {
                                                if ( txt_pword_signup.length >= 6 ) {
                                                    if ( txt_pword_signup == txt_conpword_signup ) {
                                                        <?php
                                                            if ( !empty($all_email) ) {
                                                        ?>  
                                                                if ( jQuery.inArray( txt_email_signup, <?php echo $all_email; ?> ) !== -1 ) {
                                                                    toastr.error("Email address is already registered!");
                                                                } else {
                                                                    $.ajax({
                                                                        url: "<?php echo base_url();?>signup/create",
                                                                        method: "POST",
                                                                        data: {  
                                                                            txt_firstname_signup    : txt_firstname_signup,
                                                                            txt_lastname_signup     : txt_lastname_signup,
                                                                            txt_username_signup     : txt_username_signup,
                                                                            txt_contact_signup      : txt_contact_signup,
                                                                            txt_email_signup        : txt_email_signup,
                                                                            txt_pword_signup        : txt_pword_signup,
                                                                            randomCode              : randomCode
                                                                        },
                                                                        success:function(data){
                                                                            toastr.success("We send your verification code on your email provided!");
                                                                            $('#txt_email_vc').val(txt_email_signup);

                                                                            $('#txt_firstname_signup').val('');
                                                                            $('#txt_lastname_signup').val('');
                                                                            $('#txt_username_signup').val('');
                                                                            $('#txt_contact_signup').val('');
                                                                            $('#txt_email_signup').val('');
                                                                            $('#txt_pword_signup').val('');
                                                                            $('#txt_conpword_signup').val('');
                                                                            $('#modalVerificationCode').modal('show');
                                                                            $('#reopen_verification_code').show();
                                                                        },
                                                                        error:function(){
                                                                            toastr.error("ERROR: Please reload the page!");
                                                                        }
                                                                    });
                                                                }
                                                        <?php
                                                            }
                                                        ?>
                                                    } else {
                                                        toastr.error('ERROR: Password and confirm password doesnt match!');
                                                    } 
                                                } else {
                                                    toastr.error('ERROR: Password must be atleast 6 characters!');
                                                }   
                                            } else {
                                                toastr.error('ERROR: Invalid Email address format');
                                            }
                                        } else {
                                            toastr.error('ERROR: Email address is incomplete!');
                                        }
                                    } else {
                                        toastr.error('ERROR: Invalid contact format!');
                                    }
                                } else {
                                    toastr.error('ERROR: Contact is incomplete!');
                                }
                            } else {
                                toastr.error('ERROR: Username is incomplete!');
                            }
                        } else {
                            toastr.error('ERROR: Invalid lastname format!');
                        }
                    } else {
                        toastr.error('ERROR: Lastname is incomplete!');
                    }
                } else {
                    toastr.error('ERROR: Invalid firstname format!');
                }
            } else {
                toastr.error('ERROR: Firstname is incomplete!');
            }
        });

        <?php
            if ( $curpage == 'Events' ) {
                if ( !empty($this->session->userdata('user_session')) ) {
                    if ( !empty($get_all_events) ) {
                        foreach ( $get_all_events as $gae ) :
                            $sess = $this->session->userdata('user_session');
        ?>
                            $('#replyEvent<?php echo $gae->NO; ?>').keypress(function(event) {
                                if (event.keyCode == 13 && !event.shiftKey) {
                                    if ( $('#replyEvent<?php echo $gae->NO; ?>').val() != '' ) {
                                        $.ajax ({
                                            url: '<?php echo base_url(); ?>events/insert_reply',
                                            method: "POST",
                                            data: {
                                                replyMessage    :     $('#replyEvent<?php echo $gae->NO; ?>').val(),
                                                messageNo       :     '<?php echo $gae->NO; ?>'
                                            },
                                            success:function(data){
                                                html =  '<div class="padding-top">';
                                                html += '   <div class="row">';
                                                html += '       <div class="col-xs-1">';
                                                html += '           <img style="height:50px;width:50px;" src="<?php echo base_url(); ?>public/img/<?php echo $sess->IMAGEURL; ?>" />';
                                                html += '       </div>';
                                                html += '       <div style="padding-left: 85px;">';
                                                html += '           <div><label><?php echo $sess->FIRSTNAME." ".$sess->LASTNAME; ?></label><?php echo ' - ' . $date; ?></div>';
                                                html += '           <div style="font-size: 15px;">';
                                                html +=                 $('#replyEvent<?php echo $gae->NO; ?>').val();
                                                html += '           </div>';
                                                html += '       </div>';
                                                html += '   </div>';
                                                html += '</div>';

                                                $('#newReplyEvent<?php echo $gae->NO; ?>').append(html);
                                                $('#replyEvent<?php echo $gae->NO; ?>').val('');
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
                }
            }
        ?>

        <?php
            if ( $curpage == 'Blog' ) {
                if ( !empty($this->session->userdata('user_session')) ) {
                    if ( !empty($get_all_blog) ) {
                        foreach ( $get_all_blog as $gar ) :
                            $sess = $this->session->userdata('user_session');
        ?>
                            $('#replyBlog<?php echo $gar->NO; ?>').keypress(function(event) {
                                if (event.keyCode == 13 && !event.shiftKey) {
                                    if ( $('#replyBlog<?php echo $gar->NO; ?>').val() ) {
                                        $.ajax ({
                                            url: '<?php echo base_url(); ?>blog/insert_reply',
                                            method: "POST",
                                            data: {
                                                replyMessage    :     $('#replyBlog<?php echo $gar->NO; ?>').val(),
                                                messageNo       :     '<?php echo $gar->NO; ?>'
                                            },
                                            success:function(data){
                                                html =  '<div class="padding-top">';
                                                html += '   <div class="row">';
                                                html += '       <div class="col-xs-1">';
                                                html += '           <img style="height:50px;width:50px;" src="<?php echo base_url(); ?>public/img/<?php echo $sess->IMAGEURL; ?>" />';
                                                html += '       </div>';
                                                html += '       <div style="padding-left: 85px;">';
                                                html += '           <div><label><?php echo $sess->FIRSTNAME." ".$sess->LASTNAME; ?></label><?php echo ' - ' . $date; ?></div>';
                                                html += '           <div style="font-size: 15px;">';
                                                html +=                 $('#replyBlog<?php echo $gar->NO; ?>').val();
                                                html += '           </div>';
                                                html += '       </div>';
                                                html += '   </div>';
                                                html += '</div>';

                                                $('#newReply<?php echo $gar->NO; ?>').append(html);
                                                $('#replyBlog<?php echo $gar->NO; ?>').val('');
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
                }
            }
        ?>

        <?php 
            if ( $curpage == 'Profile' && $this->session->userdata('account_type') == "Administrator" ) {
                if ( !empty($get_all_post) ) {
                    foreach ( $get_all_post as $gap ) :
        ?>
                        $('#adminReplyPost<?php echo $gap->NO; ?>').keypress(function(event) {
                            if (event.keyCode == 13 && !event.shiftKey) {
                                if ( $('#adminReplyPost<?php echo $gap->NO; ?>').val() ) {
                                    $.ajax ({
                                        url: '<?php echo base_url(); ?>admin/profile/insert_reply',
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
                            url: "<?php echo base_url();?>admin/profile/create",
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
            var ams_no_update               = $("#ams_no_update").val();
            var ams_title_update            = $("#ams_title_update").val();
            var ams_description_update      = $("#ams_description_update").val();
            var ams_active_update           = $("#ams_active_update").val();

            if ( ams_title_update && ams_description_update ) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/about_my_site/update',
                    method: "POST",
                    data: {
                        ams_no_update           : ams_no_update,
                        ams_title_update        : ams_title_update,
                        ams_description_update  : ams_description_update,
                        ams_active_update       : ams_active_update
                    },
                    success:function(data){
                        location.reload('/admin/about_my_site');
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
        // END OF CODE SEARCH
    });
    
    // GOOGLE MAP API CODE START
    function initMap() {
        var mapOptions = {
            zoom: 12,
            center: {lat: 14.5911452, lng: 120.9993137},
                styles: [{"stylers":[{"hue":"#18a689"},{"visibility":"on"},{"invert_lightness":true},{"saturation":40},{"lightness":10}]}]
        };

        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);

        <?php
            if ( $curpage == "Profile" && $this->session->userdata('user_session')->ACCOUNT_TYPE == "Agent" ) {
        ?>
                google.maps.event.addListener(map,'click',function(event) {
                    $('#txt_lat_prof').val(event.latLng.lat());
                    $('#txt_long_prof').val(event.latLng.lng());
                });
        <?php
            }
        ?>

        <?php
            if ( $curpage == "Profile" && $this->session->userdata('user_session')->ACCOUNT_TYPE == "Administrator" ) {
        ?>
                google.maps.event.addListener(map,'click',function(event) {
                    $('#txt_lat_prof').val(event.latLng.lat());
                    $('#txt_long_prof').val(event.latLng.lng());
                });
        <?php
            }
        ?>

        <?php
            if ( $curpage == "Profile" && $this->session->userdata('user_session')->ACCOUNT_TYPE == "User" ) {
        ?>
                google.maps.event.addListener(map,'click',function(event) {
                    $('#txt_lat_prof_user').val(event.latLng.lat());
                    $('#txt_long_prof_user').val(event.latLng.lng());
                });
        <?php
            }
        ?>

        <?php
            if ( $curpage == "Dashboard" ) {
                foreach ( $all_user_latlong as $aul ) : 
        ?>
            <?php 
                if ( $aul->LATITUDE  != 0.0000000 && $aul->LONGHITUDE  != 0.0000000 ) {
            ?>
                var latDB = <?php echo $aul->LATITUDE;?>;
                var longDB = <?php echo $aul->LONGHITUDE;?>;
                    var marker = new google.maps.Marker({
                        position: {lat: latDB, lng: longDB},
                        icon: {
                            url: '<?php echo base_url();?>public/img/<?php echo $aul->IMAGEURL; ?>',
                            scaledSize : new google.maps.Size(35, 35),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(15, 15)
                        },
                        map: map
                    });
            <?php
                }
            ?>

        <?php 
                endforeach; 
            }
        ?>

    }
    // GOOGLE MAP API CODE END

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
                            data: <?php echo $sales_for_year; ?>
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
                        data: <?php echo $usersPerMonth; ?>
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: <?php echo $usersPerMonthPreviousYear; ?>
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
                    <?php echo $salesReport; ?>
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