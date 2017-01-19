<head>
<script src="https://code.jquery.com/jquery-1.11.3.js">
</script>
</head>
<body>
<div id="glitches"></div>
<div id="links"></div>
<div id="upload"><h2>Upload</h2>
 <?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

 
</div>
<div id="selecPic"></div>
<script >
$("#opic").ready(function(){
});
</script>
</body>
<script >
$("#links").html('<object id="olink" class="divs" data="links.php">');
$("#glitches").html('<object id="oglitches" class="divs" data="glitches.php">');
$("#selecPic").html('<object id="opic" name="opic" class=divs selected_pic="null" data="selecPic.php">');
</script>
<style>
.divs {
	margin:10px;
	width:20%;
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
</style>
