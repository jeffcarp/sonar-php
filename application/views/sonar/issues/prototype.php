<?
foreach($issues as $i):
	?>
	<section class="paper issue">
		<h2><?=$i->issue_Name?>&nbsp; <span><?=date("F j, Y", strtotime($i->issue_Published))?></span></h2>
		<ul class="department">
			<?
			foreach($departments as $d):
				?>
				<li class="clearfix">
					<h3>
					<? 
					echo ($d->department_Name == 'Arts & Entertainment') ? 'A&E' : $d->department_Name;
					?>
					</h3>
					<?
					$a_counter = 0;
					foreach($i->articles as $a):
						if($a->article_Department == $d->department_ID):
							$a_counter = $a_counter+1;
						endif;
					endforeach;
					?>
					<h4>Articles: <span><?=$a_counter?></span></h4>
					<ul>
						<?
						foreach($i->articles as $a):
							if($a->article_Department != $d->department_ID):
								continue;
							else:
								?>
								<li>
									<a href="/sonar/articles/edit/<?=$a->article_ID?>" <? if($a->article_Status == "draft"){?>class="draft"<? } ?>><?=substr($a->article_Headline, 0, 30);?>…</a>
								</li>
								<?
							endif;
						endforeach;
						?>
					</ul>
				</li>
				<?
			endforeach;
			?>
		</ul>
	</section>
	<?
endforeach;
?>