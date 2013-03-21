<div class="pagination">
	<div class="nav">
		<?
		if ($previous && $page == 2):
			?>
			<a class="previous" href="/blog">&laquo; page <?=$page-1?></a>
			<?
		elseif ($previous):
			?>
			<a class="previous" href="/blog/page/<?=$page-1?>">&laquo; page <?=$page-1?></a>
			<?
		endif;
		if ($next) {
			?>
			<a class="next" href="/blog/page/<?=$page+1?>">page <?=$page+1?> &raquo;</a>
			<?
		}
		?>
		<a class="home" href="/blog">home</a>
	</div>
</div>