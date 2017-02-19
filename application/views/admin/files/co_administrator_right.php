<div class="ibox no-margin">
    <div class="ibox-title no-border">
        Preview
        <span class="pull-right">
            <a href="#" class="btn btn-link btn-sm no-padding" data-toggle="modal" data-target="#createModal">Create</a>
        </span>
    </div>
    <div class="ibox-content min-height">
        <div class="no-margins">
            <div class="row">
                <?php
                    if ( ! empty ( $get_specific ) ) {
                        foreach ( $get_specific as $gs ) :
                ?>
                            <form>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="John" id="txt_update_coa_no" class="form-control" value="<?php echo $gs->NO;?>" style="display: none;"/>
                                        <label>Full Name</label> 
                                        <input type="text" placeholder="John" id="" class="form-control" value="<?php echo $gs->FIRSTNAME.' '.$gs->LASTNAME;?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label> 
                                        <input type="text" placeholder="johndoe123" id="" class="form-control" value="<?php echo $gs->USERNAME;?>"  disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone number</label> 
                                        <input type="text" placeholder="09*********" id="" class="form-control" value="<?php echo $gs->PHONENUMBER;?>"  disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email address</label> 
                                        <input type="text" placeholder="johndoe@gmail.com" id="" class="form-control" value="<?php echo $gs->EMAIL;?>"  disabled/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permission</label>
                                        <div class="input-group full-width">

                                            <select data-placeholder="Permission" class="full-width chosen-select" multiple  tabindex="5" id="txt_select_perm_coa">
                                                <?php
                                                    if ( ! empty( $get_content ) ) {
                                                        foreach ($get_content as $gc) :
                                                ?>        
                                                            <option value="<?php echo $gc->NAME; ?>|"><?php echo $gc->NAME; ?></option>
                                                <?php
                                                        endforeach;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" id="btn_update_coa" class="btn btn-info full-width">Update co-administrator permission</button>
                                </div>
                            </form>
                <?php
                        endforeach;
                    } else {
                        echo "<div class='col-md-12'>Click an information</div>";
                    } 
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="modalCreate">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new co-administrator</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label> 
                                <input type="text" placeholder="John" id="txt_create_coa_fname" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label> 
                                <input type="text" placeholder="Doe" id="txt_create_coa_lname" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label> 
                                <input type="text" placeholder="johndoe123" id="txt_create_coa_uname" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email address</label> 
                                <input type="text" placeholder="johndoe@gmail.com" id="txt_create_coa_email" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label> 
                                <input type="password" placeholder="••••••••" id="txt_create_coa_pword" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm password</label> 
                                <input type="password" placeholder="••••••••" id="txt_create_coa_conpword" class="form-control" />
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <button class="btn btn-info full-width" id="btn_create_coa_save">Save as co-administrator</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>