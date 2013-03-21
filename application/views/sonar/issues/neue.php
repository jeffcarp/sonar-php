<div class="vervet">
	
	<section>
		
		<h1>New Issue</h1>
		
		<a href="/sonar/issues">
			<button class="minimal">Back</button>
		</a>
	
	</section>
	
	<div class="shadow"></div>
	
	<form class="edit" action="/sonar/issues/create" method="post">
		
		<section>
			<h3>Name</h3>
			<input type="text"
				   name="issue_Name"
				   placeholder="e.g. 'Pride Issue'" />
		</section>
		
		<section>
			<h3>Volume</h3>
			<input type="text"
				   name="issue_Volume"
				   value="<?=$i->issue_Volume?>" />
		</section>
		
		<section>
			<h3>Edition</h3>
			<input type="text"
				   name="issue_Edition"
				   value="<?=$i->issue_Edition+1?>" />
		</section>
		
		<section>
			<h3>Publish Date</h3>
			<input type="text"
				   name="issue_Published"
				   placeholder="must formatted like 2011-04-27" />
		</section>
		
		<section>
			<?	
			echo form_submit('submit', 'Create new issue');
			?>
		</section>
	
	</form>
		
</div>
		