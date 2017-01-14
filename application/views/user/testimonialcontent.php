<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Testimonials</h4>
    </div>
</div>

<div class="padding-top">
	<div class="">
	    <div class="row">
	        <div class="col-md-12">
	            <div id="testimonial-slider" class="owl-carousel">
	            	<?php
	            		if ( !empty($get_all_testimonial) ) {
	            			foreach ( $get_all_testimonial as $gat ) :
	            	?>
				                <div class="testimonial" style="padding-left: 5px;padding-right: 5px;">
				                    <div class="pic">
				                        <img src="<?php echo base_url(); ?>public/img/<?php echo $gat->IMAGEURL; ?>" class="img-responsive">
				                    </div>
				                    <p>
				                        <?php echo $gat->DESCRIPTION; ?>
				                    </p>
				                    <div class="padding-top"></div>
				                    <h3 ><?php echo $gat->NAME; ?> - <?php echo $gat->JOB; ?></h3>
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