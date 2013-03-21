<?
foreach ($articles as $article):
	?>
	<div class="teaser clearfix">
		<?
		foreach ($article->photos as $p):
			?>
			<a href="<?= permalink($article) ?>">
				<img src="<?= thumb($p->photo_ID, 280, false); ?>" class="thumb" />
			</a>
			<?
			break;
		endforeach;
		?>
		
		<div class="info">
			<h1 class="headline"><a href="<?= permalink($article) ?>"><?=$article->article_Headline?></a></h1>
			<div class="byline">	
	  			By <?= authors($article) ?> on <?= date('F j, Y', strtotime($article->article_Published)) ?>
			</div>
			<div class="deck">
				<?= markdown($article->article_Deck); ?>
			</div>
		</div>
	
	</div>
	<?
endforeach;
?>