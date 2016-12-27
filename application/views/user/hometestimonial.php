<div class="gray-section padding-bottom-sixty">
    <div class="container">
        <div class="navy-line padding-top"></div>
        <h2 class="no-margin padding-top text-bold">
            Testimonials
        </h2>
        <div>
            People Say About JMAE Site Provider
        </div>
        <div class="padding-top-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="owl-carousel">
                        <?php 
                            if ( !empty($get_all_testimonial) ) {
                                foreach ( $get_all_testimonial as $gat ) :
                        ?>
                                    <div class="testimonial">
                                        <div class="testimonial-content">
                                            <p class="description">
                                                " <?php echo $gat->DESCRIPTION; ?> "
                                            </p>
                                        </div>
                                        <div class="pic">
                                            <img src="<?php echo base_url();?>public/img/<?php echo $gat->IMAGEURL; ?>" alt="" >
                                        </div>
                                        <h3><a href="#"><?php echo $gat->NAME; ?></a></h3>
                                        <span ><?php echo $gat->JOB; ?></span>
                                    </div>
                        <?php
                                endforeach; 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>