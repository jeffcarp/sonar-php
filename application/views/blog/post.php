<article>
  <h1 class="headline"><a href="<?=permalink($article)?>"><?=$article->article_Headline?></a></h1>
  <div class="byline">	
  	Posted by: <?= authors($article) ?> on <?= date('F j, Y', strtotime($article->article_Published)) ?>
	</div>
	<div class="social">
		<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthecolbyecho.com<?= urlencode(permalink($article)); ?>&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=recommend&amp;colorscheme=light&amp;font&amp;height=24&amp;appId=267277596637030" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:24px;" allowTransparency="true"></iframe>
	</div>
  <div class="copy clearfix">
    <?= markdown($article->article_Copy) ?>
  </div>
</article>

<? $this->load->view('structures/front_facing/disqus'); ?>