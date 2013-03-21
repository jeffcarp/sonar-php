<div class="vervet">
	
	<section>
		
		<h1>Editing Article</h1>
		
		<a href="/<?=$department->department_Slug?>/<?=$article->article_Slug?>">
			<button class="minimal">Front-facing link</button>
		</a>
		<a href="/articles/show/<?=$article->article_ID?>">
			<button class="minimal">RESTful link</button>
		</a>
		<a href="/sonar/articles/destroy/<?=$article->article_ID?>" class="destroy">
			<button class="minimal">Delete article</button>
		</a>

	</section>

	<div class="shadow"></div>	
	
	<form class="edit" action="/sonar/articles/update" method="post">
		
		<section>
		
			<h3>Headline</h3>
		
			<?
			$data = array(
		              'name'        => 'article_Headline',
		              'class'       => 'headline',
		              'value'       => $article->article_Headline,
		              'placeholder' => 'Headline'
		            );
			echo form_input($data);
			?>
		</section>
		
		<section>
	
			<?
			$options[0] = ''; 
			foreach ($all_users as $au):
				$options[$au->person_ID] = $au->person_Name;
			endforeach;
			asort($options);
			
			$authornum = 1;
			foreach ($article->people as $u):
				?>
				<div>
					<h3>Author <?=$authornum?></h3>
					<?
					echo form_dropdown('author'.$authornum, $options, $u->person_ID);
					?>
				</div>
				<?
				$authornum++;
			endforeach;
			
			for ($i = $authornum; $i <= 3; $i++) {
				?>
				<div class="author light">
					<h3>Author <?=$i?></h3>
					<span style="display: none;">
					<?
					echo form_dropdown('author'.$i, $options);
					?>
					</span>
				</div>
				<?
			}
			?>
	
		</section>
		
		<section>
		
			<h3>Department</h3>
		
			<?
			$options = array();
			foreach ($all_departments as $d):
				$options[$d->department_ID] = $d->department_Name;
			endforeach;
			echo form_dropdown('article_Department', $options, $article->article_Department);
			?>
		
		</section>
		
		<section>
		
			<h3>Topic</h3>
			
			<?			
			foreach ($all_topics as $t):
				$t_options[$t->topic_ID] = $t->topic_Name;
			endforeach;
			asort($t_options);
			$t_options[0] = 'None';
			echo form_dropdown('article_Topic', $t_options, $article->article_Topic);
			?>
			
		</section>
		
		<section>
			
			<h3>Slug</h3>
			
			<?
			echo form_input('article_Slug', $article->article_Slug);
			?>
			
		</section>
		
		<section>
			
			<h3>Publish Date</h3>
			
			<?
			echo form_input('article_Published', $article->article_Published);
			?>
			
		</section>
		
		<section>
			
			<h3>Status</h3>
			
			<?
			$s_options = array(
				'draft' => 'Draft',
				'published' => 'Published'
			);
			echo form_dropdown('article_Status', $s_options, $article->article_Status);
			?>
			
		</section>
		
		<section>
		
			<h3>Issue</h3>
		
			<?
			$i_options[0] = '';
			foreach ($all_issues as $i):
				$i_options[$i->issue_ID] = 'Volume '.$i->issue_Volume.' Issue '.$i->issue_Edition;
			endforeach;
			echo form_dropdown('article_Issue', $i_options, $article->article_Issue);
			?>
		
		</section>
		
		<?
		if ($article->photos):
			?>
			<section>
			
				<?
				foreach ($article->photos as $p):
					?>
					<div class="photo">
						<h3>Photo ID <?=$p->photo_ID?></h3>
						<a href="/sonar/photos/edit/<?=$p->photo_ID?>">
							<?=thumb($p->photo_ID, 200);?>
						</a>
						<p><?=$p->photo_Caption?></p>
						
						<h4>Float right, medium</h4>
						<input type="text" value="<img src='/photos/get/<?=$p->photo_ID?>/200' class='right' />" />	
						<h4>Float left, medium</h4>
						<input type="text" value="<img src='/photos/get/<?=$p->photo_ID?>/200' class='left' />" />
						
						<h4>Full size</h4>
						<input type="text" value="<img src='/photos/get/<?=$p->photo_ID?>/604' />" />
					</div>
					<?			
				endforeach;	
				?>
				
			</section>
			<?
		endif
		?>
		
		<section>
		
			<h3>Photo List</h3>
		
			<?
			echo form_input('photolist', $photolist);
			?>
		
		</section>
		
		<section>
		
			<h3>Big Photo</h3>
		
			<?
			echo form_checkbox('article_Bigphoto', '1', $article->article_Bigphoto);
			?>
		
		</section>
		
		<section class="deck">
			<h3>Article Deck</h3>
			<?
			$data = array(
		              'name'        => 'article_Deck',
		              'value'       => $article->article_Deck,
		              'placeholder' => 'article deck - one sentence'
		            );
			echo form_textarea($data);
			?>
		</section>
		
		<section class="copy">
			<h3>Article Copy</h3>
			<?
			$data = array(
		              'name'        => 'article_Copy',
		              'value'       => $article->article_Copy,
		              'placeholder' => 'article copy'
		            );
			echo form_textarea($data);
			?>
		</section>
	
		<?
		echo form_hidden('article_ID', $article->article_ID);
		?>
		
		<section>
		
			<?	
			echo form_submit('submit', 'Submit Changes');
			?>
			
		</section>
	
	</form>