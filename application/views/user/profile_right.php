<nav class="nav2 navbar navbar-default no-margin no-border-radius " style="background-color: #0076BE;font-size: 13px;">
    <div class="container-fluid">
    	<div class="text-center">
                <ul class="nav navbar-nav" style="display: inline-block;">

                    <div class="text-center">
                    <ul class="nav navbar-nav" style="display: inline-block;">

                        <li class="text-center">
                            <a class="hvr-underline-reveal" href="<?php echo base_url();?>profile"><strong>Post</strong></a>
                        </li>

                        <li class="text-center">
                            <a class="hvr-underline-reveal" class="" href="<?php echo base_url();?>profile/issue_tracker"><strong>Issue Tracker</strong></a>
                        </li>

                    </ul>
            </div>
    </div>

</nav>

<?php 
	if ( $curpage == "Profile" && $this->session->userdata('account_type') == "User" ) {
		$this->load->view('user/profile_post');
	} elseif ( $curpage == "Issue Tracker" && $this->session->userdata('account_type') == "User" ) {
		$this->load->view('user/profile_issuetracker');
	}
?>


