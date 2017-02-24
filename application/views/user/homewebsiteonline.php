<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Templates online</h4>
    </div>
</div>

<div class="row">
    <?php
        if ( !empty($get_all_rented_templates) ) {
            foreach ( $get_all_rented_templates as $gart ) :
    ?>
                <div class="col-md-3 padding-top">
                    <div class="ibox-content product-box">
                        <div>
                            <img src="<?php echo base_url(); ?>public/img/template/<?php echo $gart->IMAGEURL; ?>" class="img-responsive" />
                        </div>
                        <div class="product-desc">
                            <a href="<?php echo $gart->SITEURL; ?>" target="_blank" class="product-name" style="height:44px">
                                <?php echo $gart->TEMPLATENAME; ?>   
                            </a>
                            <div class="small m-t-xs" style="height: 30px">
                                <?php echo $gart->LIBRARYUSE; ?>
                            </div>
                            <div class="m-t text-righ text-center">
                                <a href="<?php echo $gart->SITEURL; ?>" target="_blank" class="btn btn-xs btn-outline btn-primary">View this site</i> </a>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            endforeach;
        }
    ?>
</div>