<div class="bonito">
				
	<h2><a href="/opinion" class="black">OPINION &raquo;</a></h2>
	
	<ul>
		<?

		foreach ($opinion as $a):
			?>
			<li class="clearfix">
				<?
				foreach ($a->people as $u):
					if ($u->person_Photo):
					?>
					<a href="<?=sluggish_link($a)?>"><?=thumb($u->person_Photo, 50)?></a>
					<?
					endif;
					break;
				endforeach;
				?>
				<div class="text">
					<h4><a href="<?=sluggish_link($a)?>"><?=$a->article_Headline?></a></h4>
					<span><?=authors($a)?></span>
				</div>
			</li>
			<?
		endforeach;
		?>
	</ul>
	
</div>