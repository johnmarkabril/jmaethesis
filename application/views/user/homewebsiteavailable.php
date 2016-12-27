<div class="gray-section">
    <div class="container padding-bottom">
        <div class="navy-line padding-top"></div>
        <h2 class="no-margin padding-top text-bold">
            Templates Available 
        </h2>
        <div>
            Since 2016 we develop a lot of templates. New templates added below.
        </div>

        <div class="row padding-top-bottom">
            <?php
                if ( !empty($get_all_available_templates_limit) ) {
                foreach ( $get_all_available_templates_limit as $gaatl ) :
            ?>
                    <div class="col-md-3 padding-top">
                        <div class="ibox-content product-box">
                            <div>
                                <img src="<?php echo base_url(); ?>public/img/template/<?php echo $gaatl->IMAGEURL; ?>" class="img-responsive" />
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    P <?php echo $gaatl->PRICE; ?>
                                </span>
                                <small class="text-muted">Renting for half-year.</small>
                                <div href="#" class="product-name" style="height:44px"> <?php echo $gaatl->TEMPLATENAME; ?></div>

                                <div class="small m-t-xs">
                                    <?php echo $gaatl->LIBRARYUSE; ?>
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Rent this site</i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    endforeach;
                }
            ?> 
        </div>

        <a href="<?php echo base_url(); ?>templates"> See more site available </a>

    </div>
</div>