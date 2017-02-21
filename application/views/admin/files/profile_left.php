<?php
	foreach ( $get_admin_specific as $gas ) :
?>
		<div class="ibox-content no-border">
			<center><img src="<?php echo base_url(); ?>public/img/<?php echo $gas->IMAGEURL; ?>" class="img-responsive" style="width:150px;height:150px;"/></center>
		</div>
		
		<hr class="margin-top no-margin"/>

		<div class="padding-top">
			<div class="ibox-content no-margin no-border">

			</div>
		</div>

<?php
	endforeach;
?>
