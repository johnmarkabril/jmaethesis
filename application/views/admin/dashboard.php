<?php $this->load->view('admin/files/dashboard_top'); ?>
<div class="row">
	<div class="col-md-9">
		<?php $this->load->view('admin/files/dashboard_sales'); ?>
	</div>
	<div class="col-md-3">
		<?php $this->load->view('admin/files/dashboard_contact'); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php $this->load->view('admin/files/dashboard_todo'); ?>
	</div>
	<div class="col-md-9">
		<?php $this->load->view('admin/files/dashboard_issue'); ?>
	</div>
	<div class="col-md-12">
		<?php $this->load->view('admin/files/dashboard_map'); ?>
	</div>
</div>