<?
if($this->input->cookie('bash') && isset($article)):
?>
<div class="sidebar">
	<p><a href="/sonar/articles/edit/<?=$article->article_ID?>">Edit this article</a></p>
</div>
<?
endif;
?>