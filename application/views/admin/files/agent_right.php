<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Preview
        <?php
            foreach ( $get_specific as $gs ) :
        ?>  
                 <span class="pull-right"><a data-toggle="modal" data-target="#deleteModal" >Delete</a></span>
        <?php
            endforeach;
        ?>
    </div>
    <div class="ibox-content min-height no-padding-top">
        <?php
            foreach ( $get_specific as $gs ) :
        ?>  
            <div class="padding-top text-center">
                <h3 class="no-margin">Personal Information</h3>
            </div>
            <div class="padding-top">
                <center><img class="img-responsive" src="<?php echo base_url(); ?>public/img/<?php echo $gs->IMAGEURL; ?>" style="width: 150px;height:150px;" /></center>
                <div class="row" style="padding-left: 150px;">
                    <div class="col-md-12 padding-top">
                        Name: <?php echo $gs->FIRSTNAME.' '.$gs->LASTNAME; ?>
                    </div>
                    <div class="col-md-12 padding-top">
                        Username: <?php echo $gs->USERNAME; ?>
                    </div>
                    <div class="col-md-12 padding-top">
                        Email Address: <?php echo $gs->EMAIL; ?>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
</div>

<?php
    foreach ($get_specific as $gs) :
?>
        <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure to this account?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="btn_cancenl_agent" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/agent/delete/<?php echo $gs->NO; ?>" name="btn_delete_agent" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>