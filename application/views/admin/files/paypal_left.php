<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Account List
        <span class="pull-right"><a data-toggle="modal" data-target="#modalPayPal">Create</a></span>
    </div>
    <div class="ibox-content min-height">
        <input type="text" class="form-control" placeholder="Search an Email address"/>
        <table class="table table-hover table-mail">
            <thead>
                <tr>
                    <th>Email Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="list">
            <?php
                if ( empty($get_all_paypal) ) {
                    echo "NO ACCOUNT YET!";
                } else {
                    foreach ( $get_all_paypal as $gap ) :
                        if ( $gap->STATUS == "enabled") {
             ?>
                             <tr>
                                 <td class="mail-subject text-size-inbox "><a href="<?php echo base_url(); ?>admin/paypal_configuration/information/<?php echo $gap->NO;?>"><?php echo $gap->PAYPAL_EMAIL; ?></a></td>
                                 <td><span class="label label-primary">Enabled</span></td>
                             </tr>
             <?php       } else { ?>
                             <tr>
                                 <td class="mail-subject text-size-inbox "><a href="<?php echo base_url(); ?>admin/paypal_configuration/information/<?php echo $gap->NO;?>"><?php echo $gap->PAYPAL_EMAIL; ?></a></td>
                                 <td><span class="label label-danger">Disabled</span></td>
                             </tr>
                <?php
                            }
                        endforeach;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalPayPal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Save new PayPal Account</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <center>
                            <img style="height:150px;" class="img-responsive" src="<?php echo base_url(); ?>public/img/paypal.png" />
                        </center>
                    </div>
                    <div class="col-md-9">
                        <p style="text-align: justify;">PayPal Holdings, Inc. is an American company operating a worldwide online payments system that supports online money transfers and serves as an electronic alternative to traditional paper methods like checks and money orders.</p>
                        <p>
                            Note: To enable this account. Please click the email on the left side box then on the right side click enabled then save.
                        </p>
                        <br/>
                        <div id="error_message_paypal" class="text-bold" style="color: red;"></div>
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="example@example.com" id="txt_paypal_email"/>
                        <br/>
                        <button class="btn btn-primary pull-right full-width" type="submit" id="btn_paypal_save_new">Save new PayPal account!</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>