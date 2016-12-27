<div class=" margin-top-fifty">
    <div class="container">
        <div class="navy-line padding-top"></div>
        <h2 class="no-margin padding-top text-bold">
            All Templates Available 
        </h2>
        <div>
            Since 2016 we develop a lot of templates. New templates added below.
        </div>

        <div class="row padding-top-bottom">
            
            <div class="col-md-12">
                <div class="row">
                    <?php
                        if ( !empty($get_all_available_templates) ) {
                            foreach ( $get_all_available_templates as $gaat ) :
                    ?>
                    <div class="col-md-4 padding-top">
                        <div class="ibox-content product-box">
                            <div>
                                <img src="<?php echo base_url(); ?>public/img/template/<?php echo $gaat->IMAGEURL; ?>" class="img-responsive" />
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    P <?php echo $gaat->PRICE; ?>
                                </span>
                                <small class="text-muted">Renting for half-year.</small>
                                <div href="#" class="product-name"> <?php echo $gaat->TEMPLATENAME; ?></div>

                                <div class="small m-t-xs">
                                    <?php echo $gaat->LIBRARYUSE; ?>
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
            </div>
        </div>

    </div>
</div>  