<?php 
	if ( !empty($get_user_specific) ) {
		foreach ( $get_user_specific as $gus ) :
?>
			<center><img class="img-responsive" src="<?php echo base_url(); ?>public/img/<?php echo $gus->IMAGEURL; ?>" style="width:150px;height:150px;"/></center>
			<hr class="no-margin margin-top"/>
			<div class="padding-top">
				<div class="ibox-content no-margin no-border">
					<div class="form-group">
						<label>Name</label>
						<div><?php echo $gus->FIRSTNAME.' '.$gus->LASTNAME; ?></div>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<div><?php echo $gus->EMAIL; ?></div>
					</div>
					<div class="form-group">
						<label>Username</label>
						<div><?php echo $gus->USERNAME; ?></div>
					</div>
					<div class="form-group">
						<label>Contact</label>
						<div><?php echo $gus->PHONENUMBER; ?></div>
					</div>
				</div>
			</div>
<?php
		endforeach;
	}
?>
<hr class="no-margin"/>
<div class="padding-top">
	<input type="button" value="Change Profile Picture" data-toggle="modal" data-target="#modalChangeProfilePicture" class="btn btn-default full-width"/>
</div>
<div class="padding-top">
	<input type="button" value="Change Information" data-toggle="modal" data-target="#modalChangePersonalInformation" class="btn btn-default full-width"/>
</div>
<div class="padding-top">
	<input type="button" value="Change Password" data-toggle="modal" data-target="#modalChangePassword" class="btn btn-default full-width"/>
</div>
<div class="padding-top">
    <input type="button" value="Change Location" data-toggle="modal" data-target="#modalChangeLocation" class="btn btn-default full-width"/>
</div>

<div class="modal inmodal" id="modalChangeLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Change your location</h4>
            </div>
            <div class="modal-body padding-bottom padding-top no-padding-bottom">
                <div class="ibox-content no-border">
                    <div id="map" class="google-map full-width" style="height: 500px;"></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" id="txt_lat_prof_user" disabled />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Longhitude</label>
                            <input type="text" class="form-control" id="txt_long_prof_user" disabled />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success full-width" type="submit" id="btn_latlong_submit_user">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal inmodal" id="modalChangeProfilePicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content animated pulse">
        	<div class="modal-header">
                <h4 class="modal-title">Change Profile Picture</h4>
            </div>
            <div class="modal-body padding-bottom padding-top no-padding-bottom">
            	<div class="form-group">
            		<img class="img-responsive" style="height: 200px;width:100%;" src="<?php echo base_url(); ?>public/img/<?php echo $this->session->userdata('user_session')->IMAGEURL;?>" />
            	</div>
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>profile/change_profile">
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
                        <button class="btn btn-success full-width" type="submit" name="btn_update_image_profile">Change Picture</button>
                    </div>
                </form>       
                
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modalChangePersonalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
        	<div class="modal-header">
                <h4 class="modal-title">Change Personal Information</h4>
            </div>
            <div class="modal-body padding-bottom padding-top no-padding-bottom">
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>First name</label>
            				<input type="text" class="form-control" id="txt_fname_profile_change" value="<?php echo $this->session->userdata('user_session')->FIRSTNAME; ?>" />
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Last name</label>
            				<input type="text" class="form-control" id="txt_lname_profile_change" value="<?php echo $this->session->userdata('user_session')->LASTNAME; ?>" />
            			</div>
            		</div>
            		<div class="col-md-12">
            			<div class="form-group">
            				<label>Email Address</label>
            				<input type="text" class="form-control" id="txt_email_profile_change" value="<?php echo $this->session->userdata('user_session')->EMAIL; ?>" />
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Username</label>
            				<input type="text" class="form-control" id="txt_uname_profile_change" value="<?php echo $this->session->userdata('user_session')->USERNAME; ?>" />
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Contact</label>
            				<input type="text" class="form-control" id="txt_contact_profile_change" value="<?php echo $this->session->userdata('user_session')->PHONENUMBER; ?>" />
            			</div>
            		</div>
            	</div>
            	<div class="form-group">
            		<button class="btn btn-success full-width" id="btn_submit_change_information_profile">Submit</button>
            	</div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content animated pulse">
        	<div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body padding-bottom padding-top no-padding-bottom">
            	<div class="row">
            		<div class="col-md-12">
            			<div class="form-group">
            				<label>Current Password</label>
            				<input type="password" class="form-control" id="txt_current_pword" />
            			</div>
            		</div>
            		<div class="col-md-12">
            			<div class="form-group">
            				<label>Password</label>
            				<input type="password" class="form-control" id="txt_pword_changeprofile" disabled />
            			</div>
            		</div>
            		<div class="col-md-12">
            			<div class="form-group">
            				<label>Confirm Password</label>
            				<input type="password" class="form-control" id="txt_conpword_changeprofile" disabled />
            			</div>
            		</div>
            	</div>
            	<div class="form-group">
            		<button class="btn btn-success full-width" id="btn_submit_change_password_profile">Submit</button>
            	</div>
            </div>
        </div>
    </div>
</div>