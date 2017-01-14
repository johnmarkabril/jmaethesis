<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Blog</h4>
    </div>
</div>

<div class="row">
	<?php
		if ( $get_all_blog ) {
			foreach ( $get_all_blog as $gab ) :
	?>
				<div class="col-md-3">
					<div class="padding-top">
						<div class="ibox-content text-center">
							<a href="#" class="product-name"><?php echo $gab->TITLE; ?></a>
							<small><?php echo $gab->DATE; ?></small>
							<hr/>
							<div>
								<?php
									echo substr($gab->DESCRIPTION, 0, 250)
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