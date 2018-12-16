<?php
require_once("TravelAdvisoryPDO.php");
require_once("TravelAdvisory.php");

 $traveladvisoryPDO = new TravelAdvisoryPDO();

 $traveladvisories = $traveladvisoryPDO->getTravelAdvisories();

echo "<html>";
echo "<head>";

echo "<meta http-equiv='Content-Type'' content='text/html; charset=UTF-8' >";
echo "<link rel='stylesheet'' type='text/css' href='menu.css'>";
echo "<title>News Portal Travel Advisory List</title>";

echo "</head>";
echo "<body>";

	  include "menu.php";
echo "<table border=1>";
echo "<tr border=1>";
	echo "<th border=1><h4>Travel Advisory Id</h4></th>";
	echo "<th border=1><h4>Travel Advisory Source Name</h4></th>";
	echo "<th border=1><h4>Travel Advisory Source Link</h4></th>";
	echo "<th border=1><h4>Travel Advisory Source Link Type</h4></th>";
	echo "<th border=1><h4>Update Link</h4></th>";
	echo "<th border=1><h4>Delete Link</h4></th>";
echo "</tr>";	
	

foreach($traveladvisories as $traveladvisory)
{
	echo "<tr border=1>";
	echo "<td border=1>";
	echo "<h5>" .$traveladvisory->getTravelAdvisoryId() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$traveladvisory->getTravelAdvisorySourceName() ."</h5>" ;
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$traveladvisory->getTravelAdvisorySourceLink() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$traveladvisory->getTravelAdvisorySourceLinkType() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='UpdateTravelAdvisory.php?id=" .$traveladvisory->getTravelAdvisoryId() ."'> Update Travel Advisory Source </a>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='DeleteTravelAdvisorySource.php?id=" .$traveladvisory->getTravelAdvisoryId() ."'> Delete Travel Advisory Source </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> Back to Home</a>");
echo "</body>";
echo "</html>";


?>