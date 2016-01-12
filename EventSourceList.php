<?php
require_once("EventPDO.php");
require_once("Event.php");

 $eventPDO = new EventPDO();

$events = $eventPDO->getEvents();

echo "<html>";
echo "<head>";

echo "<meta http-equiv='Content-Type'' content='text/html; charset=UTF-8' >";
echo "<link rel='stylesheet'' type='text/css' href='menu.css'>";
echo "<title>News Portal Event List</title>";

echo "</head>";
echo "<body>";

	  include "menu.php";
echo "<table border=1>";
echo "<tr border=1>";
	echo "<th border=1><h4>Event Id</h4></th>";
	echo "<th border=1><h4>Event Type</h4></th>";
	echo "<th border=1><h4>Event Source Name</h4></th>";
	echo "<th border=1><h4>Event Source Link</h4></th>";
	echo "<th border=1><h4>Event Source Link Type</h4></th>";
	echo "<th border=1><h4>Update Link</h4></th>";
	echo "<th border=1><h4>Delete Link</h4></th>";
echo "</tr>";	
	

foreach($events as $event)
{
	echo "<tr border=1>";
	echo "<td border=1>";
	echo "<h5>" .$event->getEventId() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$event->getEventType() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$event->getEventSourceName() ."</h5>" ;
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$event->getEventSourceLink() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$event->getEventSourceLinkType() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='UpdateEvent.php?id=" .$event->getEventId() ."'> Update Event Source</a>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='DeleteEvent.php?id=" .$event->getEventId() ."'> Delete Event Source </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> Back to Home</a>");
echo "</body>";
echo "</html>";


?>