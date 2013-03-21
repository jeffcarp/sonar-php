
<div class="department-header">
	<h1><a href="/people" class="blue">People</a> &raquo; <?=$person->person_Name?></h1>
</div>

<div class="main">
	
	<div class="people">
	
		<div class="content">
		
			<?
			$this->load->view('people/_profile');
			?>
			<div class="posts">
			
				<?
				mako($person->articles);
				?>
			
			</div>

		</div>
		
		<aside>
			<?
			$this->load->view('structures/sidebars/blog');
			$this->load->view('structures/sidebars/about');
			$this->load->view('structures/social/facebook_recommend');
			$this->load->view('structures/sidebars/featured');
			$this->load->view('structures/social/facebook_page');
			?>
		</aside>
		
	</div>

</div>
	
