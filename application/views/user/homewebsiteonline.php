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



                                    <div class="small m-t-xs">
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
                }
            ?>
        </div>
        <a href="#" class="padding-bottom"> See more online site </a>
    </div>
</div>