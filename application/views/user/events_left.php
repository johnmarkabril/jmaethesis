<?php
	if ( !empty($get_all_events) ) {
		foreach ( $get_all_events as $gae ) :
?>
			<div>
				<div class="text-bold"><?php echo $gae->TITLE; ?></div>
				<div>
				    <a href="<?php echo base_url(); ?>events/post/<?php echo $gae->RANDOMCODE; ?>">
				    	<?php echo substr($gae->DESCRIPTION, 0, 150); ?>
				    </a>
				    <hr/>
				</div>
			</div>
<?php
		endforeach;
	}
?>