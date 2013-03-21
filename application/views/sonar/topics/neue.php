<div class="neue">

	<div class="plate">
		<p>Tips</p>
		<ul>
			<li>Slugs are all-lowercase. No spaces or punctuation, just hyphens.</li>
			<li>If you leave the Slug input blank, one will be generated for you.</li>
		</ul>
	</div>
	
	<?
	echo form_open('/sonar/topics/create');
		?>
	
		<div class="plate">
			<h3>Topic Name</h3>
			<input type="text" name="topic_Name" />
		</div>
		
		<div class="plate">
			<h3>Topic Slug</h3>
			<input type="text" name="topic_Slug" />
		</div>

	
		<div class="plate">
			<input type="submit" value="Create Topic" />
		</div>
	
		<?
	echo form_close();
	?>
	
</div>