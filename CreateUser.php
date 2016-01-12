<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Create User</title>
	</head>
<body>
	<?php
	  include "menu.php";
	?>
<form action="InsertUser.php" method="post">

<h5>Input Username</h5>
<br>
<input type="text" name="username">
<br>
<h5>Input Password</h5>
<br>
<input type="text" name="password">
<br>
<h5>Submit</h5>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>
