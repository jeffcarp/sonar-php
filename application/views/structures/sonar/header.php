<header>
	<div class="inner clearfix">

		<h1><a href="/sonar">Sonar</a></h1>
		
		<h5><a href="/">front page &rarr;</a></h5>
		
		<?
		if(isset($status_button) && $status_button == true) {
			?>
			<button class="save-button cupid-green">Published</button>
			<?
		}
		?>
		
		<nav>
			<ul>
				<li><a href="/sonar/articles">Articles</a></li>
				<li><a href="/sonar/ledes">Front Page</a></li>
				<li><a href="/sonar/issues">Issues</a></li>
				<li><a href="/sonar/dashboard/health">Health</a></li>
				<li><a href="/sonar/photos">Photos</a></li>
				<li><a href="/sonar/topics">Topics</a></li>
				<li><a href="/sonar/people">People</a></li>
			</ul>
		</nav>		
	</div>
</header>