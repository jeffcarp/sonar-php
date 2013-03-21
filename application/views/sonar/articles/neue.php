<div class="vervet">
	
	<section>
		
		<h1>Creating New Article</h1>
		
		<a href="/sonar/articles">
			<button class="minimal">Back</button>
		</a>

	</section>

	<div class="shadow"></div>

	<form class="edit" action="/sonar/articles/create" method="post">

		<section>
			
			<h3>Headline</h3>
		
			<?
			$data = array(
		              'name'        => 'article_Headline',
		              'class'       => 'headline',
		              'value'       => '',
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
			unset($options);
			foreach ($all_departments as $d):
				$options[$d->department_ID] = $d->department_Name;
			endforeach;
			echo form_dropdown('article_Department', $options);
			?>
		</section>
		
		<section>
			<h3>Topic</h3>
			
			<?			
			foreach ($all_topics as $t):
				$t_options[$t->topic_ID] = $t->topic_Name;
			endforeach;
			$t_options[0] = '&nbsp;None';
			asort($t_options);
			echo form_dropdown('article_Topic', $t_options);
			?>

		</section>
		
		<section>
			<h3>Slug</h3>
			<?
			$data = array(
		              'name'        => 'article_Slug',
		              'value'       => '',
		              'placeholder' => 'Leave blank for auto-generated slug'
		            );
			echo form_input($data);
			?>
		</section>
				
		<section>
		
			<h3>Status</h3>
			
			<?
			$s_options = array(
				'draft' => 'Draft',
				'published' => 'Published'
			);
			echo form_dropdown('article_Status', $s_options);
			?>
			
		</section>
		
		<section>
		
			<h3>Issue</h3>
			
			<?
			$i_options[0] = '';
			foreach ($all_issues as $i):
				$i_options[$i->issue_ID] = 'Volume '.$i->issue_Volume.' Issue '.$i->issue_Edition;
			endforeach;
			echo form_dropdown('article_Issue', $i_options);
			?>
			
		</section>
								
		<section class="deck">
		
			<h3>Article Deck</h3>
			
			<?
			$data = array(
		              'name'        => 'article_Deck',
		              'value'       => '',
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
		              'value'       => '',
		              'placeholder' => 'article copy'
		            );
			echo form_textarea($data);
			?>
			
		</section>
		
		<section>
			<?	
			echo form_submit('submit', 'Submit Changes');
			?>
		</section>

	</form>
	
</div>