<ul class="dropdown-menu dropdown-lr animated slideInRight padding-all" role="menu" style="min-width: 220px;">
    <div class="col-lg-12">
        <div class="text-center">
            <div class="padding-top" id="navtop-login-color">
                <h4 class="modal-title">Login here</h4>
                <small>Please fill-up the fields below.</small>
            </div>
        </div>
        <?php
            if( !$this->session->userdata('user_session') ){
                echo form_open('Login');
        ?>                        
                    <div class="form-group padding-top">
                        <label id="navtop-login-color">Email Address</label>
                        <input type="text" class="form-control" name="login_email" id="login-email" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label id="navtop-login-color">Password</label>
                        <input type="password" class="form-control" name="login_password" id="login-password" autocomplete="off" />
                    </div>
                    <div class="form-group no-margin">
                        <input type="submit" class="btn btn-primary full-width" value="Login"/>
                        <div class="row padding-top">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <small class="text-center"><a data-toggle="modal" data-target="#modalForgotPassword" id="navtop-login-color">Forgot your Password?</a></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <small class="text-center"><a href="<?php echo base_url(); ?>signup" id="navtop-login-color">Create an Account?</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        <?php
            }
        ?>
    </div>
</ul>

<div class="modal inmodal" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Forgot Password</h4>
            </div>
            <div class="modal-body padding-bottom padding-top">
                <div id="first_forgotpassword_form">
                    <div class="ibox-content no-border">
                        <label>Note:</label>
                        <div>You just need to identify your email address to recover your account!</div>
                    </div>
                    <div class="form-group padding-top">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="txt_email_fp"/>
                    </div>
                    <div class="form-group no-margin">
                        <button type="button" class="btn btn-success full-width" id="btn_submit_email_fp">Submit</button>
                    </div>
                </div>
                <div id="second_forgotpassword_form" style="display: none;">
                    <div class="ibox-content no-border">
                        <label>Note:</label>
                        <div>If the verification code is not receive for 5 minutes, just click the resend code below!</div>
                    </div>
                    <div class="form-group padding-top">
                        <label>Verification Code</label>
                        <input type="text" class="form-control text-bold text-center" style="font-size: 20px;height: 40px;" id="txt_verificationcode_fp" />
                    </div>
                    <div class="form-group no-margin">
                        <button type="button" class="btn btn-success full-width" id="btn_submit_fp">Submit</button>
                    </div>
                </div>
                <div id="third_forgotpassword_form" style="display: none;">
                    <div class="ibox-content no-border text-center">
                        <label>Reset your password</label>
                        <div>Change your password to the new one. Don't let anyone know your password.</div>
                        <div class="form-group padding-top">
                            <label>Password</label>
                            <input type="password" class="form-control" id="txt_pword_fp" />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="txt_conpword_fp" />
                        </div>
                        <div class="form-group no-margin">
                            <button type="button" class="btn btn-success full-width" id="btn_changepword_fp">Submit</button>
                        </div>
                    </div>
                </div>
                <div id="fourth_forgotpassword_form" style="display: none;">
                    <div class="ibox-content no-border text-center">
                        <label>Welcome. Your password is reset! </label>
                        <div>Being a JMAE Provider user is wonderful. Good luck and God bless!</div>
                        <div>You can now login to our site.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>