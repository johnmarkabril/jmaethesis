<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Inbox
        <span class="pull-right"><a data-toggle="modal" data-target="#createModal">Compose Message</a></span>
    </div>
    <div class="ibox-content min-height" id="search">
        <div class="no-margins">
            <div class="row">
                <div class="col-md-12">
                    <h4><input type="text" class="form-control search" placeholder="Search"/></h4>
                    <div class="table-responsive">

                        <table class="table table-striped text-center">
                            <?php if(!empty($get_all_inbox_spec_user)) {?>
                                <tbody class="list">

                                    <?php foreach($get_all_inbox_spec_user as $gaisu) :?>
                                        <tr>
                                            <td class="title">
                                                <a href="<?php echo base_url();?>admin/message/content/<?php echo $gaisu->NO;?>"><?php echo $gaisu->SUBJECT;?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Compose Message</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <div class="form-group">
                    <label>Email Address</label><small id="error_cm_email" style="color:red;"></small>
                    <input type="text" class="form-control" id="cm_email" />
                </div>
                <div class="form-group">
                    <label>Subject</label><small id="error_cm_subject" style="color:red;"></small>
                    <input type="text" class="form-control" id="cm_subject" />
                </div>
                <div class="form-group">
                    <label>Message</label><small id="error_cm_message" style="color:red;"></small>
                    <textarea style="min-height: 150px;max-height: 150px;max-width: 100%" id="cm_message" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success full-width" id="cm_create" value="Send message"/>
                </div>
            </div>
        </div>
    </div>
</div>