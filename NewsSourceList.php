<?php
require_once("NewsSourcePDO.php");
require_once("NewsSource.php");

 $newsSourcePDO = new NewsSourcePDO();

$newsSources = $newsSourcePDO->getNewsSources();

echo "<html>";
echo "<head>";

echo "<meta http-equiv='Content-Type'' content='text/html; charset=UTF-8' >";
echo "<link rel='stylesheet'' type='text/css' href='menu.css'>";
echo "<title>News Portal User List</title>";

echo "</head>";
echo "<body>";

	  include "menu.php";
echo "<table border=1>";
echo "<tr border=1>";
	echo "<th border=1><h4>News Source Id</h4></th>";
	echo "<th border=1><h4>News Source Name</h4></th>";
	echo "<th border=1><h4>News Source Link</h4></th>";
	echo "<th border=1><h4>News Source Link Type</h4></th>";
	echo "<th border=1><h4>Update Link</h4></th>";
	echo "<th border=1><h4>Delete Link</h4></th>";
echo "</tr>";	
	

foreach($newsSources as $newsSource)
{
	echo "<tr border=1>";
	echo "<td border=1>";
	echo "<h5>" .$newsSource->getNewsSourceId() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$newsSource->getNewsSourceName() ."</h5>" ;
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$newsSource->getNewsSourceLink() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$newsSource->getNewsSourceLinkType() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='UpdateNewsSource.php?id=" .$newsSource->getNewsSourceId() ."'> Update News Source </a>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='DeleteNewsSource.php?id=" .$newsSource->getNewsSourceId() ."'> Delete News Source </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> Back to Home</a>");
echo "</body>";
echo "</html>";


?>