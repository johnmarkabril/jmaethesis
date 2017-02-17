<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Reports</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>

<div class="row">
	<div class="col-md-12 padding-top">
		<?php $this->load->view('admin/files/report_user'); ?>
	</div>
	<div class="col-md-12 padding-top">
		<?php $this->load->view('admin/files/report_useractivity'); ?>
	</div>
	<div class="col-md-12 padding-top" style="max-height: 500px;">
		<?php $this->load->view('admin/files/report_sales'); ?>
	</div>
</div>