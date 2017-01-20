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
                                <small class="text-center"><a href="#" id="navtop-login-color">Forgot your Password?</a></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <small class="text-center"><a href="#" id="navtop-login-color">Create an Account?</a></small>
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