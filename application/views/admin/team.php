<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Team
		<span class="pull-right">
			<a class="btn-link" data-toggle="modal" data-target="#createModal">Create</a> 
		</span>
	</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>
		
	<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content animated pulse">
      		    <div class="modal-header">
      	            <h4 class="modal-title">Create new member on your team</h4>
      	        </div>
      	        <div class="modal-body no-padding-bottom">

      	        	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/team/create">
      	        		<div class="form-group">
                            <input type="file" name="image" accept="image/*" class="file hide" />
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="text" class="form-control" disabled placeholder="Upload Image">
                                <span class="input-group-btn">
                                    <button class="browse btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                </span>
                            </div>
      	        		</div>
	      	            <div class="form-group">
	      	                <div class="row">
	      	                	<div class="col-md-6">
	      	                		<label>First Name</label>
	      	                		<input type="text" class="form-control" name="txt_team_firstname" pattern="[a-zA-Z-_]+( [a-zA-Z-_]+)*$" maxlength="50" title="Invalid format" required />
	      	                	</div>
	      	                	<div class="col-md-6">
	      	                		<label>Last Name</label>
	      	                		<input type="text" class="form-control" name="txt_team_lastname" pattern="[a-zA-Z-_]+( [a-zA-Z-_]+)*$" maxlength="50" title="Invalid format" required />
	      	                	</div>
	      	                </div>
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <label>Contact</label>
	      	                <input type="text" class="form-control" name="txt_team_contact" placeholder="09123456789" minlength="11" pattern="^[0-9]{1,15}$" title="11-15 numbers allowed." required />
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <label>Email Address</label>
	      	                <input type="text" class="form-control" name="txt_team_email" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid email format" required />
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <div class="row">
	      	                	<div class="col-md-6">
	      	                		<label>Facebook URL</label>
	      	                		<input type="text" class="form-control" name="txt_team_fb"/>
	      	                	</div>
	      	                	<div class="col-md-6">
	      	                		<label>Twitter URL</label>
	      	                		<input type="text" class="form-control" name="txt_team_twitter"/>
	      	                	</div>
	      	                </div>
	       	 	       	</div>
	                    <div class="form-group">
	                        <input type="submit" class="btn btn-success full-width" name="btn_team_create" value="Submit"/>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/files/team_content'); ?>