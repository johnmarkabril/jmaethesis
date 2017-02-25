<div class="ibox-content no-border no-margin padding-all no-padding-bottom">
			<div class="form-group no-margin">
				<input type="text" class="form-control" id="txt_title_isu" placeholder="Title" />
				<div class="padding-top">
					<textarea class="form-control" style="max-width: 100%;max-height: 106px;min-height: 106px;" id="txt_desc_isu" placeholder="Description"></textarea>
				</div>
				<div class="padding-top">
					<input type="button" class="btn btn-success full-width" id="btn_issue_tracker_user" value="Submit"/>
				</div>
			</div>
		</div>
		<div class="padding-top">
			<div class="ibox-content padding-top no-border">
	            <div class="table-responsive" style="height: 100%;">
	                <table class="table table-hover" >
	                	<thead>
	                		<tr>
		                		<th>STATUS</th>
		                		<th>ISSUE NUMBER</th>
		                		<th>NAME</th>
		                		<th>DATE</th>
		                		<th>COMMAND</th>
	                		</tr>
	                	</thead>
	                    <tbody class="list">
	                        <?php
	                            // print_r($get_all_issue_tracker);
	                            foreach ( $get_all_issue_tracker as $gait ) :
	                        ?>
	                                <tr>
	                                    <td class="status">
	                                        <?php
	                                            if ( $gait->STATUS == '2' ) {
	                                        ?>
	                                                <div class="padding-top"><span class="label label-danger full-width no-border-radius">Bug</span></div>
	                                        <?php
	                                            } else {
	                                        ?>
	                                                <div class="padding-top"><span class="label label-primary full-width no-border-radius">Fixed</span></div>
	                                        <?php
	                                            }
	                                        ?>
	                                    </td>
	                                    <td class="issue-info"> 
	                                        <div class="text-bold">ISSUE #<?php echo $gait->NO." - ".$gait->TITLE; ?></div>
	                                        <small>
	                                            <?php echo substr($gait->DESCRIPTION, 0,74); ?>
	                                        </small>
	                                    </td>
	                                    <td class="name">
	                                        <?php echo $gait->FIRSTNAME.' '.$gait->LASTNAME; ?>
	                                    </td>
	                                    <td class="date">
	                                        <?php echo $gait->DATEINSERT; ?>
	                                    </td>
	                                    <input type="text" style="display: none;" id="replyNO<?php echo $gait->NO; ?>" value="<?php echo $gait->NO; ?>"/>
	                                    <td class="text-center">
	                                        <a href="<?php echo base_url(); ?>profile/solved_issue/<?php echo $gait->NO; ?>" class="btn btn-white btn-xs full-width"> Resolve</a>
	                                        <a data-toggle="modal" id="replyIDUSER<?php echo $gait->NO; ?>" data-target="#replyIssueTrackerProfileModal<?php echo $gait->NO; ?>" class="btn btn-white btn-xs full-width"> Reply</a>
	                                    </td>
	                                </tr>
	                        <?php
	                            endforeach; 
	                        ?>
	                    </tbody>
	                </table>
	            </div>
	        </div>
        </div>
        <?php 
		    foreach ( $get_all_issue_tracker as $gait ) :
		?>
		        <div class="modal inmodal" id="replyIssueTrackerProfileModal<?php echo $gait->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		            <div class="modal-dialog" role="document">
		                <div class="modal-content animated pulse">
		                    <div class="modal-header">
		                        <h4 class="modal-title">ISSUE #<?php echo $gait->NO." - ".$gait->TITLE;?></h4>
		                    </div>
		                    <div class="modal-body no-padding-bottom" >
		                        <div class="text-center">
		                            <div><?php echo $gait->DESCRIPTION; ?></div>
		                        </div>
		                        <div>
		                            <div class="social-footer margin-top">
		                                
		                            <div id="dataBodyIssueTrackerProfile<?php echo $gait->NO; ?>"></div>
		                                <div class="social-comment">
		                                    <a href="" class="pull-left" style="padding-top: 3px;">
		                                        <img alt="image" style="width:32px;height:32px;" src="<?php echo base_url(); ?>public/img/<?php echo $this->session->userdata('user_session')->IMAGEURL; ?>">
		                                    </a>
		                                    <div class="media-body">
		                                        <textarea class="form-control" id="replyforIssueIDUSER<?php echo $gait->NO; ?>" placeholder="Write comment..." style="max-height: 40px;min-height: 40px;"></textarea>
		                                    </div>
		                                </div>

		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		<?php
		    endforeach;
		?>