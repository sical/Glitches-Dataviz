<?php
function get_title($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
    return $title[1];
  }
}
?>
<?php $links=array(
	"http://danielschwarz.cc/",
	"https://www.youtube.com/watch?v=mvqakws0CeU",
	"http://nadjabuttendorf.com/",
	"http://ryojiikeda.com/",
	"http://www.pierrebuttin.com/",
	"http://tumblr.glitchartistscollective.com/",
	"http://poxparty.com/",
	"http://glitch.refrag.paris/"
)
 ?>
<head>
   <link rel="stylesheet" type="text/css" href="style/general.css">
<base target="_parent" />
</head>

	<body>	
		<h2>Interesting Links</h2>
		<ul>

<?php foreach ($links as &$link) : ?>
<li><a target="_blank" href="<?php echo $link ?>"><?php echo get_title($link)?>
</a></li>
<?php endforeach; 
unset($link);
?>

</ul>
</body>
<script>
</script>
<style>

</style>
