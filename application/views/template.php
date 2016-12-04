<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body>
		<?php 
			$this->load->view('common/navtop_user'); 
			switch ($curpage) {
	    		case 'Home':
	    			echo $content;
	    			break;
	    		case 'Events':
	    			echo $content;
	    			break;
	    		case 'Sites':
	    			echo $content;
	    			break;
	    		case 'Templates':
	    			echo $content;
	    			break;
	    		case 'Team':
	    			echo $content;
	    			break;
	    		case 'Testimonials':
	    			echo $content;
	    			break;
			}
		?>
		<?php $this->load->view('common/js_files_includes'); ?>
	</body>
</html>