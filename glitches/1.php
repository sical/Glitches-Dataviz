<html>
<head>
<title>contrast</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="marged-div">
<div id="slider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"></div>
</div>
<canvas id="original" >
Affichage d'un texte pour les navigateurs qui ne supportent pas canvas.
</canvas>
<canvas id="canvas" >
Affichage d'un texte pour les navigateurs qui ne supportent pas canvas.
</canvas>
</body>
<script>
var img = new Image();
var seuil=1;
$( function() {
		var handle = $( "#custom-handle" );
		$( "#slider" ).slider({
			create: function() {
				handle.text( $( this ).slider( "value" ) );
			},
			min: 1,
			max: 600,
			slide: function( event, ui ) {
				handle.text( ui.value );
				seuil=ui.value;
				img.src = "../uploads/<?php echo $_GET["pic"]?>?" + new Date().getTime();

			}
		});
} );


var origCanvas = document.getElementById('original');
var canvas = document.getElementById('canvas');
var origCtx = origCanvas.getContext('2d');
var ctx = canvas.getContext('2d');
img.onload = function() {
	origCanvas.width=img.naturalWidth;
	origCanvas.height=img.naturalHeight;
	canvas.width=img.naturalWidth;
	canvas.height=img.naturalHeight;
	origCtx.drawImage(img, 0, 0);
	for(var $i = 0; $i<img.width;$i++){
		for(var $j = 0; $j<img.height;$j++){
			r=Math.round(origCtx.getImageData($i, $j, 1, 1).data[0]/seuil)*seuil;
			g=Math.round(origCtx.getImageData($i, $j, 1, 1).data[1]/seuil)*seuil;
			b=Math.round(origCtx.getImageData($i, $j, 1, 1).data[2]/seuil)*seuil;
			a=255;
			ctx.fillStyle = "rgba("+r+","+g+","+b+","+(a/255)+")";
			ctx.fillRect($i,$j,1,1);
		}
	}
};
img.src = "../uploads/<?php echo $_GET["pic"]?>?";
</script>

</html>
<style>
	.marged-div{
		margin:10px;
	}
</style>
<?php
$a="/anonymous/3c59e1ac2f63db10c0ad15673e190ddb/raw/3ba207634e2a4c2b3a76d40c3556793c14e36ef1/index.html";
$url='https://gist.github.com'.$a;

function get_index($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
	  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
	  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
	  return $title[1];
  }
}
?>


