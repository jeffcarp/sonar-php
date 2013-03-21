<?php
$this->load->helper(array('url', 'html', 'thumb', 'markdown', 'pub'));
?>

<!DOCTYPE HTML>
<html>
	<head>
		<!--
		'||''''|    ..|'''.| '||'  '||'  ..|''||  
		 ||  .    .|'     '   ||    ||  .|'    || 
		 ||''|    ||          ||''''||  ||      ||
		 ||       '|.      .  ||    ||  '|.     ||
		.||.....|  ''|....'  .||.  .||.  ''|...|' 
		-->
		
		<?
		echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');

		if (isset($prefix))
		{
			?>
			<title><?=$prefix?> | The Echo Blog</title>
			<?
		}
		elseif (isset($suffix))
		{
			?>
			<title>The Echo Blog | <?=$suffix?></title>
			<?
		}
		else
		{
			?>
			<title>The Echo Blog</title>
			<?
		}
		
		if (isset($article)) {
			foreach ($article->photos as $p):
				?>
				<link rel="image_src" href="<?= thumb($p->photo_ID, 160, false); ?>" />
				<?
				break;
			endforeach;	
		}
		
		echo link_tag(''.base_url().'public/images/favicon.ico', 'shortcut icon', 'image/ico');
    echo link_tag('public/css/blog-min-3-7.css');
		
		if (isset($article)) {
			foreach ($article->photos as $p) {
				?>
				<link rel="image_src" href="/photos/get/<?= $p->photo_ID ?>/200" /> 
				<?
			}
		}
		?>
	</head>
	<body>
		<? $this->load->view('structures/front_facing/header');	?>
	
		<div class="experimental">
  		  <div class="experimental_inner clearfix">
  		    <section class="logo">
  		      <h2><a href="/blog">The Echo Blog</a></h2>
  		      <h3>Fresh internets from the editors of the Echo</h3>
  		    </section>
  		    <section class="categories">
			  <ul>
				<li><a href="/blog/topics/blog-editorials">Editorials</a></li>
				<li><a href="/blog/topics/echoes-from-the-couch">Echoes from the Couch</a></li>
				<li><a href="/blog/topics/photo-essays">Photo Essays</a></li>
				<li><a href="/blog/topics/played">Played with Kevin Mahoney</a></li>
			  </ul>
  		    </section>
		  </div>
		</div>
		
		<div id="content" class="clearfix">			
			<div id="main">
				<?
				$this->load->view($view);
				?>
			</div>
			<aside>
				<?				
				// Hosts
				// $this->load->view('blog/_meter');
				// $this->load->view('blog/_authors');
				// $this->load->view('blog/_links');
				$this->load->view('blog/_recent');
				
				$this->load->view('structures/social/facebook_recommend');
				$this->load->view('structures/sidebars/3-7ad');
				$this->load->view('structures/social/facebook_page');
				
				$this->load->view('structures/sidebars/sonar');
				?>
			</aside>
			<? $this->load->view('blog/_pagination'); ?>
		</div>	
		<? $this->load->view('structures/front_facing/footer');	?>
	</body>
</html>
