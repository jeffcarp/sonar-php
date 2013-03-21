<ul class="gibbon">
	<?
	foreach ($issues as $i):
		?>
		<li class="clearfix">
			<h3><a href="/sonar/issues/edit/<?=$i->issue_ID?>">Volume <?=$i->issue_Volume?> Edition <?=$i->issue_Edition?> - <?=$i->issue_Name?></a></h3>
			<h5><?=date("F j, Y", strtotime($i->issue_Published))?></h5>
		</li>
		<?
	endforeach;
	?>
</ul>