<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body style="background-color: #2f4050;">
		<div id="wrapper">
			<?php $this->load->view('common/navside_agent.php'); ?>
			<div id="page-wrapper" class="gray-bg sidebar-content"  style="height: auto;">
            	<div class="row border-bottom">
                	<?php $this->load->view('common/navtop_admin'); ?>
            	</div>
            	<?php $this->load->view('common/agent_sidebar'); ?>
	            <div class="wrapper wrapper-content">
	                <?php
						switch ($curpage) {
						    case 'Contact':
						    	echo $content;
						    	break;
						   	case 'Events':
						   		echo $content;
						   		break;
						    case 'Issue Tracker':
						    	echo $content;
						    	break;
						    case 'Message':
						    	echo $content;
						    	break;
						    case 'Notification':
						    	echo $content;
						    	break;
						    case 'Profile':
						    	echo $content;
						    	break;
						    case 'Purchased Template':
						    	echo $content;
						    	break;
						    case 'Templates':
						    	echo $content;
						    	break;
						}
					?>
	            </div>
        	</div>

		</div>
		<?php $this->load->view('common/analyticstracking.php'); ?>
		<?php $this->load->view('common/js_files_includes_agent'); ?>
	</body>
</html>