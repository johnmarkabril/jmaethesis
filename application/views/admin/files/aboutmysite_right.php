<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Preview
        <?php
            foreach ( $get_specific as $gs ) :
        ?>  
                 <span class="pull-right"><a data-toggle="modal" data-target="#modalDeleteAms<?php echo $gs->NO; ?>">Delete</a> | <a data-toggle="modal" data-target="#updateModal<?php echo $gs->NO; ?>">Update</a></span>
        <?php
            endforeach;
        ?>
    </div>
    <div class="ibox-content min-height no-padding-top">
        <?php
            foreach ( $get_specific as $gs ) :
        ?>  
            <div class="padding-top text-center">
                <h3 class="no-margin"><?php echo $gs->TITLE; ?></h3>
            </div>
            <div class="padding-top text-center" style="padding-left: 110px; padding-right: 110px;">
                <div><?php echo $gs->DESCRIPTION; ?></div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
</div>

<?php
    foreach ($get_specific as $gs) :
?>
        <div class="modal inmodal" id="updateModal<?php echo $gs->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">About My Site - Update</h4>
                    </div>
                    <div class="modal-body no-padding-bottom">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="ams_no_update" value="<?php echo $gs->NO; ?>" style="display: none;" /> 
                            <input type="text" class="form-control" id="ams_title_update" value="<?php echo $gs->TITLE; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea style="min-height: 150px;max-height: 150px;max-width: 100%" class="form-control" id="ams_description_update"><?php echo $gs->DESCRIPTION; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Active this about</label>
                            <select name="status" id="ams_active_update" class="form-control">
                                <?php 
                                    if ( $gs->ACTIVE == 1 ) {
                                ?>        
                                    <option value="enabled" selected>Enabled</option>
                                    <option value="disabled">Disabled</option>
                                <?php
                                    } else {
                                ?>
                                    <option value="enabled">Enabled</option>
                                    <option value="disabled" selected>Disabled</option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn btn-success full-width" id="ams_update" data-dismiss="modal" value="Update"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>

<?php
    foreach ($get_specific as $gs) :
?>
        <div class="modal inmodal" id="modalDeleteAms<?php echo $gs->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure, you want to delete this about my site?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="btn_cancenl_team" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/about_my_site/delete/<?php echo $gs->NO; ?>" type="button" id="btn_delete_team" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>