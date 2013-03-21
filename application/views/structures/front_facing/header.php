<?
$this->load->helper('url');
?>

<div id="header">
	<div id="top">
		
		<a href="/" style="background-image:url('<?=base_url()?>/public/images/front_facing/thecolbyecho-white.png');" alt="The Colby Echo" title="The Colby Echo" id="logo"></a>
		
		<span id="subtitle">Colby College's student run newspaper since 1877</span>

		<div class="weather">

			<?
			$counter = 0;
			foreach ($forecast->simpleforecast->forecastday as $day):
				?>
				<div class="day">
				
					<div class="temperature">
						
						<img src="/public/images/weather_thumbs/<?=getWeatherImage($day->icon)?>" />
						
						<!--<img src="<?=$day->icons->icon_set[9]->icon_url?>" />-->
						
						<span class="high_sign">H</span>
						<span class="high_deg"><?=$day->high->fahrenheit?></span>
						/
						<span class="low_sign">L</span>
						<span class="low_deg"><?=$day->low->fahrenheit?></span>
					
					</div>
					<?
					if ($day->date->weekday == 'Saturday'
				     || $day->date->weekday == 'Sunday'):
						?>
						<div class="weekday"><strong><?=$day->date->weekday?></strong></div>
						<?
					else:
						?>
						<div class="weekday"><?=$day->date->weekday?></div>
						<?
					endif;
					?>
				
				</div>
				<?
				if($counter >= 3) break;
				$counter++;
			endforeach;
			?>
			
		</div>
	</div>

	<div id="nav_wrapper">
	<div id="nav">
		<ul id="sections">	
			<?
			$head_li_array = array(
	       		'HOME' => '',
	       		'NEWS' => 'news',
	       		'OPINION' => 'opinion',
	       		'A&E' => 'ae',
	       		'FEATURES' => 'features',
	       		'SPORTS' => 'sports',
	       		'VIDEOS' => 'videos',
	       		'TOPICS' => 'topics',
	       		'BLOG' => 'blog'
	       	);
	           
			foreach($head_li_array as $key=>$value) {
				$arr = explode('/', uri_string());
				?>
				<li <? if($arr[0] == $value){ ?>class="selected"<? } ?> >
					<a href="/<?=$value?>"><?=$key?></a>
				</li>
				<?
			}
			?>
				<li>
					<form action="http://www.google.com/cse" id="cse-search-box" target="_blank">
					  <div>
					    <input type="hidden" name="cx" value="015830191621256557616:14nhnql535o" />
					    <input type="hidden" name="ie" value="UTF-8" />
					    <input type="text" name="q" style="width:120px;" />
					    <!--<input type="submit" name="sa" value="Search" />-->
					  </div>
					</form>
					<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=en"></script>
				</li>
		</ul>
	</div>
	</div>
</div>