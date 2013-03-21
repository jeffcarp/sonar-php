<div class="profile clearfix">

	<?
	if(isset($person->photo_ID)):
		echo thumb($person->photo_ID, 150);
	endif;
	?>

	<h1><?=$person->person_Name?></h1>
	<h2><?=$person->person_Position?></h2>

	<p class="bio"><?=$person->person_Bio?></p>

	<ul>
		<?
		$snippets = array(
			'person_Year' => 'Class year: '
		);
		foreach ($snippets as $key => $value):
			if (isset($person->$key) && $person->$key != 0):
				?>
				<li><?=$value.$person->$key?></li>
				<?	
			endif;
		endforeach;
		?>
	</ul>

</div>