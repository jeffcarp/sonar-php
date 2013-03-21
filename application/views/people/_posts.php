<div class="posts">
			
	<?
	foreach ($person->articles as $a):
		?>
		<div class="langur clearfix">

			<?
			foreach ($a->photos as $p):
				echo thumb($p->photo_ID, 100);
				break;
			endforeach;
			?>

			<h3><a href="<?=sluggish_link($a)?>" class="blue"><?=$a->article_Headline?></a></a></h3>
			<p><?=$a->article_Deck?></p>
		</div>
		<?
	endforeach;
	?>

</div>