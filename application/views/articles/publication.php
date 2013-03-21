<div class="department-header">
	<h1><?=$department->department_Name?></h1>
</div>


<div class="publication">

	<div class="content">

		<h1 class="headline"><?=$article->article_Headline?></h1>
			    	
		<div class="byline">
			by <?=authors($article)?>
			on <?=date('F j, Y', strtotime($article->article_Published))?>
			<? /* $this->pub->author_thumb(); */ ?>
		</div>
		
		<?
		if ($article->article_Bigphoto):
			foreach ($article->photos as $p):
				echo thumb($p->photo_ID, 614);
				?>
				<p class="photo_byline"><?=$p->photo_Photographer?> / <?=$p->photo_Source?></p>
				<p><?=$p->photo_Caption?></p>
				<?
				break;
			endforeach;	
		endif;
		?>
		
		<div class="copy">
		
			<div class="floater">
			
				<div class="social_button">

					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) {return;}
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#appId=267277596637030&xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					
					<div class="fb-like" data-href="<?='http://thecolbyecho.com'.sluggish_link($article)?>" data-send="false" data-layout="button_count" data-width="250" data-show-faces="true" data-action="recommend"></div>
				
				</div>
			
				<?
				$this->load->view('structures/social/google_plus');
				$this->load->view('structures/social/twitter_tweet');
				
				if($topic):
					?>
					<div class="floater-topics"><a href="/topics/<?=$topic->topic_Slug?>" class="topic medium"><?=$topic->topic_Name?></a></div>
					<ul>
						<?
						foreach ($topic_articles as $a):
							?>
							<li>
								<span class="f_headline"><a href="<?=sluggish_link($a)?>"><?=$a->article_Headline?></a></span>
								<span class="f_byline"><?=authors($a)?> in <a href="/<?=$a->department_Slug?>"><?=$a->department_Name?></a></span>
							</li>
							<?
						endforeach;
						?>
					</ul>
					<?
				endif;
				
				if ($article->article_Bigphoto):
					$firstphoto = false;
				else:
					$firstphoto = true;
				endif;
				if($article->photos):
					?>
					<div class="images">
						<?
						foreach ($article->photos as $p):

							if (!$firstphoto):
								$firstphoto = true;
								continue;
							endif;

							?>
							<a href="/photos/<?=$p->photo_ID?>"><?=thumb($p->photo_ID, 198)?></a>
							<?

						endforeach;
						?>
					</div>
					<?
				endif;
				?>
				
			</div>
		
			<?=$article->article_Copy?>
			
			<div class="end_box clearfix">
				
				<?
				foreach($article->people as $p):
					$person = $p;
					?>
					<div class="author">
					
						<h3 class="name"><a href="/people/<?=$p->person_Slug?>"><?
						echo $p->person_Name;
						if ($p->person_Year):
						
							echo " '".substr($p->person_Year, -2);
						
						endif;
						?></a></h3>
						<? 
						if ($p->person_Position):
							?>
							<div class="position"><?=$p->person_Position?></div>
							<?
						endif;
						
						if ($p->person_Photo):
							?>
							<a href="/people/<?=$p->person_Slug?>"><?=thumb($p->person_Photo, 178)?></a>
							<?
						endif;
						
						if ($p->person_Bio):
							?>
							<div class="bio"><?=$p->person_Bio?></div>
							<?
						endif;
						?>
					</div>	
					<?
					break;
				endforeach;
				?>
				
				<div class="related">
											
					<ul>
						<?
						$i = 0;
						foreach ($author->articles as $a):
							?>
							<li>
								<h5><a href="<?=sluggish_link($a)?>"><?=$a->article_Headline?></a></h5>
								<div class="related_byline">
									<a href="/people/<?=$person->person_Slug?>"><?=$person->person_Name?></a>
									on <?=date('F j, Y', strtotime($a->article_Published))?>
									in <a href="/<?=$a->department_Slug?>"><?=$a->department_Name?></a>
								</div>
							</li>
							<?
							if ($i == 3) break; else $i++;
						endforeach;
						?>				
					</ul>
									
				</div>
			
			</div>
			
		</div>
		
		<?
		$this->load->view('structures/front_facing/disqus');
		?>
	
	</div>

	<aside>
		<?
		$this->load->view('structures/sidebars/sonar');
		$this->load->view('structures/sidebars/blog');
		$this->load->view('structures/social/facebook_recommend');
		$this->load->view('structures/social/facebook_page');
		$this->load->view('structures/sidebars/featured');
		$this->load->view('structures/sidebars/about');
		?>
	</aside>
	
</div>


