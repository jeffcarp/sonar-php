	
<div class="department-header">
	<h1>Editorial Staff</h1>
</div>

<div class="main">
	
	<div class="people">
	
		<div class="content">
	
			<?
			$this->load->view('people/_current');
			$this->load->view('people/_past');
			?>
	
		</div>
		
		<aside>
			<?
			$this->load->view('structures/sidebars/blog');
			$this->load->view('structures/sidebars/3-7ad');
			$this->load->view('structures/sidebars/about');
			$this->load->view('structures/social/facebook_recommend');
			$this->load->view('structures/sidebars/featured');
			$this->load->view('structures/social/facebook_page');
			?>
		</aside>
		
	</div>

</div>
	
