<div class="padding-top">
    <div class="ibox-content padding-all no-border full-width" style="background-color: #0076BE;">
        <h4 class="no-margin" style="color: #FFFFFF;">Create an account</h4>
    </div>
</div>
<div class="ibox-content no-border">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>First name</label>
				<input type="text" class="form-control" id="txt_firstname_signup" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Last name</label>
				<input type="text" class="form-control" id="txt_lastname_signup" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" id="txt_username_signup" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Contact number</label>
				<input type="text" class="form-control" id="txt_contact_signup" maxlength="11" />
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label>Email Address</label>
				<input type="text" class="form-control" id="txt_email_signup" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="txt_pword_signup" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" id="txt_conpword_signup" />
			</div>
		</div>
	</div>
	<div class="padding-top">
		<input type="button" class="btn btn-success full-width" value="Submit" id="btn_submit_signup" />
		<div id="reopen_verification_code" style="display: none;">
			<center><a data-toggle="modal" data-target="#modalVerificationCode">Re-open verification code</a></center>
		</div>
	</div>
</div>

<div class="modal inmodal" id="modalVerificationCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
           	<div class="modal-header">
                <h4 class="modal-title">Sign Up - Verification code</h4>
            </div>
            <div class="modal-body padding-bottom padding-top">
            	<div class="ibox-content no-border">
            		<label>Note:</label>
            		<div>If the verification code is not receive for 5 minutes, just click the resend code below!</div>
            	</div>
            	<div class="form-group padding-top">
            		<label>Verification Code</label>
					<input type="text" class="form-control" id="txt_email_vc" style="display:none;"/>
            		<input type="text" class="form-control text-bold text-center" style="font-size: 20px;height: 40px;" id="txt_verificationcode_vc" />
            	</div>
            	<div class="form-group no-margin">
            		<button type="button" class="btn btn-success full-width" id="btn_submit_vc">Submit</button>
            	</div>
            	<center><a id="resend_code_vc">Resend the code</a></center>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modalSuccessSignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
           	<div class="modal-header">
                <h4 class="modal-title">Welcome, you're a part of JMAE Provider now!</h4>
            </div>
            <div class="modal-body padding-bottom padding-top">
            	<div class="ibox-content no-border text-center">
            		<label>Welcome</label>
            		<div>Being a JMAE Provider user is wonderful. Good luck and God bless!</div>
            		<div>You can now login to our site.</div>
            	</div>
            </div>
        </div>
    </div>
</div>