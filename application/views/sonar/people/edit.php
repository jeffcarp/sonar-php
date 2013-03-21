<div class="vervet">

	<section>
		
		<h1>Editing <?=$p->person_Name?></h1>
		
		<a href="/people/<?=$p->person_Slug?>">
			<button class="minimal">Front-facing link</button>
		</a>
		<a href="/sonar/people/destroy/<?=$p->person_ID?>" class="destroy">
			<button class="minimal">Delete <?=$p->person_Name?></button>
		</a>
		<a href="/sonar/people">
			<button class="minimal">Back</button>
		</a>
		
		<ul>
			<li>Slugs are all-lowercase. No spaces or punctuation, just hyphens.</li>
			<li>If you leave the Slug input blank, one will be generated for you.</li>
		</ul>
		
	</section>
	
	<div class="shadow"></div>
	
	<?
	echo form_open('/sonar/people/update');
		?>
	
		<section>
			<h3>Name</h3>
			<input type="text" 
				   name="person_Name" 
				   placeholder="e.g. Jeff Carpenter" 
				   value="<?=$p->person_Name?>" />
		</section>
		
		<section>
			<h3>Slug</h3>
			<input type="text" 
			 	   name="person_Slug" 
			 	   placeholder="leave blank for auto-generated slug" 
			 	   value="<?=$p->person_Slug?>" />
		</section>
		
		<section>
			<h3>Position</h3>
			<input type="text" 
				   name="person_Position" 
				   placeholder="e.g. Features Editor" 
				   value="<?=$p->person_Position?>" />
		</section>
		
		<section>
			<h3>Year</h3>
			<input type="text" 
				   name="person_Year" 
				   placeholder="e.g. 2010"
				   value="<?=$p->person_Year?>" />
		</section>
		
		<section>
			<h3>Photo</h3>
			<input type="text" 
				   name="person_Photo" 
				   placeholder="a photo ID, e.g. 379"
				   value="<?=$p->person_Photo?>" />
		</section>
		
		<section>
			<h3>Bio</h3>
			<?
			$data = array(
		              'name'        => 'person_Bio',
		              'placeholder' => 'a short bio',
		              'value'		=> $p->person_Bio
		            );
			echo form_textarea($data);
			?>
		</section>
		
		<section>
			<h3>Access</h3>
			<select name="person_Access">
				<?
				for ($i=1;$i<=5;$i++):
					?>
					<option <? if($p->person_Access==$i)echo'selected="selected"';?>><?=$i?></option>
					<?
				endfor;
				?>
			</select>
		</section>

		<input type="hidden" name="person_ID" value="<?=$p->person_ID?>" />
	
		<section>
			<input type="submit" value="Submit changes" />
		</section>
	
		<?
	echo form_close();
	?>
	
</div>