
<div class="department-header">
	<h1><a href="/videos" class="blue">Videos</a> &raquo; <?=$video->article_Headline?></h1>
</div>

<div class="main">
	
	<div class="videos">
	
		<div class="content">
			
			<div class="primary">
			
				<iframe src="http://player.vimeo.com/video/<?=$video->article_Copy?>?byline=0&amp;portrait=0&amp;autoplay=0" width="613" height="344" frameborder="0"></iframe>
					
				<p class="byline">by <?=authors($video)?> on May 17, 2011</p>
				<div class="deck"><?=$video->article_Deck?></div>
			
			</div>
		
			<div class="older">
				
				<h2>MORE VIDEOS</h2>
			
				<?
				mako($earlier);
				?>			
			</div>
			
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