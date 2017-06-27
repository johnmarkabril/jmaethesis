<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body>
		<?php 
			$this->load->view('common/navtop'); 
			$this->load->view('common/coverimage'); 
		?>
		<div class="container margin-top-fifty">
			<?php
				switch ($curpage) {
			    	case 'Blog':
			    		echo $content;
			    		break;
			    	case 'Events':
			    		echo $content;
			    		break;
			    	case 'Home':
			    		echo $content;
			    		break;
			    	case 'Issue Tracker':
			    		echo $content;
			    		break;
			    	case 'Profile':
			    		echo $content;
			    		break;
			    	case 'Testimonial':
			    		echo $content;
			    		break;
			    	case 'Signup':
			    		echo $content;
			    		break;
				}
			?>
		</div>
		<?php $this->load->view('common/footer_user'); ?>
		<?php $this->load->view('common/analyticstracking.php'); ?>
		<?php $this->load->view('common/js_files_includes'); ?>
	</body>
</html>