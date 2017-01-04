<div class="text-center">
    <?php
		$this->load->view('user/homecoverimage');
	?>

</div>
<div class="margin-top-fifty">
	<div class="container">
        <div class="navy-line padding-top"></div>
        <div class="text-center">
	        <h2 class="no-margin padding-top text-bold">
	            Events
	        </h2>
        </div>
        <div class="padding-top">
	        <div class="col-md-3">
	        	<div class="ibox-content full-height">
	        		<?php $this->load->view('user/events_left'); ?>
	        	</div>
	        </div>
	        <div class="col-md-9">
	        	<div class="ibox-content full-height">
	        		<?php $this->load->view('user/events_right'); ?>
	        	</div>
	        </div>
        </div>
	</div>
</div>