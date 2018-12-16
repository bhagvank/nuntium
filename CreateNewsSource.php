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
<table>
<tr>
<td> NewsSource</td>
<td><input type="text" name="newssourcename"></td>
</tr>
<tr>
<td> NewsSourceLink </td>
<td><input type="text" name="newssourcelink"></td>
</tr>
<tr>
<td> NewsSourceLinkType </td>
<td><input type="text" name="newssourcelinktype"></td>
</tr>
<tr>
<td> Submit </td>
<td><input type="submit" name="submit" value="submit"></td>
</tr>
</form>

</body>
</html>