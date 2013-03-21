<div id="disqus_thread"></div>


<script type="text/javascript">
	
	<?
	if ($article->department_Slug == 'bubble' && $article->article_ID < 1644) $slug = 'echoes';
	else $slug = $article->department_Slug;
	?>

  var disqus_url = 'http://thecolbyecho.com/<?=$slug?>/<?=$article->article_ID?>'; 

  (function() {
   var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
   dsq.src = 'http://colbyecho.disqus.com/embed.js';
   (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
  })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript=colbyecho">comments powered by Disqus.</a></noscript>
<script type="text/javascript">
var disqus_shortname = 'colbyecho';
(function () {
  var s = document.createElement('script'); s.async = true;
  s.src = 'http://disqus.com/forums/colbyecho/count.js';
  (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>