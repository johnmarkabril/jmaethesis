<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Inbox Message
    </div>
    <div class="ibox-content full-height">
        <div class="no-margins">
        	<?php
        		if ( !empty($get_specific_content) ) {
        			foreach ( $get_specific_content as $gsc ) :
        	?>
			        	<div class="text-center">
			        		<h3 class="text-bold no-margin"><?php echo $gsc->SUBJECT; ?></h3>
			        		<small><?php echo $gsc->DATE.' - '.$gsc->TIME; ?></small>
			        		<br />
			        		<div class="padding-top-bottom">
			        			<?php echo $gsc->CONTENT; ?>
			        		</div>
			        	</div>
			        	<hr class="no-margin"/>
        	<?php
        			endforeach;
        		}
        	?>

        	<?php
        		if ( !empty($get_all_reply_spec_content) ) {
        			foreach ( $get_all_reply_spec_content as $garsc ) :
        	?>
	        			<?php
	        				if ( $garsc->NOUSER != $this->session->userdata('user_session')->NO ){
	        			?>
					            <div class="padding-top" style="text-align: left">
						           	<div class="ibox-content no-border no-margin" style="background-color: #F3F3F4;">
						     			<div class="text-bold"><?php echo $garsc->FIRSTNAME.' '.$garsc->LASTNAME; ?></div>      		
						     			<div><?php echo $garsc->REPLY; ?></div>      		
						           	</div>
					            </div>
					    <?php
					    	} else {
					    ?>
					            <div class="padding-top" style="text-align: right">
						           	<div class="ibox-content no-border no-margin" style="background-color: #0076BE;color:#FFFFFF;">
						     			<div class="text-bold"><?php echo $garsc->FIRSTNAME.' '.$garsc->LASTNAME; ?></div>      		
						     			<div><?php echo $garsc->REPLY; ?></div>      		
						           	</div>
					            </div>
					    <?php
					    	}
					    ?>
            <?php
            		endforeach;
            	}
            ?>

        	<?php
        		if ( !empty($get_specific_content) ) {
        	?>
		            <div class="padding-top">
		            	<textarea class="form-control full-width" style="min-height: 15%;max-height: 15%;" id="messageReply" placeholder="Reply here ...."></textarea>
		            </div>
            <?php
            	}
            ?>
        </div>
    </div>
</div>