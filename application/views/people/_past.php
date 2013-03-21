<div class="past">
	<h2>PAST CONTRIBUTORS</h2>
	
	<?
	foreach ($past as $u):
		?>
		<div class="roloway clearfix">
			<?//=thumb(22, 100);?>
			<h3><a href="/people/<?=$u->person_Slug?>" class="blue"><?=$u->person_Name?></a></a></h3>
			<?
			if ($u->person_Position && $u->person_Year) {
				?>
				<p><strong><?=$u->person_Position?></strong>, graduated <?=$u->person_Year?>.</p>
				<?
			}
			?>
		</div>
		<?
	endforeach;
	?>


</div>