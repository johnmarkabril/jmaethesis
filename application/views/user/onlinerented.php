<div class=" margin-top-fifty">
    <div class="container">
        <div class="navy-line padding-top"></div>
    	<h2 class="no-margin padding-top text-bold">
    		More website on our server 
    	</h2>
    	<div>
    		Our web templates being rented.
    	</div>

    	<div class="row padding-top-bottom">
            <?php
                if ( !empty($get_all_rented_templates) ) {
                    foreach ( $get_all_rented_templates as $gart ) :
            ?>
                		<div class="col-md-3">
                			<div class="ibox-content product-box">
                                <div>
                					<img src="<?php echo base_url(); ?>public/img/template/<?php echo $gart->IMAGEURL; ?>" class="img-responsive" />
                                </div>
                                <div class="product-desc">
                                    
                                    <a href="#" class="product-name" style="height: 44px;"> <?php echo $gart->TEMPLATENAME; ?></a>



                                    <div class="small m-t-xs" style="height: 30px">
                                        <?php echo $gart->LIBRARYUSE; ?>
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
        </div>    </div>
</div>