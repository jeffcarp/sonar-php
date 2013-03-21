<div class="vervet">

	<section>
		
		<h1>Editing the Front Page</h1>
		
		<a href="/">
			<button class="minimal">Go to it</button>
		</a>
		
		<ul>
			<li>Changes will take 0-5 minutes to show up due to our caching system.</li>
		</ul>
		
	</section>
	
	<div class="shadow"></div>

	<form class="edit" action="/sonar/ledes/update" method="post">
	
		<?
		$sections = array(
			1	=>	'North',
			2	=>	'East (backwards)',
			8	=>	'News focus',
			9	=>	'Local focus (if applicable)',
			5	=>	'Features focus',
			6	=>	'A&E focus',
			7	=>	'Sports focus',
			4	=>	'Sidebar teaser'
		);
		
		foreach ($sections as $key => $value):
			?>
			<section>
				<h2><?=$value?></h2>
				<?
				foreach ($ledes as $l):
					if ($l->lede_Location == $key):
				
						echo form_dropdown('lede'.$l->lede_ID, $options, $l->lede_Article);
				
					endif;
				endforeach;
				?>
			</section>
			<?
		endforeach;
		?>
		
		<section>
			<?
			echo form_submit('submit', 'Submit Changes');
			?>
		</section>
	
	</form>

</div>