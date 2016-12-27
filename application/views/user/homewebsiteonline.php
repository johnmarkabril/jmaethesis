<div class="">
    <div class="container">
        <div class="navy-line padding-top"></div>
    	<h2 class="no-margin padding-top text-bold">
    		Website Online 
    	</h2>
    	<div>
    		Our web templates being rented.
    	</div>

    	<div class="row padding-top-bottom">
            <?php
                if ( !empty($get_all_rented_templates_limit) ) {
                    foreach ( $get_all_rented_templates_limit as $gartl ) :
            ?>
                		<div class="col-md-3">
                			<div class="ibox-content product-box">
                                <div>
                					<img src="<?php echo base_url(); ?>public/img/template/<?php echo $gartl->IMAGEURL; ?>" class="img-responsive" />
                                </div>
                                <div class="product-desc">
                                    
                                    <a href="#" class="product-name" style="height: 44px;"> <?php echo $gartl->TEMPLATENAME; ?></a>



                                    <div class="small m-t-xs" style="height: 30px">
                                        <?php echo $gartl->LIBRARYUSE; ?>
                                    </div>
                                    <div class="m-t text-righ">
                                        <a href="#" class="btn btn-xs btn-outline btn-link">See this site</i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    endforeach;
                    for ( $ctr = 1 ; $ctr <= $rented_limit_ctr - $numrows_rented_limit; $ctr++  ) {
            ?>      
                        <div class="col-md-3">
                            <div class="ibox-content product-box">
                                <div>
                                    <img src="<?php echo base_url(); ?>public/img/template/noimage.jpg" class="img-responsive" />
                                </div>
                                <div class="product-desc">
                                    <div class="product-name" style="height: 44px;"> TEMPLATE NAME</div>
                                    <div class="small m-t-xs" style="height: 30px">
                                        LIBRARY / FRAMEWORK USED
                                    </div>
                                    <div class="m-t text-righ">
                                        <a href="#" class="btn btn-xs btn-outline btn-link">See this site</i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    for ( $ctr = 1; $ctr <= 4; $ctr++ ) {
            ?>
                        <div class="col-md-3">
                            <div class="ibox-content product-box">
                                <div>
                                    <img src="<?php echo base_url(); ?>public/img/template/noimage.jpg" class="img-responsive" />
                                </div>
                                <div class="product-desc">
                                    
                                    <a href="#" class="product-name" style="height: 44px;"> TEMPLATE NAME</a>



                                    <div class="small m-t-xs">
                                        LIBRARY / FRAMEWORK USED
                                    </div>
                                    <div class="m-t text-righ">
                                        <a href="#" class="btn btn-xs btn-outline btn-link">See this site</i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
        <a href="<?php echo base_url(); ?>online" class="padding-bottom"> See more online site </a>
    </div>
</div>