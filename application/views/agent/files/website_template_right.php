<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Preview
        <span class="pull-right">
            <a href="#" class="btn btn-link btn-sm no-padding" data-toggle="modal" data-target="#createModal">Create</a>
        </span>
    </div>
    <div class="ibox-content  full-height no-padding-bottom">
        <div class="no-margins">
            <div class="row">
                <?php
                    if ( ! empty ( $get_specific ) ) {
                        foreach ( $get_specific as $gs ) :
                ?>
                            <div class="padding-left-right">
                                <div class="form-group">
                                    <img class="img-responsive" style="height: 40%;width: 100%;" src="<?php echo base_url(); ?>public/img/template/<?php echo $gs->IMAGEURL;?>" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Template Name</label>
                                            <input type="text" class="form-control" id="txt_no_wt" value="<?php echo $gs->NO; ?>" style="display: none;" />
                                            <input type="text" class="form-control" id="txt_name_wt" value="<?php echo $gs->TEMPLATENAME; ?>"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input type="text" class="form-control" id="txt_category_wt" value="<?php echo $gs->TEMPLATECATEGORY; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea style="max-height: 20%;min-height: 20%; max-width: 100%;" id="txt_description_wt" class="form-control"><?php echo $gs->DESCRIPTION; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Library & Framework used</label>
                                            <input type="text" class="form-control" id="txt_library_wt" value="<?php echo $gs->LIBRARYUSE; ?>"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" id="txt_price_wt" value="<?php echo $gs->PRICE; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button class="btn btn-info full-width" data-dismiss="modal" data-toggle="modal" data-target="#updateImageModal<?php echo $gs->NO;?>" type="button">Change website image</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button class="btn btn-success full-width" type="button" id="btn_update_wt">Update website information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        endforeach;
                    } 
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    foreach ($get_specific as $gao) :
?>
        <div class="modal inmodal" id="updateImageModal<?php echo $gao->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo 'Update website image of '.$gao->OWNERTITLEWEBSITE; ?></h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>agent/templates/update_image/<?php echo $gao->NO;?>">
                            <div class="form-group">
                                <input type="file" name="image" class="file hide" required />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <input type="text" class="form-control" disabled placeholder="Upload Image">
                                    <span class="input-group-btn">
                                        <button class="browse btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success full-width" type="submit" name="btn_update_image_wo">Update website image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>

<!-- Modal -->
<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="modalCreate">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create new template</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Template Name</label>
                            <input type="text" class="form-control" id="txt_name_wt_create" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="txt_category_wt_create" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea style="max-height: 20%;min-height: 20%; max-width: 100%;" id="txt_description_wt_create" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Library & Framework used</label>
                            <input type="text" class="form-control" id="txt_library_wt_create" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" id="txt_price_wt_create" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success full-width" type="button" id="btn_create_wt">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>