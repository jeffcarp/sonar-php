<div class="capuchin">

	<div class="upper" onclick="location.href= '/bubble'">
		<h3>The Echo Blog</h3>
		<span>Recent posts</span>
	</div>

	<ul>
	
	<?
	foreach ($bubble as $a):
		?>
		<li class="clearfix">
		
			<?
			foreach ($a->photos as $p):
				?>
				<a href="<?=permalink($a)?>"><?=thumb($p->photo_ID, 50)?></a>
				<?
				break;
			endforeach;
			?>
		
			<div class="text">
				<h4><a href="<?=permalink($a)?>"><?=$a->article_Headline?></a></h4>
				<p><?=authors($a)?></p>
			</div>
		</li>
		<?
	endforeach;
	?>
	
	</ul>

</div>