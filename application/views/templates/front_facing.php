<?php
$this->load->helper(array('url', 'html', 'thumb', 'markdown', 'pub'));
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?
		$this->load->view('structures/front_facing/head');
		?>
	</head>
	
	<body class="ocean">
		<div >
	
			<?
			$this->load->view('structures/front_facing/header');
			?>
			
			<div class="continent clearfix">
			
				<?
				$this->load->view($view);
				?>
			
			</div>
					
			<?		
			$this->load->view('structures/front_facing/footer');
			?>
		
		</div>
	</body>
</html>
