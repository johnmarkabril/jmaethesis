<div class="padding-top">
	<div class="ibox-content no-border">
		<?php
			if ( !empty($get_user_specific) ) {
				foreach ( $get_user_specific as $gus ) :

		?>
					<div class="row">
						<div class="col-md-3">
							<img class="img-responsive" src="<?php echo base_url(); ?>public/img/<?php echo $gus->IMAGEURL; ?>"  style="height:150px;width:150px;"/>
						</div>
						<div class="col-md-7">
							<div class="padding-top">
								<h2><?php echo $gus->FIRSTNAME.' '.$gus->LASTNAME;?></h2>
							</div>
						</div>
					</div>
		<?php
				endforeach;
			}
		?>
	</div>
</div>