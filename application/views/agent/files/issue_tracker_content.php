<div class="padding-top">
    <div class="ibox no-margin" id="search">
        <div class="form-group">
            <input type="text" class="form-control search" placeholder="Search..." />
        </div>
        <div class="ibox-content no-padding-top no-border  full-height">
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
                                        <a href="<?php echo base_url(); ?>agent/issue_tracker/solved_issue/<?php echo $gait->NO; ?>" class="btn btn-white btn-xs full-width"> Resolve</a>
                                        <a data-toggle="modal" id="replyID<?php echo $gait->NO; ?>" data-target="#replyIssueDashModal<?php echo $gait->NO; ?>" class="btn btn-white btn-xs full-width"> Reply</a>
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
</div>

<?php 
    foreach ( $get_all_issue_tracker as $gait ) :
?>
        <div class="modal inmodal" id="replyIssueDashModal<?php echo $gait->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                
                            <div id="data-body-modal-issue-tracker<?php echo $gait->NO; ?>"></div>

                                <div class="social-comment">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="<?php echo base_url(); ?>public/img/<?php echo $this->session->userdata('user_session')->IMAGEURL; ?>">
                                    </a>
                                    <div class="media-body">
                                        <textarea class="form-control" id="replyforIssueID<?php echo $gait->NO; ?>" placeholder="Write comment..." style="max-height: 20%;min-height: 20%;"></textarea>
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