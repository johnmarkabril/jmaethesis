<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Website Online</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>
<div class="padding-top">
	<div id="search">
		<center>
        	<input type="text" class="form-control search" placeholder="Search Website Online">
    	</center>
    	<div class="row">
            <div class="list">
            	<?php
            		if ( !empty($get_all_online) ) {
            			foreach ( $get_all_online as $gao ) :
            	?>
		                    <div class="col-md-3 padding-top">
		                        <div class="ibox">
		                            <div class="ibox-content product-box">
		                                <div>
		                                    <a data-toggle="modal" data-target="#updateModal<?php echo $gao->NO;?>">
		                                        <img class="img-responsive prod-admin full-width" src="<?php echo base_url(); ?>public/img/template/<?php echo $gao->IMAGEURL; ?>" style="width: 300px; height: 200px;"/>
		                                    </a>
		                                </div>
		                                <div class="padding-top" style="height: 60px;">
		                                    <div class="text-center">
		                                    	<?php
		                                    		$url = str_replace("http://", "", $gao->SITEURL);
		                                    		$newUrl = str_replace("/", "", $url);
		                                    	?>
		                                        <a href="#" class="product-name link"><small><?php echo $newUrl;?></small></a>
		                                    </div>
		                                </div>
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
</div>

<?php
    foreach ($get_all_online as $gao) :
?>
        <div class="modal inmodal" id="updateModal<?php echo $gao->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $gao->OWNERTITLEWEBSITE; ?></h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                    	<div class="form-group">
                    		<img class="img-responsive" src="<?php echo base_url(); ?>public/img/template/<?php echo $gao->IMAGEURL; ?>" />
                    	</div>
                        <div class="form-group">
                        	<label>Site URL</label>
                        	<input type="text" class="form-control" value="<?php echo $gao->SITEURL; ?>" disabled />
                        </div>
                        <div class="form-group">
                        	<label>Website Title</label>
                        	<input type="text" class="form-control" id="txt_no_wo" value="<?php echo $gao->NO; ?>" style="display: none;" />
                        	<input type="text" class="form-control" id="txt_title_wo" value="<?php echo $gao->OWNERTITLEWEBSITE; ?>" />
                        </div>
                        <div class="form-group">
                        	<label>Owner</label>
                        	<input type="text" class="form-control" id="txt_owner_wo" value="<?php echo $gao->CURRENTOWNER; ?>" />
                        </div>
                        <div class="form-group">
                        	<div class="row">
                        		<div class="col-md-6 padding-top">
                        			<button class="btn btn-info full-width" data-dismiss="modal" data-toggle="modal" data-target="#updateImageModal<?php echo $gao->NO;?>" type="button">Change website image</button>
                        		</div>
                        		<div class="col-md-6 padding-top">
                        			<button class="btn btn-success full-width" type="button" id="btn_update_wo">Update website information</button>
                        		</div>
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
    foreach ($get_all_online as $gao) :
?>
        <div class="modal inmodal" id="updateImageModal<?php echo $gao->NO;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content animated pulse">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo 'Update website image of '.$gao->OWNERTITLEWEBSITE; ?></h4>
                    </div>
                    <div class="modal-body padding-bottom padding-top">
                    	<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>admin/website_online/update_image/<?php echo $gao->NO;?>">
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
	      	        			<button class="btn btn-success full-width" type="submit" name="btn_update_image_wo">Update website image</button>
	      	        		</div>
	      	        	</form>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>