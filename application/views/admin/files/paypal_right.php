<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Preview
        <?php 
            foreach ( $get_specific as $gs ) :
        ?>
                <span class="pull-right"><a data-toggle="modal" data-target="#modalDeletePayPal<?php echo $gs->NO; ?>">Delete</a></span>
        <?php
            endforeach;
        ?>
    </div>
    <div class="ibox-content min-height">
        <div class="row">
            <div class="col-md-4">
                <center>
                <img style="height:300px;" class="img-responsive" src="<?php echo base_url(); ?>public/img/paypal.png" />
                </center>
            </div>
            <div class="col-md-8">
                <p style="text-align: justify;">PayPal Holdings, Inc. is an American company operating a worldwide online payments system that supports online money transfers and serves as an electronic alternative to traditional paper methods like checks and money orders.</p>
                <br/>
                <label>Email Address</label>
                <?php 
                    if ( empty($get_specific) ) { 
                ?>
                    <input type="text" class="form-control" placeholder="example@example.com" value=""/>
                <?php 
                    } else { 
                        foreach ( $get_specific as $gs ) :
                ?>
                    <input type="text" class="form-control" value="<?php echo $gs->NO;?>" id="txt_paypal_no" style="display: none;"/>
                    <input type="text" class="form-control" value="<?php echo $gs->PAYPAL_EMAIL;?>" id="txt_paypal_email_upd"/>
                <?php 
                        endforeach;
                    } 
                ?>
                <p>
                    <div class="form-group">
                        <select name="status" id="paypal_email_status" class="form-control">
                            <option value="enabled" selected>Enabled</option>
                            <option value="disabled">Disabled</option>
                        </select>
                    </div>
                </p>
                <br/>
                <button class="btn btn-primary pull-right" type="submit" id="btn_update_paypal_account">Update an PayPal account!</button>
            </div>
        </div>
    </div>
</div>
<?php
    foreach ($get_specific as $gs) :
?>
        <div class="modal inmodal" id="modalDeletePayPal<?php echo $gs->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure, you want to delete this paypal account?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="btn_cancel_paypal" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/paypal_configuration/delete/<?php echo $gs->NO; ?>" type="button" id="btn_delete_paypal" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>