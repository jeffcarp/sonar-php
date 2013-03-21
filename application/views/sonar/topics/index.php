<ul class="gibbon">
	<?
	foreach ($topics as $t):
		?>
		<li class="clearfix">
			<h3><a href="/sonar/topics/edit/<?=$t->topic_ID?>"><?=$t->topic_Name?></a></h3>
			<h5><?=$t->topic_Slug?></h5>
		</li>
		<?
	endforeach;
	?>
</ul>