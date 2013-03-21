<div  class="vervet">
	
	<section>
	
		<h1>Editing Photo</h1>
		
		<a href="/photos/<?=$p->photo_ID?>">
			<button class="minimal">Front-facing link</button>
		</a>
		
		<a href="/sonar/photos/destroy/<?=$p->photo_ID?>" class="destroy">
			<button class="minimal">Delete photo</button>
		</a>
	
	</section>
	
	<div class="shadow"></div>
	
	<form class="edit" action="/sonar/photos/update" method="post">
	
	
		<section>
		
			<?=thumb($p->photo_ID, 606)?>
		
		</section>
		
		<section>
		
			<h3>Source</h3>
		
			<?
			if (!$p->photo_Source) $p->photo_Source = 'The Colby Echo';
			echo form_input('photo_Source', $p->photo_Source);
			?>
		
		</section>
		
		<section>
				
			<h3>Photographer</h3>
				
			<?
			echo form_input('photo_Photographer', $p->photo_Photographer);
			?>
				
		</section>
		
		<section>
				
			<h3>Public?</h3>
				
			<?
			echo form_checkbox('photo_Public', '1', $p->photo_Public);
			?>
				
		</section>
		
		<section class="deck">
		
			<h3>Caption</h3>
		
			<?
			$data = array(
		              'name'        => 'photo_Caption',
		              'value'       => $p->photo_Caption,
		              'placeholder' => 'photo caption'
		            );
			echo form_textarea($data);
			?>
			
		</section>
		
		<?
		echo form_hidden('photo_ID', $p->photo_ID);
		?>
		<section>
		<?	
		echo form_submit('submit', 'Submit Changes');
		?>
		</section>
	
	</form>

</div>
