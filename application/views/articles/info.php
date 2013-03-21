
<div class="department-header">
	<h1><?=$department->department_Name?></h1>
</div>


<div class="publication">

	<div class="content">

		<h1 class="headline"><?=$article->article_Headline?></h1>
			    		
		<div class="copy">
		
			<?=$article->article_Copy?>
			
		</div>
	
	</div>

	<aside>
		<?
		$this->load->view('structures/sidebars/sonar');
		$this->load->view('structures/sidebars/blog');
		$this->load->view('structures/sidebars/about');
		$this->load->view('structures/social/facebook_recommend');
		$this->load->view('structures/sidebars/featured');
		$this->load->view('structures/social/facebook_page');
		?>
	</aside>
	
</div>


