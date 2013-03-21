<?
$this->load->helper(array('html', 'form'));

echo doctype('html5');
?>

<html>
<head>
	
	<?
	echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
	?>

	<title>Login</title>
	
	<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
	
	<?
	if ($shake):
		?>
		
		<script>
		
			$(document).ready(function() {
			
				$('content').effect("shake", { times:2 }, 50);
			
			});
		
		</script>
		
		<?
	endif;
	?>
	
	<?
	echo link_tag('/public/css/reset.css');
	echo link_tag('/public/css/sonar/sessions.css');
	?>
	
</head>
<body>
	
	<content class="clearfix">
		<form action="/sonar/sessions/create/<? //$path?>" method="post">
			
			<?
			
			$data = array(
              'name'        => 'email',
              'placeholder' => 'email'
            );
            
			echo form_input($data);
			
			$data = array(
              'name'        => 'password',
              'placeholder' => 'password'
            );
            
			echo form_password($data);
			
			?>

			<input type="submit" name="submit" value="Login" class="button orange"> 	
		</form> 
	</content>

</body>
</html>