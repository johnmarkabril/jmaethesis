<nav class="nav2 navbar navbar-default no-margin no-border-radius padding-all" style="background-color: #0076BE;font-size: 11px;">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="text-center">
                <ul class="nav navbar-nav" style="display: inline-block;">
                    <li><a class="no-padding" href="<?php echo base_url();?>">
                    <img class="img-responsive" src="<?php echo base_url(); ?>public/img/logo4.png" style="height: 50px;width:200px; padding: 5px;" /></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <ul class="nav navbar-nav" style="display: inline-block;">

                    <div class="text-center">
                    <ul class="nav navbar-nav" style="display: inline-block;">

                        <li class="text-center">
                            <a class="hvr-underline-reveal" href="<?php echo base_url();?>blog"><strong>Blog</strong></a>
                        </li>

                        <li class="text-center">
                            <a class="hvr-underline-reveal" class="" href="<?php echo base_url();?>events"><strong>Events</strong></a>
                        </li>

                        <li class="text-center">
                            <a class="hvr-underline-reveal" class="" href="<?php echo base_url();?>testimonial"><strong>Testimonial</strong></a>
                        </li>

                        <?php
                            if( !$this->session->userdata('user_session') ){
                        ?>
                                <li class="dropdown">
                                <a class="dropdown-toggle hvr-underline-reveal" data-toggle="dropdown">Log In <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-lr animated slideInRight padding-all" role="menu" style="min-width: 220px;">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <div class="padding-top" style="color:#F0A32F;">
                                                    <h4 class="modal-title">Login here</h4>
                                                    <small>Please fill-up the fields below.</small>
                                                </div>
                                            </div>
                                            <?php
                                                if( !$this->session->userdata('user_session') ){
                                                    echo form_open('Login');
                                            ?>
                                                    
                                                    <div class="form-group padding-top">
                                                        <label style="color:#F0A32F;">Email Address</label>
                                                        <input type="text" class="form-control" name="login_email" id="login-email" autocomplete="off"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="color:#F0A32F;">Password</label>
                                                        <input type="password" class="form-control" name="login_password" id="login-password" autocomplete="off" />
                                                    </div>

                                                    <div class="form-group no-margin">
                                                        <input type="submit" class="btn btn-primary full-width" value="Login"/>
                                                        <div class="row padding-top">
                                                            <div class="col-md-12">
                                                                <div class="text-center">
                                                                    <small class="text-center"><a href="#" style="color:#F0A32F;">Forgot your Password?</a></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="text-center">
                                                                    <small class="text-center"><a href="#" style="color:#F0A32F;">Create an Account?</a></small>
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
                                </li>
                        <?php
                            } else {
                        ?>

                                <li class="text-center">
                                    <a class="hvr-underline-reveal" href="#" ><strong>Profile</strong></a>
                                </li>

                                <li class="text-center">
                                    <a class="hvr-underline-reveal" href="<?php echo base_url(); ?>logout" ><strong>Logout</strong></a>
                                </li>
                        <?php
                            }
                        ?>

                    </ul>
            </div>
        </div>
    </div>
</nav>

<?php 
    $this->load->view('login');
?>