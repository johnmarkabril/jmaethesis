<div id="search">
	<div class="padding-top">
		<input type="text" class="form-control search" placeholder="Search a name or contact or email address..." />
	</div>
	<div class="row">
		<div class="list">
			<?php
				if ( !empty($get_all_contact) ) {
					foreach ( $get_all_contact as $gac ) :
			?>
						<div class="col-md-4 padding-top">
							<div class="contact-box center-version">
								<a data-toggle="modal" data-target="#modalUpdate<?php echo $gac->NO; ?>">
					                <img alt="image" class="img-circle" src="<?php echo base_url(); ?>public/img/<?php echo $gac->IMAGEURL; ?>">
					                <h3 class="m-b-xs name"><strong><?php echo $gac->NAME; ?></strong></h3>
					                <div class="text-center">- <?php echo $gac->ADDRESS; ?> -</div>
					               <div class="contact"><?php echo $gac->CONTACTNO; ?></div>
					               <div class="email"><?php echo $gac->EMAILADDRESS; ?></div>
					            </a>
					            <div class="contact-box-footer">
					                <a data-toggle="modal" data-target="#modalDeleteContact<?php echo $gac->NO; ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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
    foreach ($get_all_contact as $gat) :
?>
        <div class="modal inmodal" id="modalDeleteContact<?php echo $gat->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                <a href="<?php echo base_url(); ?>admin/contact/delete/<?php echo $gat->NO; ?>" type="button" id="btn_delete_team" class="btn btn-danger btn-lg full-width">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>