<html>
<head>
	<title>foo</title>
</head>
<body>
	<form method="post" action="<?php echo $router->generate('api.jalan.update-create-distance', ['id_jalan' => 101]) ?>">		
		<div class="form-group">
			<input type="text" name="start" placeholder="start">
		</div>
		<div class="form-group">
			<input type="text" name="finish" placeholder="finish">
		</div>
		<div class="form-group">
			<input type="text" name="distance" placeholder="distance">
		</div>
		<div class="form-group">
			<input type="submit" value="submit">
		</div>
	</form>
</body>
</html>