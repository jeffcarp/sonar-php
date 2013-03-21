<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<meta name="Author" content="The Colby Echo">

<?
if (isset($prefix))
{
	?>
	<title><?=$prefix?> | Sonar</title>
	<?
}
elseif (isset($suffix))
{
	?>
	<title>Sonar | <?=$suffix?></title>
	<?
}
else
{
	?>
	<title>Sonar</title>
	<?
}
?>

<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script src="/public/javascript/sonar.js"></script>

<?
echo link_tag(''.base_url().'public/images/favicon.ico', 'shortcut icon', 'image/ico');

$links = array(
          'public/css/reset.css',
          'public/css/sonar/main.css',
          'public/css/sonar/'.$controller.'.css'
);
foreach($links as $l):
	echo link_tag($l);
endforeach;