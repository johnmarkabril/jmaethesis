<div class="ibox-content no-border no-margin padding-all no-padding-bottom">
	<div class="form-group no-margin">
		<textarea class="form-control" style="max-width: 100%;max-height: 106px;min-height: 106px;" id="txt_post" placeholder="Write something on your wall.."></textarea>
		<div class="padding-top">
			<input type="button" class="btn btn-success" id="btn_post_profile" value="Post"/>
		</div>
	</div>
</div>

<div id="newPostAdmin"></div>
<?php
	foreach ( $get_all_post as $gap ) :
?>
		<div class="padding-top">
			<div class="ibox-content no-border">
				<div class="row">

					<?php
						if ( $gap->NAME == $session_name ) {
					?>
							<span class="pull-right" style="color:blue;padding-right: 15px;"><a>X</a></span>
					<?php
						}
					?>
					<div class="col-xs-1">
						<img src="<?php echo base_url(); ?>public/img/<?php echo $gap->IMAGEURL; ?>" style="width:50px;height:50px;" />
					</div>
					<div class="text-bold " style="padding-left: 75px;"><?php echo $gap->NAME; ?></div>
					<div class="" style="padding-left: 75px;"><?php echo $gap->DATE; ?></div>

				</div>
				<hr class="no-margin margin-top"/>
				<div class="padding-top" style="padding-left: 20px;padding-right: 20px;font-size: 17px;">
					<?php echo $gap->POSTDESCRIPTION; ?>
				</div>
				<input type="text" value="<?php echo $gap->NO; ?>" id="txt_no_prof_post" style="display:none;" />
				<div class="padding-top">
					<textarea class="form-control" id="adminReplyPost<?php echo $gap->NO; ?>" style="max-width: 100%;max-height: 50px;min-height: 50px;" placeholder="Comment"></textarea>
				</div>

				<div id="newReplyPostNo<?php echo $gap->NO; ?>"></div>

				<?php
					foreach ( $get_reply as $gr ) :
						if ( $gap->NO == $gr->NOREPLY ) {
				?>
							<div class="padding-top">
								<div class="ibox-content no-border" style="background-color: #F2F2F2;">
									<div>
										<div class="row">
											<div class="col-xs-1">
												<img src="<?php echo base_url(); ?>public/img/<?php echo $gr->IMAGEURL; ?>" style="width:40px;height:40px;" />
											</div>
											
											<div style="padding-left: 75px;"><span class="text-bold"><?php echo $gr->NAME; ?></span> | <span><?php echo $gr->DATE; ?></span></div>
												
											<div style="padding-left: 75px;"><?php echo $gr->REPLY; ?></div>
										</div>
									</div>
								</div>

							</div>
				<?php
						}
					endforeach;
				?>
			</div>
		</div>
<?php
	endforeach;
?>