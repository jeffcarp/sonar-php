
<div class="department-header">
	<h1><a href="/topics" class="blue">Topics</a></h1>
</div>

<div class="main">
	
	<div class="topics">
	
		<div class="content">
		
		<?
		foreach ($topics as $t):
			?>
			<div class="topic_holder">
				<a class="topic" style="font-size: <?=($t->article_count+12)*1.4?>px" href="/topics/<?=$t->topic_Slug?>"><?=$t->topic_Name?></a>
			</div>		
			<?
		endforeach;
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
	
