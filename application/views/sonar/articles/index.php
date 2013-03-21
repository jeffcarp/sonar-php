<ul class="articles">
	<?
	foreach($articles as $a):
		?>
		<li class="clearfix">
			<h3 class="<?=$a->article_Status?>" style="display: inline;"><a href="/sonar/articles/edit/<?=$a->article_ID?>"><?=$a->article_Headline?></a></h3>
			<span class="department"><?=$a->department_Name?></span>
			
			<? /*
			<div class="pocket_2">
				<? if ($a->article_Issue == 0) { echo ''; }
				   else { ?>
					<span class="issue">Issue <?=$a->issue_Edition?></span>
				<? } ?>
			</div>
			<div class="pocket_3">
				<span class="<?=$a->department_Slug?>"><?=$a->department_Slug?></span>
			</div>
			<div class="pocket_4">
				<span class="north"><?=$a->frontpage_Column?></span>
			</div>
			*/ ?>
		</li>
		<?
	endforeach;
	?>
</ul>