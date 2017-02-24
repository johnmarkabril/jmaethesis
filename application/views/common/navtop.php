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
                                    <?php $this->load->view('login'); ?>
                                </li>
                        <?php
                            } else {
                        ?>

                                <li class="text-center">
                                    <a class="hvr-underline-reveal" href="<?php echo base_url();?>profile" ><strong>Profile</strong></a>
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