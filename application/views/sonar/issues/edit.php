<div class="vervet">

	<section>
		
		<h1>Editing <?=$i->issue_Name?></h1>
		
		<!--
		<a href="/topics/">
			<button class="minimal">Front-facing link</button>
		</a>
		-->
		<a href="/sonar/issues/destroy/<?=$i->issue_ID?>" class="destroy">
			<button class="minimal">Delete issue</button>
		</a>
		<a href="/sonar/issues">
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
	
	<form class="edit" action="/sonar/issues/update" method="post">
		
		<section>
			<h3>Name</h3>
			<input type="text" 
				   name="issue_Name" 
				   placeholder="e.g. Joke Issue" 
				   value="<?=$i->issue_Name?>" />
		</section>
		
		<section>
			<h3>Edition</h3>
			<?
			$volumes = array();
      		for ($j=130;$j<=135;$j++):
      			$volumes[$j] = $j;
      		endfor;
			
			echo form_dropdown('issue_Volume', $volumes, $i->issue_Volume);
			?>
		</section>
		
		<section>
			<h3>Edition</h3>
			<?
			$editions = array();
      		for ($j=1;$j<=40;$j++):
      			$editions[$j] = $j;
      		endfor;
			
			echo form_dropdown('issue_Edition', $editions, $i->issue_Edition);
			?>
		</section>
		
		<section>
			<h3>Year</h3>
			<?
			$years = array();
      		for ($j=1877;$j<=2014;$j++):
      			$years[$j] = $j;
      		endfor;
			
			echo form_dropdown('year', $years, date("Y", strtotime($i->issue_Published)));
			?>
		</section>
		
		<section>
			<h3>Month</h3>
			<?
			$months = array();
      		for ($j=1;$j<=12;$j++):
      			$months[$j] = $j;
      		endfor;
			
			echo form_dropdown('month', $months, date("m", strtotime($i->issue_Published)));
			?>
		</section>
		
		<section>
			<h3>Day</h3>
			<?
			$days = array();
      		for ($j=1;$j<=31;$j++):
      			$days[$j] = $j;
      		endfor;
			
			echo form_dropdown('day', $days, date("d", strtotime($i->issue_Published)));
			?>
		</section>
		
		<section>
			<h3>Status</h3>
			<?
      		$statuses = array(0, 1);
			
			echo form_dropdown('issue_Status', $statuses, $i->issue_Status);
			?>
		</section>
		
		<?
		echo form_hidden('issue_ID', $i->issue_ID);
		?>
		
		<section>
			<?	
			echo form_submit('submit', 'Submit Changes');
			?>
		</section>
	
	</form>
</div>