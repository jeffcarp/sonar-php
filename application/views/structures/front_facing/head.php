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
	<title><?=$prefix?> | The Colby Echo</title>
	<?
}
elseif (isset($suffix))
{
	?>
	<title>The Colby Echo | <?=$suffix?></title>
	<?
}
else
{
	?>
	<title>The Colby Echo</title>
	<?
}

echo link_tag(''.base_url().'public/images/favicon.ico', 'shortcut icon', 'image/ico');

$links = array(
          'public/css/front-min-3-7.css',
          'public/css/front_facing/'.$controller.'.css'
);
foreach($links as $l):
	echo link_tag($l);
endforeach;

?>