<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Contact
		<span class="pull-right">
			<a class="btn-link" data-toggle="modal" data-target="#createContactDashModal">Create</a> 
		</span>
	</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>

<div class="modal inmodal" id="createContactDashModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Add new contact</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <form role="form" id="formContactDash" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>admin/contact/insert">
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

<?php $this->load->view('admin/files/contact_content'); ?>