<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Events</h4>
    </div>
</div>

<div class="row">
	<?php
		if ( $get_all_events ) {
			foreach ( $get_all_events as $gae ) :
	?>
				<div class="col-md-3">
					<div class="padding-top">
						<div class="ibox-content text-center">
							<a href="#" class="product-name"><?php echo $gae->TITLE; ?></a>
							<small><?php echo $gae->DATE; ?></small>
							<hr/>
							<div style="text-align: justify;">
								<?php
									echo substr($gae->DESCRIPTION, 0, 250)
								?>
							</div>
						</div>
					</div>
				</div>
	<?php
			endforeach;
		}
	?>
</div>