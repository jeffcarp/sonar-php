<?php
$this->load->helper(array('url', 'html', 'form', 'thumb'));
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?
		$this->load->view('structures/sonar/head');
		?>
	</head>
	
	<body class="ocean">	
		<?
		$this->load->view('structures/sonar/header');
		?>
					
		<div class="continent">		
		<div class="continent-inner clearfix">
		

		<aside>
			<?
			//$pieces = explode("/", $view);
			//$this->load->view('sonar/'.$pieces[0].'/options');
			?>
			<ul>
				<li>Articles</li>
				<li><a href="/sonar/articles/neue">New Article</a></li>
			</ul>
			<div class="rule"></div>
			<!--
			<ul>
				<li>Style Guides</li>
				<li><a href="">Print</a></li>
				<li><a href="">Online</a></li>
			</ul>
			<div class="rule"></div>
			-->
			<ul>
				<li>Publication</li>
				<li><a href="/sonar/articles/department/1">News</a></li>
				<li><a href="/sonar/articles/department/6">Local</a></li>
				<li><a href="/sonar/articles/department/2">Opinion</a></li>
				<li><a href="/sonar/articles/department/4">Features</a></li>
				<li><a href="/sonar/articles/department/3">A&E</a></li>
				<li><a href="/sonar/articles/department/5">Sports</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>Web</li>
				<li><a href="/sonar/articles/department/7">Blog</a></li>
				<li><a href="/sonar/articles/department/11">Video</a></li>
				<li><a href="/sonar/articles/department/9">About</a></li>
			</ul>
			<!--
			<ul>
				<li>Budgets</li>
				<li>Issue 27 - May 19</li>
				<li>Next issue - May 26</li>
				<li>Last issue - May 12</li>
			</ul>
			-->
			<div class="rule"></div>
			<ul>
				<li>Issues</li>
				<li><a href="/sonar/issues">View All</a></li>
				<li><a href="/sonar/issues/neue">Create new</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>Front Page</li>
				<li><a href="/sonar/ledes">Manage</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>Photos</li>
				<li><a href="/sonar/photos">View all</a></li>
				<li><a href="/sonar/photos/neue">Upload Photo</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>Topics</li>
				<li><a href="/sonar/topics">View all</a></li>
				<li><a href="/sonar/topics/neue">Create new</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>People</li>
				<li><a href="/sonar/people">View all</a></li>
				<li><a href="/sonar/people/neue">Create new</a></li>
			</ul>
			<div class="rule"></div>
			<ul>
				<li>Sonar</li>
				<li><?= $currentuser->person_Name ?></li>
				<li>Access: <?= $currentuser->person_Access ?></li>
				<li><a href="/sonar/sessions/destroy">Log out</a></li>
			</ul>
			
		</aside>
				
		<div class="paper">
		
			<?
			$this->load->view('sonar/'.$view);
			?>

		</div>	
		</div>
		</div>
					
		<?		
		$this->load->view('structures/sonar/footer');
		?>
		
	</body>
</html>
