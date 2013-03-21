<?
function blog_title()
{
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
}

function permalink($article)
{
	$output  = '/';
	$output .= $article->department_Slug;
	$output .= '/';
	$output .= $article->article_ID;
	$output .= '/';
	$output .= $article->article_Slug;
	
	return $output;
}

function slug($str)
{
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
	
	return $str;
}

function caching()
{
	if (ENVIRONMENT == 'production') {
		$this->output->cache(5);
	}
}

function weather()
{
	if (ENVIRONMENT != 'production') {
		$data = file_get_contents('public/weather.xml');
	} else {
		if ($data = file_get_contents('http://api.wunderground.com/auto/wui/geo/ForecastXML/index.xml?query=kwvl')) {
		} else {
			$data = file_get_contents('public/weather.xml');
		}
	}

	return new SimpleXMLElement($data);
}


function getWeatherImage($icon) {
	
	switch ($icon) {

		case 'clear':							// Clear
			$URI = '32.png';
			break;
		case 'sunny':							// Sunny
			$URI = '32.png';
			break;
		case 'cloudy':							// Cloudy
			$URI = '26.png';					
			break;
		case 'chance flurries':
		case 'flurries':						// Flurries
			$URI = '15.png';					
			break;	
		case 'fog':								// Fog
			$URI = '20.png';					
			break;
		case 'hazy':							// Hazy
			$URI = '22.png';					
			break;	
		case 'mostlycloudy':					// Mostly Cloudy
			$URI = '28.png';	
			break;	
		case 'mostlysunny':						// Mostly Sunny
			$URI = '34.png';					
			break;	
		case 'partlycloudy':					// Partly Cloudy
			$URI = '28.png';					
			break;	
		case 'partlysunny':						// Partly Sunny
			$URI = '22.png';					
			break;	
		case 'rain':
		case 'chancerain':
			$URI = '11.png';					// Rain
			break;	
		case 'sleet':
		case 'chancesleet':
		case 'chancesnow':
			$URI = '07.png';					// Sleet
			break;
		case 'snow':
		case 'chancesnow':
			$URI = '15.png';
			break;
		case 'tstorms':
		case 'chancetstorms':
			$URI = '35.png';
			break;	
		default:
			$URI = '';
			break;
	}
	return $URI;
}