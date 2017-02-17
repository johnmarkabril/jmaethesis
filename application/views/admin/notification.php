<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Notification</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>
<div class="row">
	<?php
		if ( !empty($get_all_notification) ) {
			foreach ( $get_all_notification as $gan ) :
	?>
				<div class="col-md-3 padding-top">
					<div class="ibox-content no-border" style="height: 260px">
						<center>
							<img src="<?php echo base_url(); ?>public/img/<?php echo $gan->IMAGEURL; ?>" class="img-responsive img-circle" style="width:80px;height:80px;"/>
							<div class="padding-top">
								<span class="text-bold"><?php echo $gan->FIRSTNAME.' '.$gan->LASTNAME; ?></span> - <span><?php echo $gan->DATE; ?></span>
							</div>
							<hr/>
							<div><?php echo $gan->CONTENT; ?></div>
						</center>
					</div>
				</div>
	<?php
			endforeach;
		}
	?>
</div>