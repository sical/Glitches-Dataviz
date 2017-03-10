<head>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>   
<link rel="stylesheet" type="text/css" href="style/general.css">


<base target="_parent" />
</head>

<body>	
<h2>Enter Url</h2>
<form>
http://blockbuilder.org/
<input type="text" id="url" ></input>
</form>
</body>
<script>
var bburl="";
$( "#url" ).change(function() {
		bburl=$("#url").val();
		parent.$("#obbuilder").attr("bburl",bburl);

		});

</script>

