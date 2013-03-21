<div class="mosaic clearfix">
	<?
	foreach ($staff as $p):
		if ($p->person_Photo) {
			?>
			<div 
				  class="tile" 
				  style="background-image:url('<?=thumb($p->person_Photo, 160, false)?>');"
		  		onclick="location.href = '/sonar/people/edit/<?=$p->person_ID?>'"
			>
		</div>	
		<?
		} else {
			?>
			<div class="tile" onclick="location.href = '/sonar/people/edit/<?=$p->person_ID?>'"><?=$p->person_Name?></div>
			<?
		}
	endforeach;
	?>
</div>

<div class="section">
	<ul class="gibbon">
	<?
	foreach ($others as $p):
		?>
		<li class="clearfix">
			<h3><a href="/sonar/people/edit/<?=$p->person_ID?>"><?=$p->person_Name?></a></h3>
			<h5><?=$p->person_Position?></h5>
		</li>
		<?
	endforeach;
	?>
</ul>
</div>