<div class="ibox no-margin">
    <div class="ibox-title no-border">
        List
        <span class="pull-right"><a data-toggle="modal" data-target="#createModal">Create</a></span>
    </div>
    <div class="ibox-content min-height" id="search">
        <div class="no-margins">
            <div class="row">
                <div class="col-md-12">
                    <h4><input type="text" class="form-control search" placeholder="Search"/></h4>
                    <div class="table-responsive">

                        <table class="table table-striped text-center">
                            <?php if(!empty($get_all_agent)) {?>
                                <tbody class="list">
                                    <?php foreach($get_all_agent as $gaa) :?>
                                        <tr>
                                            <td class="title">
                                                <a href="<?php echo base_url();?>admin/agent/information/<?php echo $gaa->NO;?>"><?php echo $gaa->FIRSTNAME." ".$gaa->LASTNAME;?></a>
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

<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Create new agent account</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="txt_fname_agent" maxlength="50" />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="txt_lname_agent" maxlength="50" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="txt_uname_agent" maxlength="50" />
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" id="txt_email_agent" maxlength="50" />
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="txt_password_agent" maxlength="15" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="txt_confirm_agent" maxlength="15" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success full-width" id="btn_create_agent" value="Submit"/>
                </div>
            </div>
        </div>
    </div>
</div>