
<div class="department-header">
	<h1><a href="/topics" class="blue">Topics</a> &raquo; <a href="/topics/<?=$t->topic_Slug?>" class="topic big"><?=$t->topic_Name?></a></h1>
</div>

<div class="main">
	
	<div class="people">
	
		<div class="content">
		
			<?
			mako($articles);
			?>

		</div>
		
		<aside>
			<?
			$this->load->view('structures/sidebars/blog');
			$this->load->view('structures/social/facebook_recommend');
			$this->load->view('structures/sidebars/featured');
			$this->load->view('structures/social/facebook_page');
			?>
		</aside>
		
	</div>

</div>
	
