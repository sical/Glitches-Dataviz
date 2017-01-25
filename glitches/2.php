<html>
<head>
<title>databending</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></link>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="marged-div">
<button onclick="glitch()">Glitch</button>
<canvas id="canvas" >
Affichage d'un texte pour les navigateurs qui ne supportent pas canvas.
</canvas>
<iframe  type="text/html" id="oblock"></iframe>
</div>
</body>
</html>
<style>
.marged-div{
margin:10px;
}
</style>
<?php
if($_GET["bburl"]!="null"){
	exec("git clone https://gist.github.com/". split("[/]",$_GET["bburl"])[1].".git /var/www/html/Glitches-Dataviz/git/".split("[/]",$_GET["bburl"])[1]."/");
	echo "t";
}
?>
<script>
if("<?php echo $_GET["pic"]?>"!="null"){
	var img = new Image();
	var glitchAmount=Math.floor((Math.random() *10) + 1);
	var canvas = document.getElementById('canvas');
	var ctx = canvas.getContext('2d');
	img.onload = function() {
		canvas.width=img.naturalWidth;
		canvas.height=img.naturalHeight;
		ctx.drawImage(img, 0, 0);
	};
	img.src = "../uploads/<?php echo $_GET["pic"]?>";
}
else if("<?php echo $_GET["bburl"]?>"!="null"){
	$("#oblock").attr("src","../git/<?php echo split("[/]",$_GET["bburl"])[1]?>/");
	$("#oblock").attr("style","width:100%;height:100%;zoom:0.5;");

}


function glitch() {
	if("<?php echo $_GET["pic"]?>"!="null"){
		glitchImage('canvas', glitchAmount);
	}
	else if("<?php echo $_GET["bburl"]?>"!="null"){
		glitchBlock('#oblock', glitchAmount);
	}
}


function glitchBlock(blockId, amount) {
	var divs=$("iframe").contents().find("div");
	var paths=$("iframe").contents().find("path");
	var circles=$("iframe").contents().find("circle");
	var lines=$("iframe").contents().find("line");
	for(var i=0;i<divs.length;i++){
		var tv=(Math.floor(Math.random()*25)+10);
		var th=(Math.floor(Math.random()*25)+10);
		divs[i].setAttribute("style",divs[i].getAttribute("style")+"top:"+tv*i+"px;width:"+tv+"px;height:"
		+th+"px;background-color:rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+");");
	}
        for(var i=0;i<paths.length;i++){
                var tv=(Math.floor(Math.random()*25)+10);
                var th=(Math.floor(Math.random()*25)+10);
                paths[i].setAttribute("style",paths[i].getAttribute("style")+"top:"+tv*i+"px;width:"+tv+"px;height:"
		+th+"px;fill:rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+");");
        }

	for(var i=0;i<circles.length;i++){
		var tv=(Math.floor(Math.random()*25)+10);
		var th=(Math.floor(Math.random()*25)+10);
		circles[i].setAttribute("style",circles[i].getAttribute("style")+";fill:rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+");");
		circles[i].setAttribute("r",circles[i].getAttribute("r")+Math.floor(Math.random()*10));
	}	
	
	for(var i=0;i<lines.length;i++){
		var tv=(Math.floor(Math.random()*25)+10);
		var th=(Math.floor(Math.random()*25)+10);
		lines[i].setAttribute("style",lines[i].getAttribute("style")+";stroke-width:"+Math.floor(Math.random()*10)+";stroke:rgb("+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+","+Math.floor(Math.random()*255)+");");
	}
}
</script>

<script src="../js/glitchLib.js"></script>
