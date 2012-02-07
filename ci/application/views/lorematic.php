<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lorematic</title>
	<link href="css/site.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
	<div id="content">
		<header>	
			<h1>Lorematic</h1>
		</header>

		<form id="lorematic-form" action="#">
			<label for="paragraphs">Number of Paragraphs:</label> <input type="number" name="paragraphs" id="paragraphs" min="1" max="20" value="1">
			<input type="radio" name="type" value="html" id="type-html"> <label for="type-html">html</label>
			<input type="radio" name="type" value="text" id="type-text" checked> <label for="type-text">text</label>
			<input type="submit" value="Generate" id="generate">
		</form>
		<textarea id="lorematic">
		<?php echo $lorem;?>
		</textarea>

		<footer>	
		</footer>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
	<script src="js/lorematic.js"></script>
</body>
</html>