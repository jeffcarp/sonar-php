<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function sluggish_link($article) 
{
	$output  = '/';
	$output .= $article->department_Slug;
	$output .= '/';
	$output .= $article->article_Slug;
	
	return $output;
}

function authors($article, $class = '')
{
	$output = '';
	$first = true;
	foreach ($article->people as $u):
		if ($first == false) $output .= ' and ';
		
		$output .= "<a href='/people/".$u->person_Slug."' class='".$class."'>".$u->person_Name."</a>";

		$first = false;
	endforeach;
	
	return $output;
}

function mako($articles)
{
	foreach ($articles as $a):
		$article_ID = 0;
		if ($article_ID == $a->article_ID) {
			continue;
		}
		$article_ID = $a->article_ID;
		?>
		<div class="mako clearfix">

			<?			
			foreach ($a->photos as $p):
				?>
				<a href="<?=sluggish_link($a)?>"><?=thumb($p->photo_ID, 160)?></a>
				<?
				break;
			endforeach;
			
			if ($a->topic_ID):
				?>
				<h4><a href="/topics/<?=$a->topic_Slug?>"><?=strtoupper($a->topic_Name)?></a></h4>
				<?
			endif;
			?>

			<div class="text">
				<h3><a href="<?=sluggish_link($a)?>" class="blue"><?=$a->article_Headline?></a></h3>
				<?
				if(isset($a->people)) {
					?>
					<div class="byline">by <?=authors($a)?></div>
					<?
				}
				?>
				<p><?=$a->article_Deck?></p>
			</div>
			
		</div>
		<?
	endforeach;
}

function nurse($articles)
{
	$articleid = 0;
	foreach ($articles as $a):
		if($articleid == $a->article_ID) continue;
		$articleid = $a->article_ID;
		if(isset($a->lede_ID) && $a->lede_Location == 5) continue;
		if(isset($a->lede_ID) && $a->lede_Location == 6) continue;
		if(isset($a->lede_ID) && $a->lede_Location == 7) continue;
		if(isset($a->lede_ID) && $a->lede_Location == 8) continue;
		if(isset($a->lede_ID) && $a->lede_Location == 9) continue;
		?>
		<li class="clearfix">
		
			<?			
			foreach ($a->photos as $p):
				?>
				<a href="<?=sluggish_link($a)?>"><?=thumb($p->photo_ID, 64)?></a>
				<?
				break;
			endforeach;
			?>
			
			<div class="text">
			
				<h3><a href="<?=sluggish_link($a)?>"><?=$a->article_Headline?></a></h3>
				<span><?=authors($a)?></span>
				
			</div>
			
		</li>
		<?
	endforeach;
}

function squeeze_location($articles, $location)
{
	foreach ($articles as $a):
		if ($a->lede_Location == $location):
			?>
			<h4><a href="/topics/<?=$a->topic_Slug?>"><?=strtoupper($a->topic_Name)?></a></h4>
			<?
			if ($a->photos):
				foreach ($a->photos as $p):
					?>
					<a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>"><?=thumb($p->photo_ID, 198)?></a>
					<?
					break;
				endforeach;
			endif;						
			?>
			<h3><a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>"><?=$a->article_Headline?></a></h3>
			<p><?=$a->article_Deck?> <a href="/<?=$a->department_Slug?>/<?=$a->article_Slug?>">Read&nbsp;on&nbsp;&raquo;</a></p>
			<?
		endif;
	endforeach;
}