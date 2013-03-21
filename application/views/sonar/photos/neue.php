<div class="neue">

	<div class="plate">
		<p>Tips</p>
		<ul>
			<li>Photos must be .jpg</li>
			<li>Keep photos around 1600px. The system will not accept photos >2000px.</li>
		</ul>
	</div>
	
	<?php
	
	echo form_open_multipart('/sonar/photos/create');
	
	//for ($i=1;$i<=2;$i++):
		?>
	
		<div class="plate">
			<h3>Photo</h3>
			<input type="file" name="userfile" size="40" />
		</div>
	
		<?
	//endfor;
	?>
	<input type="hidden" name="crap" value="crrrap" />
	
	<div class="plate">
		<input type="submit" value="Upload Photos" />
	</div>
	
	
	
	<?
	echo form_close();
	?>
	
</div>