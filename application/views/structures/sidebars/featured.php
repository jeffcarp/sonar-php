<?
if(isset($article) && $article->article_ID == $south->article_ID) {

} else {

	if (isset($south)) {
		?>
		<div class="sidebar featured">
			<?
			if ($south->photos) {
				foreach ($south->photos as $p):
					?>
					<a href="<?=sluggish_link($south)?>">
						<? 
						echo thumb($p->photo_ID, 298);
						?>
					</a>
					<?
					break;
				endforeach;
			}
			
			?>
			<h3><a href="<?=sluggish_link($south)?>" class="blue"><?=$south->article_Headline?></a></h3>
			<p><?=$south->article_Deck?></p>
		</div>
		<?
	}
}
?>