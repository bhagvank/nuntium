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
<table>
<tr>
<td> Sentiment Source </td>
<td><input type="text" name="sentimentsourcename"></td>
</tr>
<tr>
<td> Sentiment Source Link </td>
<td><input type="text" name="sentimentsourcelink"></td>
</tr>
<tr>
<td> Sentiment Source Link Type </td>
<td><input type="text" name="sentimentsourcelinktype"></td>
</tr>
<tr>
<td> Submit</td>
<td><input type="submit" name="submit" value="submit">

</form>

</body>
</html>