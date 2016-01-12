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

<h5>Input Travel Advisory Source</h5>
<br>
<input type="text" name="traveladvisorysourcename">
<br>
<h5>Input Travel Advisory Source Link</h5>
<br>
<input type="text" name="traveladvisorysourcelink">
<br>

<h5>Input Travel Advisory Source Link Type</h5>
<br>
<input type="text" name="traveladvisorysourcelinktype">
<br>
<h5>Submit</h5>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>