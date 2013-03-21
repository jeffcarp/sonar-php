
<div class="department-header">
	<h1>Photos</h1>
</div>

<div class="main">
	
	<div class="photos">
	
		<div class="content">
			
			<div class="frame">
			
				<?=thumb($p->photo_ID, 614)?>
				
				<p class="byline"><?=$p->photo_Photographer?> / <?=$p->photo_Source?></p>
				<div class="caption"><?=markdown($p->photo_Caption)?></div>
			
			</div>
			
			<div class="gallery">
			
			</div>
		
			

		</div>
		
		<aside>
			<?
			// Next
			// Previous
			$this->load->view('structures/sidebars/blog');
			$this->load->view('structures/social/facebook_recommend');
			$this->load->view('structures/sidebars/featured');
			$this->load->view('structures/social/facebook_page');
			?>
		</aside>
		
	</div>

</div>
	
