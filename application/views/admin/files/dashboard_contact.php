<div class="padding-top">
    <div class="ibox no-margin">
        <div class="ibox-title no-border">
            Contact
            <span class="pull-right"><a href="<?php echo base_url(); ?>admin/contact">View all</a></span>
        </div>
        <div class="ibox-content" style="min-height:335px;">
            <center>
                <?php
                    foreach ( $get_all_contact_for_specific_admin as $gacfsa ) :
                ?>
                    <div class="padding-top">
                        <div class="ibox-content no-border no-padding">
                            <div class="row">
                                <div class="col-md-3">
                                    <img style="max-height: 45px;min-width:45px;max-width: 45px;" class="img-responsive img-circle" src="<?php echo base_url(); ?>public/img/<?php echo $gacfsa->IMAGEURL; ?>">
                                </div>
                                <div class="col-md-9">
                                    <div class="padding-top">
                                        <a data-toggle="modal" data-target="#<?php echo $gacfsa->NO; ?>ModalDashContact">
                                            <?php echo $gacfsa->NAME; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                ?>
                <div class="form-group padding-top">
                    <a data-toggle="modal" data-target="#createContactDashModal" class="btn btn-info full-width">Add new contant</a>
                </div>
            </center>
        </div>
    </div>
</div>

<?php
    foreach ( $get_all_contact_for_specific_admin as $gacfsa ) :
?>
        <div class="modal inmodal" id="<?php echo $gacfsa->NO; ?>ModalDashContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-body no-padding-bottom">
                        <center>
                            <img src="<?php echo base_url(); ?>public/img/<?php echo $gacfsa->IMAGEURL; ?>" class="img-responsive" />
                            <div class="padding-top">
                                <div class="text-bold"><?php echo $gacfsa->NAME; ?></div>
                                <div><?php echo $gacfsa->CONTACTNO; ?></div>
                                <div><?php echo $gacfsa->EMAILADDRESS; ?></div>
                            </div>
                            <div class="form-group padding-top">
                                <input type="button" class="btn btn-info full-width" value="Send a message"/>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>

<div class="modal inmodal" id="createContactDashModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Add new contact</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <form role="form" id="formContactDash" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/dashboard/insertContact">
                    <div class="form-group">
                        <label>* Name</label>
                        <input type="text" class="form-control" name="contactDash_name_create" required/>
                    </div>
                    <div class="form-group">
                        <label>* Contact Number</label>
                        <input type="text" class="form-control" name="contactDash_contact_create" required/>
                    </div>
                    <div class="form-group">
                        <label>* Email Address</label>
                        <input type="email" class="form-control" name="contactDash_email_create" required/>
                    </div>
                    <div class="form-group">
                        <label>* Address</label>
                        <input type="text" class="form-control" name="contactDash_address_create" required/>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="file hide" />
                        <label>Image</label>
                        <div class="input-group col-xs-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                            <span class="input-group-btn">
                                <button class="browse btn btn-info input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="contactDash_create" class="btn btn-success full-width" id="contactDash_create" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>