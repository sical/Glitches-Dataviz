<html>
<head>
<title>barchart(rectToPath)</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<div class="marged-div">
<button onclick="glitch()">Glitch</button>
<iframe  type="text/html" id="oblock" src="../git/3310560/"></iframe>
</div>
</body>
</html>
<style>
.marged-div{
margin:10px;
}
</style>


<script>
$("#oblock").attr("style","width:100%;height:100%;zoom:0.5;");



function glitch() {
	glitchBlock('#oblock', 100);
}

function randomizer(tag,glitchAmount) {
	var elements= $("iframe").contents().find(tag);
	var attributes="";
	elements.each(function() {
			$( this ).replaceWith( "<path d=\"M 10 35 l 15 24 35 l 15 24 35 l 15 24 M 10 35 l 15 24 Z\" stroke=\"blue\"></path>" );
		/*	
			//$(this).attr("x",$(this).attr("x")+Math.random()*10);
			var boolrand=Math.floor(Math.random()*2)==0;
			$(this).attr("y", $(this).attr("y")*(boolrand?1:-1));
			$( this ).css( "background-color", "rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+")" );
			$( this ).css( "color", "rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+")");
			$( this ).css( "stroke","rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+")");
			$( this ).css( "stroke-width",+Math.floor(Math.random()*glitchAmount));

			$( this ).css( "fill","rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+")");
*/			
});
}

function glitchBlock(blockId, amount) {

	randomizer("rect",amount);
//	randomizer("path",amount);
//	randomizer("circle",amount);
//	randomizer("line",amount);

}
</script>

<script src="../js/glitchLib.js"></script>
