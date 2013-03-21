<div class="department-header">
	<h1><?=$department->department_Name?></h1>
	<!--
	<div class="trending">
		Trending tags:
	</div>
	-->
</div>


<div class="department">

	<div class="content">
		
		<?
		mako($articles);
		?>
	
		<div class="older">
		
			<h2>OLDER ARTICLES</h2>
		
			<?
			foreach ($olderarticles as $a):
				?>
				<div class="roloway clearfix">
				
					<a href="<?=sluggish_link($a)?>">
						<?
						foreach ($a->photos as $p):
							echo thumb($p->photo_ID, 70);
							break;
						endforeach;
						?>
					</a>
		
					<h3><a href="<?=sluggish_link($a)?>" class="blue"><?=$a->article_Headline?></a></a></h3>
					<div class="byline">by <?=authors($a, 'black')?> on <?=date('F j, Y', strtotime($a->article_Published))?></div>
				
				</div>
				<?
			endforeach;
			?>
					
		</div>
			
	</div>

	<aside>
		<?
		$this->load->view('structures/sidebars/blog');
		$this->load->view('structures/social/facebook_recommend');
		$this->load->view('structures/sidebars/3-7ad');
		$this->load->view('structures/sidebars/featured');
		$this->load->view('structures/social/facebook_page');
		?>
	</aside>
	
</div>


