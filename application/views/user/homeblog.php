<div class="">
    <div style="background-color:white;">
        <h2 class="no-margin padding-top text-bold">
            Blog
        </h2>
        <div>
           	Current blog
        </div>
        <div class="padding-all">
        	<?php
                if ( !empty($get_all_blog_limit) ) {
                    foreach ( $get_all_blog_limit as $gabl ) :
            ?>
                   		<div class="ibox-content full-width no-padding-bottom">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon">
                                    <img class="img-responsive img-circle" src="<?php echo base_url();?>public/img/<?php echo $gabl->IMAGEURL; ?>"/>
                                </div>

                                <div class="vertical-timeline-content no-padding-top">
                                    <h2 class="no-margin-bottom"><?php echo $gabl->TITLE; ?></h2>
                                    <small ><?php echo $gabl->DATE; ?></small>
                                    <div class="pull-left" style="padding-top: 5px;">
                                        <?php echo substr($gabl->DESCRIPTION, 0,150)."..."; ?>
                                    </div>

                                    <div class="pull-right"><a href="<?php echo base_url(); ?>blog/post/<?php echo $gabl->RANDOMCODE; ?>" class="btn btn-sm btn-link"> see more</a></div>

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