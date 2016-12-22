<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body>
		<?php 
			$this->load->view('common/navtop'); 
		?>
		<div class="landing-page">
		<?php
			switch ($curpage) {
		    	case 'Home':
		    		echo $content;
		    		break;
		    	case 'Templates':
		    		echo $content;
		    		break;
		    	case 'Events':
		    		echo $content;
		    		break;
			}

			$this->load->view('common/footer_user'); 
		?>

		</div>
		<?php $this->load->view('common/js_files_includes'); ?>
	</body>
</html>