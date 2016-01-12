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
<h5>Input Event Type</h5>
<br>
<input type="text" name="eventtype">
<br>
<h5>Input Event Source</h5>
<br>
<input type="text" name="eventsourcename">
<br>
<h5>Input Event Source Link</h5>
<br>
<input type="text" name="eventsourcelink">
<br>
<h5>Input Event Source Link Type</h5>
<input type="text" name="eventsourcelinktype">
<br>
<h5>submit</h5>
<br>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>
