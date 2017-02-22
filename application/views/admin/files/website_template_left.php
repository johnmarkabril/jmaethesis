<div class="ibox no-margin">
    <div class="ibox-title no-border">
        List
    </div>
    <div class="ibox-content min-height" id="search">
        <div class="no-margins">
            <div class="row">
                <div class="col-md-12">
                    <h4><input type="text" class="form-control search" placeholder="Search"/></h4>
                    <div class="table-responsive">

                        <table class="table table-striped text-center">
                            <?php if(!empty($get_all_templates)) {?>
                                <tbody class="list">
                                    <?php foreach($get_all_templates as $gat) :?>
                                        <tr>
                                            <td class="title">
                                                <a href="<?php echo base_url();?>admin/website_template/information/<?php echo $gat->NO;?>"><?php echo $gat->TEMPLATENAME;?></a>
                                                <span class="pull-right"><a data-toggle="modal" data-target="#deleteModal<?php echo $gat->NO;?>" class="fa fa-trash" aria-hidden="true"></a></span>
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

<?php
    foreach ($get_all_templates as $gat) :
?>
        <div class="modal inmodal" id="deleteModal<?php echo $gat->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure, you want to delete this account?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/website_template/delete/<?php echo $gat->NO; ?>" name="btn_delete_wt" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>