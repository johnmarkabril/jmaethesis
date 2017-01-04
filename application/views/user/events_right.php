<?php
	if ( !empty($get_specific_event) ) {
		foreach ( $get_specific_event AS $gse ) :
?>
			<div class="text-center">
				<h3 class="no-margin"><?php echo $gse->TITLE; ?></h3>
				<span class="text-muted"><?php echo $gse->DATE; ?></span>
				<hr class="no-margin-bottom" />
			</div>
			<div class="article-title no-margin-top padding-left-right">
				<?php
					$desc = explode('\n', $gse->DESCRIPTION);
					foreach ( $desc as $description ) :
				?>
						<div class="padding-top">
							<?php echo $description;?>
						</div>
				<?php
					endforeach;
				?>
			</div>
<?php
		endforeach;
	}
?>