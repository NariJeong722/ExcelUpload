<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/style.css" type="text/CSS"/>
</head>
<body>
	<form enctype="multipart/form-data" action="/ExcelUpload/ExcelUpload/controller/ProductController.php" method="post">
		<input type="file" name="fileName"/>
		<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		<input type="submit"value="파일전송"/>
	</form>
</body>
</html>
