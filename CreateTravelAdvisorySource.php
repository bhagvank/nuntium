<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Create Travel Advisory Source</title>
	</head>
<body>
	<?php
	  include "menu.php";
	?>
<form action="InsertTravelAdvisorySource.php" method="post">
<table>
<tr>
<td> Travel Advisory Source </td>
<td><input type="text" name="traveladvisorysourcename"></td>
</tr>
<tr>
<td> Travel Advisory Source Link </td>
<td><input type="text" name="traveladvisorysourcelink"></td>
</tr>
<tr>
<td> Travel Advisory Source Link Type </td>
<td> <input type="text" name="traveladvisorysourcelinktype"></td>
</tr>
<tr>
<td> Submit</td>
<td><input type="submit" name="submit" value="submit"></td>
</tr>
</form>

</body>
</html>