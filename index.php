<head>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</head>
<body>
<div class="se-pre-con"></div>
<div id="upload"><h2>Upload</h2>
 <?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>

<form id="upForm" action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

 
<div id="blockbuilder"></div>
<div id="glitches"></div>
</div>
<div id="selecPic"></div>
<div id="links">links</div>
<div id="preview"></div>
<script >
$("#opic").ready(function(){
});
</script>
</body>
<script >
$("#links").html('<object id="olink" type="text/html" class="divs" data="links.php">');
$("#olink").hide();

$('#olink').hover(
  function () {
    $(this).show();
  }, 
  function () {
    $(this).hide();
  }
);
$("#preview").html('<object id="opreview" type="text/html" class="prev-div" data="">');
$("#glitches").html('<object id="oglitches" type="text/html" class="" data="glitches.php">');
$("#selecPic").html('<object id="opic" name="opic" type="text/html" class=divs selected_pic="null" data="selecPic.php">');
$("#blockbuilder").html('<object id="obbuilder" name="obbuilder" type="text/html" class="" bburl="null" data="bbuilder.php">');




$('#upForm').on('submit', function(){
     if($("#fileToUpload").val()!=""){
        return true;  
     } 
   alert('Please select a file');
   return false;
});
</script>
<style>
#preview { width: 710px; height: 1420px; padding: 0; overflow: hidden; }
#opreview { width: 1000px; height: 2000px; border: 0px; }
#opreview {
    zoom: 0.71;
    -moz-transform: scale(0.71);
    -moz-transform-origin: 0 0;
    -o-transform: scale(0.71);
    -o-transform-origin: 0 0;
    -webkit-transform: scale(0.71);
    -webkit-transform-origin: 0 0;
}

@media screen and (-webkit-min-device-pixel-ratio:0) {
 #opreview  { zoom: 1;  }
}
body{
    font-family: Arial, Helvetica, sans-serif;
}
.prev-div {
	margin:10px;
	width:29%;
	float:left;
	height:100%;
}
.divs {
	margin:10px;
	width:15%;
	float:left;
	height:100%;
}
#upload {
	margin:10px;
	left:40%;
	width:20%;
	height:100%;
	float:left;
}

/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(simple-pre-loader/images/loader-64x/Preloader_1.gif) center no-repeat #fff;
}
</style>
