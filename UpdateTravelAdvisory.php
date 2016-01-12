<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Update Travel Advisory Source</title>
	</head>
<body>
	<?php
	  include "menu.php";
	  require_once("TravelAdvisoryPDO.php");
   require_once("TravelAdvisory.php");
   $traveladvisoryid = $_GET["id"];
   
   $traveladvisoryPDO = new TravelAdvisoryPDO();
   $traveladvisory = $traveladvisoryPDO->getTravelAdvisory($traveladvisoryid);
  
	?>
<form action="EditTravelAdvisory.php" method="post">
<input type="hidden" name="traveladvisoryid" value="<?php echo $traveladvisoryid ?>">
<h1>Input Travel Advisory Source</h1>
<br>
<input type="text" name="traveladvisorysourcename" value="<?php echo $traveladvisory->getTravelAdvisorySourceName() ?>">
<br>
<h1>Input Travel Advisory Source Link</h1>
<br>
<input type="text" name="traveladvisorysourcelink" value="<?php echo $traveladvisory->getTravelAdvisorySourceLink() ?>">
<br>

<h1>Input Travel Advisory Source Link Type</h1>
<br>
<input type="text" name="traveladvisorysourcelinktype" value="<?php echo $traveladvisory->getTravelAdvisorySourceLinkType() ?>">
<br>
<h1>Submit</h1>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>