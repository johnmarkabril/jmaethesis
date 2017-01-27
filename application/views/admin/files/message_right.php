<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Inbox Message
        <span class="pull-right"><a data-toggle="modal" data-target="#createModal">Send a message</a></span>
    </div>
    <div class="ibox-content min-height">
        <div class="no-margins">
        	<?php
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
        	?>

        	<?php
        		foreach ( $get_all_reply_spec_content as $garsc ) :
        	?>
        			<?php
        				if ( $garsc->NOUSER != $this->session->userdata('user_session')->NO ){
        			?>
				            <div class="padding-top" style="text-align: left">
					           	<div class="ibox-content no-border no-margin" style="background-color: #F3F3F4;">
					     			<div><?php echo $garsc->FIRSTNAME.' '.$garsc->LASTNAME; ?></div>      		
					     			<div><?php echo $garsc->REPLY; ?></div>      		
					           	</div>
				            </div>
				    <?php
				    	} else {
				    ?>
				            <div class="padding-top" style="text-align: right">
					           	<div class="ibox-content no-border no-margin" style="background-color: #0076BE;color:#FFFFFF;">
					     			<div><?php echo $garsc->FIRSTNAME.' '.$garsc->LASTNAME; ?></div>      		
					     			<div><?php echo $garsc->REPLY; ?></div>      		
					           	</div>
				            </div>
				    <?php
				    	}
				    ?>
            <?php
            	endforeach;
            ?>
        </div>
    </div>
</div>