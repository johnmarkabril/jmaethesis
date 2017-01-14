<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Food E-commerce Templates</h4>
    </div>
</div>

<div class="row">
    <?php
        if ( !empty($get_all_available_templates) ) {
            foreach ( $get_all_available_templates as $gaat ) :
    ?>
                <div class="col-md-3 padding-top">
                    <div class="ibox-content product-box">
                        <div>
                            <img src="<?php echo base_url(); ?>public/img/template/<?php echo $gaat->IMAGEURL; ?>" class="img-responsive" />
                        </div>
                        <div class="product-desc">
                            <span class="product-price">
                                P <?php echo number_format($gaat->PRICE, 2, '.', ','); ?>
                            </span>
                            <small class="text-muted">Renting for half-year.</small>
                            <a href="#" class="product-name" style="height:44px"> <?php echo $gaat->TEMPLATENAME; ?></a>
                            <div class="small m-t-xs" style="height: 30px">
                                <?php echo $gaat->LIBRARYUSE; ?>
                            </div>
                            <div class="m-t text-righ text-center">
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