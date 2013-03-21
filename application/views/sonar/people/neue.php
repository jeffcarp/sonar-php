<div class="vervet">

	<div class="plate">
		<p>People</p>
		<ul>
			<li>Slugs are all-lowercase. No spaces or punctuation, just hyphens.</li>
			<li>If you leave the Slug input blank, one will be generated for you.</li>
		</ul>
	</div>
	
	<?
	echo form_open('/sonar/people/create');
		?>
	
		<section>
			<h3>Name</h3>
			<input type="text" name="person_Name" placeholder="e.g. Jeff Carpenter" />
		</section>
		
		<section>
			<h3>Slug</h3>
			<input type="text" name="person_Slug" placeholder="leave blank for auto-generated slug" />
		</section>
		
		<section>
			<h3>Position</h3>
			<input type="text" name="person_Position" placeholder="e.g. Features Editor" />
		</section>
		
		<section>
			<h3>Year</h3>
			<input type="text" name="person_Year" placeholder="e.g. 2010" />
		</section>
		
		<section>
			<h3>Photo</h3>
			<input type="text" name="person_Photo" placeholder="a photo ID, e.g. 379" />
		</section>
		
		<section>
			<h3>Bio</h3>
			<?
			$data = array(
		              'name'        => 'person_Bio',
		              'placeholder' => 'a short bio'
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
					<option><?=$i?></option>
					<?
				endfor;
				?>
			</select>
		</section>

	
		<section>
			<input type="submit" value="Create Person" />
		</section>
	
		<?
	echo form_close();
	?>
	
</div>