<div class="frontpage">

	<aside class="cage-east">
		<?
		$this->load->view('structures/sidebars/blog');
		$this->load->view('structures/sidebars/3-7ad');
		$this->load->view('frontpage/_opinion');
		$this->load->view('structures/social/twitter_timeline');
		$this->load->view('structures/sidebars/about');
		$this->load->view('structures/social/facebook_recommend');
		$this->load->view('structures/social/facebook_page');
		?>		
	</aside>

	<div class="cage-north">
		
<!--
		<div class="christmas clearfix">
			<img src="/public/images/front_facing/tree.jpg" alt="a christmas tree" />
			<h2>Happy holidays from the <em>Echo!</em></h2>
			<p>Our next issue comes out <strong>Feburary 8, 2012.</strong><br />
			   Until then, check <a href="/bubble">our blog</a> or <a href="http://twitter.com/thecolbyecho">follow us on Twitter</a> for updates.
			</p>
		</div>
-->
		
		<div class="howlers">
			<?
			foreach ($articles as $a):
				if ($a->lede_Location == 2):
					?>
					<div class="howler">
						<h2><a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>"><?=$a->article_Headline?></a></h2>
						<p>
							<? 
							$first = true;
							foreach ($a->people as $u):
								if ($first == false) echo ' and ';
								?>
								<a href='/people/<?=$u->person_Slug?>'><?=$u->person_Name?></a>
								<?
								$first = false;
							endforeach;
							?>
						
						in <a href="/<?=$a->department_Slug?>"><?=$a->department_Name?></a></p>
					</div>
					<?
				endif;
			endforeach;
			?>
		</div>

		<div class="gorilla">
			<?
			foreach ($articles as $a):
				if ($a->lede_Location == 1):
					foreach ($a->photos as $p):
						?>
						<a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>"><?=thumb($p->photo_ID, 400)?></a>
						<?
						break;
					endforeach;
					?>
					<p class="photo_byline"><?=$p->photo_Photographer?> / <?=$p->photo_Source?></p>
					<h1><a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>"><?=$a->article_Headline?></a></h1>
					<p><?= markdown($a->article_Deck) ?> <a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>">read&nbsp;more&nbsp;&raquo;</a></p>
					<?
				endif;
			endforeach;
			?>
		</div>
	
	</div>	
	
	<div class="cage-west">
	
		<div class="tamarin">
		
			<div>
				<span class="normal">Latest issue:</span>
				<span class="issue">Volume <?=$issue->issue_Volume?> Edition <?=$issue->issue_Edition?></span>
				<span class="normal">published</span>
				<span class="issue"><?=date('F j, Y', strtotime($issue->issue_Published))?></span>
			</div>
			<!--
			<div>
				<span class="normal">Big topics:</span>
				<span class="bigtopics">
				<?
				foreach ($topics as $key => $value):

					if (isset($comma)) echo ', ';
					
					?><a href="/topics/<?=$key?>" class="blue"><?=$value?></a><?
					
					$comma = true;
					
				endforeach;
				?>
				</span>
			</div>
			-->
		</div>

		<div class="dogfish clearfix">
			<h2>News</h2>
			<div class="left">	
				<?	
				squeeze_location($articles, 8);
				?>				
			</div>
			<ul class="tiki right">	
				<?
				nurse($news);
				?>
			</ul>
		</div>

		<?
		if($local):
			?>
			<div class="dogfish clearfix">
				<h2>Local</h2>
				<div class="left">	
					<?	
					squeeze_location($articles, 9);
					?>				
				</div>
				<ul class="tiki right">	
					<?
					nurse($local);
					?>
				</ul>
			</div>
			<?
		endif;
		?>

		<div class="dogfish clearfix">
			<h2>Features</h2>
			<div class="left">	
				<?	
				squeeze_location($articles, 5);
				?>				
			</div>
			<ul class="tiki right">	
				<?
				nurse($features);
				?>
			</ul>
		</div>

		<div class="dogfish clearfix">
			<h2>Arts & Entertainment</h2>
			<div class="left">	
				<?	
				squeeze_location($articles, 6);
				?>				
			</div>
			<ul class="tiki right">	
				<?
				nurse($ae);
				?>
			</ul>
		</div>
		
		<div class="dogfish clearfix">
			<h2>Sports</h2>
			<div class="left">	
				<?	
				squeeze_location($articles, 7);
				?>				
			</div>
			<ul class="tiki right">	
				<?
				nurse($sports);
				?>
			</ul>
		</div>
		
	
	
	</div>
	
</div>
