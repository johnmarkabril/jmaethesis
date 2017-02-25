<div class="ibox no-margin">
	<div class="ibox-title no-border">
		Preview
        <?php
            foreach ( $get_specific as $gs ) :
        ?>  
                 <span class="pull-right"><a data-toggle="modal" data-target="#modalDeleteEvent<?php echo $gs->NO;?>">Delete</a> | <a data-toggle="modal" data-target="#updateModal<?php echo $gs->NO;?>">Update</a></span>
        <?php
            endforeach;
        ?>
	</div>
    <div class="ibox-content  full-height no-padding-top">
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
        <div class="modal inmodal" id="modalDeleteEvent<?php echo $gs->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure, you want to delete this event?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="btn_cancenl_team" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>agent/events/delete/<?php echo $gs->NO; ?>" type="button" id="btn_delete_team" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
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
        <div class="modal inmodal" id="updateModal<?php echo $gs->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Event - Update</h4>
                    </div>
                    <div class="modal-body no-padding-bottom">
                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>agent/events/update">
                            <div class="form-group">
                                <input type="file" name="image" accept="image/*" class="file hide" />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <input type="text" class="form-control" value="<?php echo $gs->IMAGEURL; ?>"  disabled placeholder="Upload Image">
                                    <span class="input-group-btn">
                                        <button class="browse btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" required name="event_no_update" value="<?php echo $gs->NO; ?>" style="display: none;" />
                                <input type="text" class="form-control" required name="event_title_update" maxlength="50" value="<?php echo $gs->TITLE; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea style="min-height: 150px;max-height: 150px;max-width: 100%" class="form-control" required name="event_description_update"><?php echo $gs->DESCRIPTION; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success full-width" name="event_update" value="Update"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>