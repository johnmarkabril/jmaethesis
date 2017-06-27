<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Food E-commerce Templates</h4>
    </div>
</div>

<div class="row">
    <?php
        if ( !empty($get_all_available_templates) ) {
            foreach ( $get_all_available_templates as $gaat ) :
    ?>
                <div class="col-md-3 padding-top">
                    <div class="ibox-content product-box">
                        <div>
                            <img src="<?php echo base_url(); ?>public/img/template/<?php echo $gaat->IMAGEURL; ?>" class="img-responsive" />
                        </div>
                        <div class="product-desc">
                            <span class="product-price">
                                ₱ <?php echo number_format($gaat->PRICE, 2, '.', ','); ?>
                            </span>
                            <small class="text-muted">Renting for a minimum of 1 month.</small>
                            <a href="<?php echo $gaat->SITEURL; ?>" target="_blank" class="product-name" style="height:44px"> <?php echo $gaat->TEMPLATENAME; ?></a>
                            <div class="small m-t-xs" style="height: 30px">
                                <?php echo $gaat->LIBRARYUSE; ?>
                            </div>
                            <div class="m-t text-righ text-center">
                                <a href="<?php echo $gaat->SITEURL; ?>" target="_blank" class="btn btn-xs btn-outline btn-info">Live Preview</i> </a>
                                <span><a data-toggle="modal" data-target="#modalRentThisSite<?php echo $gaat->NO; ?>" class="btn btn-xs btn-outline btn-success">Rent this site</i> </a> </span>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            endforeach;
        }
    ?>
</div>

<?php
    if ( !empty($get_all_available_templates) ) {
        foreach ( $get_all_available_templates as $gaat ) :
            if ( !empty($this->session->userdata('user_session')) ) {
?>
                <div class="modal inmodal" id="modalRentThisSite<?php echo $gaat->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content animated pulse">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $gaat->TEMPLATENAME; ?></h4>
                            </div>
                            <div class="modal-body padding-bottom padding-top">
                                <div class="ibox-content no-border">
                                    <label style="color: red;">JMAE Provider note:</label>
                                    <div>You can rent this cms template with a minimum duration of 1 month.</div>
                                </div>
                                <div class="form-group padding-top">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>public/img/template/<?php echo $gaat->IMAGEURL; ?>" />
                                </div>
                                <div id="first_form_rts<?php echo $gaat->NO; ?>">
                                    <div class="form-group padding-top">
                                        <input type="text" class="form-control" id="txt_no_rts<?php echo $gaat->NO;?>" value="<?php echo $gaat->NO; ?>" style="display:none;"/>
                                        <label>Select a period of time</label>
                                        <select class="form-control text-center" id="txt_period_rts<?php echo $gaat->NO;?>" required>
                                            <option value="period=01 month&price= <?php echo $gaat->PRICE*1; ?>">1 month - ₱<?php echo number_format($gaat->PRICE*1); ?></option>
                                            <option value="period=03 months&price=<?php echo $gaat->PRICE*3; ?>">3 months - ₱<?php echo number_format($gaat->PRICE*3); ?></option>
                                            <option value="period=06 months&price=<?php echo $gaat->PRICE*6; ?>">6 months - ₱<?php echo number_format($gaat->PRICE*6); ?></option>
                                            <option value="period=12 months&price=<?php echo $gaat->PRICE*12; ?>">12 months - ₱<?php echo number_format($gaat->PRICE*12); ?></option>
                                            <option value="period=24 months&price=<?php echo $gaat->PRICE*24; ?>">24 months - ₱<?php echo number_format($gaat->PRICE*24); ?></option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <label>Create your sub-domain</label>
                                                <input type="text" class="form-control" id="txt_subdomain_rts<?php echo $gaat->NO;?>" maxlength='20' required/>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 no-padding-left">
                                            <div class="form-group">
                                                <label>domain of the company</label>
                                                <input type="text" class="form-control" id="txt_jmaedomain_rts<?php echo $gaat->NO;?>" value=".jmaeprovider.xyz" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="btn_submit_rts<?php echo $gaat->NO;?>" value="Submit" class="btn btn-success"/>
                                    </div>
                                </div>
                                <div id="second_form_rts<?php echo $gaat->NO; ?>"  style="display: none;">
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="no-margin">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="business" value="<?php echo $paypal_id;?>">
                                        <input type="hidden" name="custom" value="" id="custom_js_rts<?php echo $gaat->NO; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $gaat->TEMPLATENAME;?>">
                                        <input type="hidden" name="currency_code" value="PHP">
                                        <input type="hidden" name="item_number" value="<?php echo $gaat->NO; ?>">
                                        <input type="hidden" name="amount"  id="item_price<?php echo $gaat->NO; ?>" >
                                        <button type="submit" class="btn btn-success btn-lg full-width" name="btn_submit_rts<?php echo $gaat->NO; ?>">Rent Now</button>
                                        <input type="hidden" name="return" value="http://jmaeprovider.xyz/template/success">
                                        <input type='hidden' name='notify_url' value='http://jmaeprovider.xyz/template/success'>
                                        <input type="hidden" name="cancel_return" value="http://jmaeprovider.xyz/template">
                                    </form>
                                    <button class="btn btn-link full-width" id="btn_back_rts<?php echo $gaat->NO;?>">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
            } else {
?>
                <div class="modal inmodal" id="modalRentThisSite<?php echo $gaat->NO; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content animated pulse">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $gaat->TEMPLATENAME; ?></h4>
                            </div>
                            <div class="modal-body padding-bottom padding-top">
                                <div class="ibox-content no-border text-center">
                                    <label style="color: red;">JMAE Provider note:</label>
                                    <div>You must log-in first before you access this form!</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
<?php
            }
        endforeach;
    }
?>