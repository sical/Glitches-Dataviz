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
<?php $pics=scandir(
		"uploads"
		);
$pics=array_diff($pics, array('.', '..'));
?>
<head>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<base target="_parent" />
</head>

<body>	
<h2>Select Picture</h2>

<?php foreach ($pics as &$link) : 
?>

<img src="uploads/<?php echo $link ?>" id="<?php echo $link ?>">
</img >
<?php 
endforeach; 
unset($link);
?>

</body>
<script>
$("img").click(function(){

		$("img").each(function(){
				$(this).attr("class","");

				});
		if(parent.$("#opic").attr("selected_pic")!=$(this).attr("id")){
			$(this).attr("class","selected-pic");
			parent.$("#opic").attr("selected_pic",$(this).attr("id"));
		}else{
			$(this).attr("class","");
			parent.$("#opic").attr("selected_pic","null");
		}
	});
</script>
<style>
img {
width:100%;
height:auto;
}
.selected-pic{
	border-style: solid;
	border-color: red;
}

</style>
