<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="" content="">
<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
</head>
<body>
<h1>Header</h1>
	<? if(isset($text)) : ?>
		
			<h2>
				<?=$text['name_film'];?>
			</h2>
			<p>
				<?=$text['genre'];?>
			</p>
	
	<? endif; ?>
<h6>footer</h6>
</body>
</html>

