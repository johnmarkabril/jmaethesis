<div id="search">
	<div class="padding-top">
		<input type="text" class="form-control search" placeholder="Search a name or contact or email address..." />
	</div>
	<div class="row">
		<div class="list">
			<?php
				if ( !empty($get_all_team) ) {
					foreach ( $get_all_team as $gat ) :
			?>
						<div class="col-md-4 padding-top">
							<div class="contact-box center-version">
								<a data-toggle="modal" data-target="#modalUpdate<?php echo $gat->NO; ?>">
					                <img alt="image" class="img-circle" src="<?php echo base_url(); ?>public/img/<?php echo $gat->IMAGEURL; ?>">
					                <h3 class="m-b-xs name"><strong><?php echo $gat->FIRSTNAME ." ". $gat->LASTNAME; ?></strong></h3>
					                <div class="text-center">- <?php echo $gat->CONTACT; ?> | <?php echo $gat->EMAILADDRESS; ?> -</div>
					               <div class="contact" style="display: none;"><?php echo $gat->CONTACT; ?></div>
					               <div class="email" style="display: none;"><?php echo $gat->EMAILADDRESS; ?></div>
					            </a>
					            <div class="contact-box-footer">
					                <a data-toggle="modal" data-target="#modalDeleteTeam<?php echo $gat->NO; ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					            </div>
					        </div>
						</div>
			<?php
					endforeach;
				}
			?>
		</div>
	</div>
</div>
<?php
    foreach ($get_all_team as $gat) :
?>
        <div class="modal inmodal" id="modalDeleteTeam<?php echo $gat->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                	<div class="modal-header">
                        <h4 class="modal-title">Are you sure, you want to delete this as your team member?</h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" id="btn_cancenl_team" data-dismiss="modal" class="btn btn-default btn-lg full-width">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/team/delete/<?php echo $gat->NO; ?>" type="button" id="btn_delete_team" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>

<?php
    foreach ($get_all_team as $gat) :
?>
        <div class="modal inmodal" id="modalUpdate<?php echo $gat->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog" role="document">
      		<div class="modal-content animated pulse">
      		    <div class="modal-header">
      	            <h4 class="modal-title">Update a member on your team</h4>
      	        </div>
      	        <div class="modal-body no-padding-bottom">

      	        	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/team/update">
      	        		<div class="form-group">
                            <input type="file" name="image" accept="image/*" class="file hide" />
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="text" class="form-control" value="<?php echo $gat->IMAGEURL; ?>"  disabled placeholder="Upload Image">
                                <span class="input-group-btn">
                                    <button class="browse btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                </span>
                            </div>
      	        		</div>
	      	            <div class="form-group">
	      	                <div class="row">
	      	                	<input type="text" style="display: none;" value="<?php echo $gat->NO; ?>" name="txt_no" />
	      	                	<div class="col-md-6">
	      	                		<label>First Name</label>
	      	                		<input type="text" class="form-control" value="<?php echo $gat->FIRSTNAME; ?>" name="txt_team_firstname_update" pattern="[a-zA-Z-_]+( [a-zA-Z-_]+)*$" title="Invalid format" required />
	      	                	</div>
	      	                	<div class="col-md-6">
	      	                		<label>Last Name</label>
	      	                		<input type="text" class="form-control" value="<?php echo $gat->LASTNAME; ?>" name="txt_team_lastname_update" pattern="[a-zA-Z-_]+( [a-zA-Z-_]+)*$" title="Invalid format" required />
	      	                	</div>
	      	                </div>
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <label>Contact</label>
	      	                <input type="text" class="form-control" value="<?php echo $gat->CONTACT; ?>" name="txt_team_contact_update" placeholder="09123456789" pattern="^[0-9]{1,15}$" title="11-15 numbers allowed." required />
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <label>Email Address</label>
	      	                <input type="text" class="form-control" value="<?php echo $gat->EMAILADDRESS; ?>" name="txt_team_email_update" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid email format" required />
	       	 	       	</div>
	      	            <div class="form-group">
	      	                <div class="row">
	      	                	<div class="col-md-6">
	      	                		<label>Facebook URL</label>
	      	                		<input type="text" class="form-control" value="<?php echo $gat->FACEBOOK; ?>" name="txt_team_fb_update"/>
	      	                	</div>
	      	                	<div class="col-md-6">
	      	                		<label>Twitter URL</label>
	      	                		<input type="text" class="form-control" value="<?php echo $gat->TWITTER; ?>" name="txt_team_twitter_update"/>
	      	                	</div>
	      	                </div>
	       	 	       	</div>
	                    <div class="form-group">
	                        <input type="submit" class="btn btn-success full-width" name="btn_team_update" value="Update"/>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    endforeach;
?>