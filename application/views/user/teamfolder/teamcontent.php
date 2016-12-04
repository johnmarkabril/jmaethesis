<div class="landing-page">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our Team</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <?php 
            if ( ! empty ($get_team) ) {
                foreach ( $get_team as $gt ) :
        ?>
        <div class="col-sm-6">
            <div class="team-member wow zoomIn">
                <img src="<?php echo base_url(); ?>public/img/<?php echo $gt->IMAGEURL; ?>" style="width:128px;height:128px;" class="img-responsive img-circle" alt="">
                <h4><span class="navy"><?php echo $gt->FIRSTNAME; ?></span> <?php echo $gt->LASTNAME;?></h4>
                <p><?php echo $gt->DESCRIPTION; ?></p>
                <ul class="list-inline social-icon">
                    <li><a href="<?php echo $gt->FACEBOOK; ?>"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="<?php echo $gt->TWITTER; ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
                endforeach;
            } else {
                echo "NOT YET DONE!";
            }
        ?>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
    </div>
</div>