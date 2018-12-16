<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Create Event</title>
	</head>
<body>
	<?php
	  include "menu.php";
	?>
<form action="InsertEvent.php" method="post">
<table>
<tr>
<td>Input Event Type</td>
<td><input type="text" name="eventtype"></td>
</tr>
<tr>
<td>Input Event Source</td>
<td><input type="text" name="eventsourcename"></td>
</tr>
<tr>
<td>Input Event Source Link</td>
<td><input type="text" name="eventsourcelink"></td>
</tr>
<tr>
<td>Input Event Source Link Type</td>
<td><input type="text" name="eventsourcelinktype"></td>
</tr>
<tr>
<td>submit</td>
<td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>

</form>

</body>
</html>
