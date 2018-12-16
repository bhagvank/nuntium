<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Update Event Source</title>
	</head>
<body>
	<?php
	  include "menu.php";
	  require_once("EventPDO.php");
   require_once("Event.php");
   $eventid = $_GET["id"];
   
   $eventPDO = new eventPDO();
   $event = $eventPDO->getEvent($eventid);
  
	?>
<form action="EditEvent.php" method="post">
<input type="hidden" name="eventid" value="<?php echo $eventid ?>">
<h1>Input Event Type</h1>
<br>
<input type="text" name="eventtype" value="<?php echo $event->getEventType() ?>">
<br>
<h1>Input Event  Source</h1>
<br>
<input type="text" name="eventsourcename" value="<?php echo $event->getEventSourceName() ?>">
<br>

<h1>Input Event SourceLink</h1>
<br>
<input type="text" name="eventsourcelink" value="<?php echo $event->getEventSourceLink() ?>">
<br>

<h1>Input Event Source Link Type</h1>
<br>
<input type="text" name="eventsourcelinktype" value="<?php echo $event->getEventSourceLinkType() ?>">
<br>
<h1>Submit</h1>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>