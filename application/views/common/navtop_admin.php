

<nav class="navbar navbar-static-top no-margin-bottom padding-left-right bg-white" role="navigation">
    <ul class="nav navbar-top-links navbar-left text-center">
        <center>
            <img src="<?php echo base_url(); ?>public/img/logo5.png" class="img-responsive " style="height: 60px;width:150px;"/>
        </center>
        <!-- <h2 class="pad-left text-color-def text-bold">JMAE SITE PROVIDER</h2> -->
    </ul>

    <ul class="nav navbar-top-links navbar-right text-center">

        <a class="navbar-minimalize" href="#"><i class="fa fa-bars"></i> </a>
       <!--  <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>  <span class="label label-warning"><?php echo $get_all_notification_rows;?></span>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <?php 
                    if ( ! empty($get_notification) ) {
                        foreach ( $get_notification as $gn ) :
                ?>
                            <li>
                                <div class="dropdown-messages-box" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="pull-left">
                                                <img alt="image" class="img-circle cus-img-width-mes" src="<?php echo base_url(); ?>public/img/prof/<?php echo $gn->IMAGEURL; ?>">
                                            </a>
                                            <div class="media-body">
                                                <strong><?php echo $gn->NAME;?></strong> <?php echo $gn->CONTENT; ?>. <br>
                                                <small class="text-muted"><?php echo $gn->DATE." ".$gn->HOUR;?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                <?php 
                        endforeach;
                    }
                ?>
            </ul>
        </li> -->
        <li>
            <a href="<?php echo base_url(); ?>logout">Log out</a>
        </li>
    </ul>
</nav>

