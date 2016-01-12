<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Create Sentiment Source</title>
	</head>
<body>
	<?php
	  include "menu.php";
	?>
<form action="InsertSentimentSource.php" method="post">

<h5>Input Sentiment Source</h5>
<br>
<input type="text" name="sentimentsourcename">
<br>
<h5>Input Sentiment Source Link</h5>
<br>
<input type="text" name="sentimentsourcelink">
<br>

<h5>Input Sentiment Source Link Type</h5>
<br>
<input type="text" name="sentimentsourcelinktype">
<br>
<h5>Submit</h5>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>