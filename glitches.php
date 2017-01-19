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
"glitches/1.php"
)
 ?>
<head>
<script src="https://code.jquery.com/jquery-1.11.3.js">
</script>
<base target="_parent" />
</head>

	<body>	
		<h2>Glitching</h2>
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
	$("a").click(function(){
	$(this).attr("href", $(this).attr("href") +"?pic=" + parent.$("#opic").attr("selected_pic"));
}
);
</script>
<style>

</style>
