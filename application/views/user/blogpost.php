<div class="wrapper wrapper-content  animated fadeInRight ">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox">
				<?php
					foreach ( $get_specific_blog as $gsb ) : 
				?>
					    <div class="ibox-content">
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
			            <div class="col-lg-12">
			            	<textarea class="form-control" style="max-width: 100%;min-width: 100%;max-height: 10%;min-height: 10%;" placeholder="Comment"></textarea>
							<h3>Comments:</h3>
			                <div class="social-feed-box">
			                    <div class="social-avatar">
			                        <a href="" class="pull-left">
			                            <img alt="image" src="img/a1.jpg">
			                        </a>
			                        <div class="media-body">
			                            <a href="#">
			                                Andrew Williams
			                            </a>
			                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
			                        </div>
			                    </div>
			                    <div class="social-body">
			                        <p>
			                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
			                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
			                            default model text.
			                        </p>
			                    </div>
			                </div>
						</div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>