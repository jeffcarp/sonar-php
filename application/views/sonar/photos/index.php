<div class="mosaic">
	<?
	foreach ($photos as $p):
		?>
		<div 
		  class="tile" 
		  style="background-image:url('/photos/get/<?=$p->photo_ID?>/180');
		  		 background-position: center top;"
		  onclick="location.href = '/sonar/photos/edit/<?=$p->photo_ID?>'"
		>
		</div>	
		<?
	endforeach;
	?>
</div>