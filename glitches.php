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
<?php $links=scandir("glitches"
);
$links=array_diff($links, array('.', '..'));

 ?>
<head>
   <link rel="stylesheet" type="text/css" href="style/general.css">

<script src="https://code.jquery.com/jquery-1.11.3.js">
</script>
<base target="_parent" />
</head>

	<body>	
		<h2>Glitching</h2>
		<ul>

<?php foreach ($links as &$link) : ?>
<li>
<button target="_parent#opreview"i role="button" varlink="glitches/<?php echo $link ?>" ><?php echo get_title("glitches/".$link)?>
</button>
<!--
<a target="_blank" href="glitches/<?php echo $link ?>"><?php echo get_title("glitches/".$link)?>
</a>
-->


</li>
<?php endforeach; 
unset($link);
?>

</ul>
</body>
<script>
	$("button").click(function(){
	parent.$("#opreview").attr("data",$(this).attr("varlink").split("?pic=")[0] +"?pic=" + parent.$("#opic").attr("selected_pic")+"&bburl="+parent.$("#obbuilder").attr("bburl"));
//	$(this).attr("href", $(this).attr("href").split("?pic=")[0] +"?pic=" + parent.$("#opic").attr("selected_pic")+"&bburl="+parent.$("#obbuilder").attr("bburl"));
}
);
</script>
<style>

</style>
