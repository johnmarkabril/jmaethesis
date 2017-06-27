<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body style="background-color: #2f4050;">
		<div id="wrapper">
			<?php $this->load->view('common/navside_admin.php'); ?>
			<div id="page-wrapper" class="gray-bg">
				<div class="wrapper">

            		<div class="row border-bottom">
            			<?php $this->load->view('common/navtop_admin'); ?>
            		</div>
            		<div>
						<?php
							switch ($curpage) {
						    	case 'About My Site':
						    		echo $content;
						    		break;
						    	case 'Account':
						    		echo $content;
						    		break;
						    	case 'Agent':
						    		echo $content;
						    		break;
						    	case 'Contact':
						    		echo $content;
						    		break;
						    	case 'Co-Administrator':
						    		echo $content;
						    		break;
						    	case 'Dashboard':
						    		echo $content;
						    		break;
						    	case 'Events':
						    		echo $content;
						    		break;
						    	case 'Message':
						    		echo $content;
						    		break;
						    	case 'Notification':
						    		echo $content;
						    		break;
						    	case 'PayPal Configuration':
						    		echo $content;
						    		break;
						    	case 'Profile':
						    		echo $content;
						    		break;
						    	case 'Reports':
						    		echo $content;
						    		break;
						    	case 'Team':
						    		echo $content;
						    		break;
						    	case 'Website Online':
						    		echo $content;
						    		break;
						    	case 'Website Template':
						    		echo $content;
						    		break;
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('common/analyticstracking.php'); ?>
		<?php $this->load->view('common/js_files_includes'); ?>
	</body>
</html>