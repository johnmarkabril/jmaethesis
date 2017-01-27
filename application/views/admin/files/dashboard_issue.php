<div class="padding-top">
    <div class="ibox no-margin">
        <div class="ibox-title no-border">
            Issue tracker 
        </div>
        <div class="ibox-content no-padding-top no-border" style="min-height:330px;">
            <div class="table-responsive">
                <table class="table table-hover issue-tracker">
                    <tbody id="tbody-issue-tracker">
                        <?php
                            // print_r($get_all_issue_tracker);
                            foreach ( $get_all_issue_tracker as $gait ) :
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                            if ( $gait->STATUS == '2' ) {
                                        ?>
                                                <span class="label label-danger full-width no-border-radius">Bug</span>
                                        <?php
                                            } else {
                                        ?>
                                                <span class="label label-primary full-width no-border-radius">Fixed</span>
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
                                    <td class="text-center">
                                        <?php echo $gait->FIRSTNAME.' '.$gait->LASTNAME; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $gait->DATEINSERT; ?>
                                    </td>
                                    <input type="text" style="display: none;" id="replyNO<?php echo $gait->NO; ?>" value="<?php echo $gait->NO; ?>"/>
                                    <td class="text-center">
                                        <a href="<?php echo base_url(); ?>admin/dashboard/solved_issue/<?php echo $gait->NO; ?>" class="btn btn-white btn-xs full-width"> Resolve</a>
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