<div class="container">
    <div class="navy-line padding-top"></div>
    <h2 class="no-margin padding-top text-bold">
        Our Team
    </h2>
    <div>
       <!--  Help to make JMAE Site Provider possible -->
       Developers that make JMAE Site Provider
    </div>
    <div class="padding-top-bottom">
        <?php
            if ( !empty($get_all_team) ) {
                foreach ( $get_all_team as $gat ) :
        ?>
                	<div class="col-md-6">
                        <div class="team-member wow zoomIn">
                            <img src="<?php echo base_url();?>public/img/<?php echo $gat->IMAGEURL; ?>" class="img-responsive img-circle" alt="" style="width: 100px;height: 100px;">
                            <h4><span class="navy"><?php echo $gat->FIRSTNAME; ?></span> <?php echo $gat->LASTNAME; ?></h4>
                            <p><?php echo $gat->DESCRIPTION; ?></p>
                            <ul class="list-inline social-icon">
                                <li><a href="<?php echo $gat->FACEBOOK; ?>"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="<?php echo $gat->TWITTER; ?>"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
        <?php
                endforeach;
            }
        ?>
    </div>
</div>