<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Create NewsSource</title>
	</head>
<body>
	<?php
	  include "menu.php";
	?>
<form action="InsertNewsSource.php" method="post">

<h5>Input NewsSource</h5>
<br>
<input type="text" name="newssourcename">
<br>
<h5>Input NewsSourceLink</h5>
<br>
<input type="text" name="newssourcelink">
<br>

<h5>Input NewsSourceLinkType</h5>
<br>
<input type="text" name="newssourcelinktype">
<br>
<h5>Submit</h5>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>