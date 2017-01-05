<html>
	<head>
		<title><?php echo $curpage;?></title>

		<?php $this->load->view('common/css_files_includes'); ?>
	</head>
	<body style="background-color: #2f4050;">
		<div id="wrapper">
			<?php $this->load->view('common/navside_admin.php'); ?>
			<div id="page-wrapper" class="gray-bg">
				<div class="wrapper wrapper-content">
					<?php
						switch ($curpage) {
					    	case 'Dashboard':
					    		echo $content;
					    		break;
						}

					?>
				</div>
			</div>
		</div>
		<?php $this->load->view('common/js_files_includes'); ?>
	</body>
</html>