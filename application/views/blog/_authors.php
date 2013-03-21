<section class="authors clearfix">
	<h3>Authors</h3>
	<?
	foreach($authors as $p){
		?>
		<div class="author clearfix">
			<?
			if(isset($p->person_Photo)):
				?>
				<a href="/people/<?= $p->person_Slug; ?>">
					<?= thumb($p->person_Photo, 80); ?>
				</a>
				<?
			endif;
			?>
			<div class="info">
				<h3><a href="/people/<?= $p->person_Slug; ?>"><?= $p->person_Name; ?></a></h3>
			</div>
		</div>
		<?
		}
	?>
</section>