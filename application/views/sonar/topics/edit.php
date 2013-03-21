<div class="vervet">
	
	<section>
		
		<h1>Editing <?=$t->topic_Name?></h1>
		
		<a href="/topics/<?=$t->topic_Slug?>">
			<button class="minimal">Front-facing link</button>
		</a>
		<a href="/sonar/topics/destroy/<?=$t->topic_ID?>" class="destroy">
			<button class="minimal">Delete <?=$t->topic_Name?></button>
		</a>
		<a href="/sonar/topics">
			<button class="minimal">Back</button>
		</a>
		<!--		
		<ul>
			<li>Slugs are all-lowercase. No spaces or punctuation, just hyphens.</li>
			<li>If you leave the Slug input blank, one will be generated for you.</li>
		</ul>
		-->		
	</section>
	
	<div class="shadow"></div>
	
	<form class="edit" action="/sonar/topics/update" method="post">
		
		<section>
			<h3>Name</h3>
			<?
			echo form_input('topic_Name', $t->topic_Name);
			?>
		</section>
		
		<section>
			<h3>Slug</h3>
			<input type="text"
				   name="topic_Slug"
				   value="<?=$t->topic_Slug?>"
				   placeholder="leave blank for auto-generated slug" />
		</section>
		
		<?
		echo form_hidden('topic_ID', $t->topic_ID);
		?>
		
		<section>
			<?	
			echo form_submit('submit', 'Submit Changes');
			?>
		</section>
	
	</form>
		
</div>

<h2 class="bengal"><?=$t->topic_Name?> articles</h2>
	
<ul class="gibbon canopy">
	<?
	foreach($articles as $a):
		?>
		<li class="clearfix">
			<h3><a href="/sonar/articles/edit/<?=$a->article_ID?>"><?=$a->article_Headline?></a></h3>
			<h5><?=$a->department_Name?></h5>
		</li>
		<?
	endforeach;
	?>
</ul>