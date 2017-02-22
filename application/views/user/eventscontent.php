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
							<a data-toggle="modal" data-target="#eventsContent<?php echo $gae->NO;?>" class="product-name"><?php echo $gae->TITLE; ?></a>
							<small><?php echo $gae->DATE; ?></small>
							<hr/>
							<div style="text-align: justify;height:126px;">
								<?php
									echo substr($gae->DESCRIPTION, 0, 250);
									if ( strlen($gae->DESCRIPTION) >= 250 ) {
										echo '....';
									}
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

<?php
	if ( $get_all_events ) {
		foreach ( $get_all_events as $gae ) :
?>
	        <div class="modal inmodal" id="eventsContent<?php echo $gae->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	            <div class="modal-dialog" role="document">
	                <div class="modal-content animated pulse">
	                    <div class="modal-body padding-bottom padding-top">
	                        <h3 class="no-margin text-center"><?php echo $gae->TITLE; ?></h3>
	                        <div class="padding-all" style="font-size: 14px;">
	                        	<?php echo $gae->DESCRIPTION; ?>
	                        </div>
	                        <hr class="no-margin" />
	                        <?php
	                        	foreach ( $get_all_reply as $gar ) :
	                        		if ( $gar->EVENTNO == $gae->NO ) {

	                        ?>
				                        <div class="padding-top">
				                        	<div class="row">
				                        		<div class="col-xs-1">
				                        			<img style="height:50px;width:50px;" src="<?php echo base_url(); ?>public/img/<?php echo $gar->IMAGEURL; ?>" />
				                        		</div>
				                        		<div style="padding-left: 85px;">
				                        			<div><label><?php echo $gar->NAME; ?></label><?php echo ' - ' . $gar->DATE; ?></div>
				                        			<div style="font-size: 15px;">
				                        				<?php echo $gar->REPLY; ?>
				                        			</div>
				                        		</div>
				                        	</div>
				                        </div>
				            <?php
				            		}
				            	endforeach;
				            ?>
	                        <div id="newReplyEvent<?php echo $gae->NO; ?>"></div>
				            <div class="padding-top">
				            	<?php 
				            		if ( !empty($this->session->userdata('user_session')) ) {
				            	?>
				            			<textarea style="min-height: 15%;max-height: 15%;" placeholder="Write a comment...." id="replyEvent<?php echo $gae->NO; ?>" class="form-control full-width"></textarea>
				            	<?php
				            		}
				            	?>
				            </div>
	                    </div>
	                </div>
	            </div>
	        </div>
<?php
    	endforeach;
	}
?>