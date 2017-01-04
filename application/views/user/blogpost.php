<div class="wrapper wrapper-content  animated fadeInRight ">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox">
				<?php
					foreach ( $get_specific_blog as $gsb ) : 
				?>
					    <div class="ibox-content">
					    	<center>
					    		<!-- <img class="img-responsive" src="<?php echo base_url(); ?>public/img/<?php echo $gsb->IMAGEURL; ?>" /> -->
					    	</center>
					        <div class="text-center article-title">
					            <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $gsb->DATE; ?></span>
					            <h1>
					                <?php echo $gsb->TITLE; ?>
					            </h1>
					        </div>
					        <p class="text-center">
					            <?php echo $gsb->DESCRIPTION; ?>
					        </p>
						</div>
				<?php
					endforeach;
				?>
			</div>
			<div class="ibox">
			    <div class="ibox-content">
			        <div class="row">
			            <div class="col-md-12">
			            	<?php
			            		if ( !empty($get_comment_per_blog) ) {
			            			foreach ( $get_comment_per_blog as $gcpb ) :
			            	?>
						                <div class="social-feed-box">
						                    <div class="social-avatar">
						                        <a href="#" class="pull-left">
						                            <img alt="image" src="<?php echo base_url(); ?>public/img/<?php echo $gcpb->IMAGEURL; ?>">
						                        </a>
						                        <div class="media-body">
						                            <a href="#">
						                                <?php echo $gcpb->NAME; ?>
						                            </a>
						                            <small class="text-muted"><?php echo $gcpb->DATE." - ".$gcpb->HOUR; ?></small>
						                        </div>
						                    </div>
						                    <div class="social-body">
						                        <p>
						                            <?php echo $gcpb->DESCRIPTION; ?>
						                        </p>
						                    </div>
						                </div>
			                <?php
			                		endforeach;
			                	}
			                ?>
			            	<textarea class="form-control" style="max-width: 100%;min-width: 100%;max-height: 10%;min-height: 10%;" placeholder="Comment here"></textarea>
						</div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>