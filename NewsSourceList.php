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
echo "<body> ";

	  include "menu.php";
echo "<table border=1>";
echo "<tr border=1>";
	echo "<th border=1><h4><font color=#000000>News Source Id</font></h4></th>";
	echo "<th border=1><h4><font color=#000000>News Source Name</font></h4></th>";
	echo "<th border=1><h4><font color=#000000>News Source Link</font></h4></th>";
	echo "<th border=1><h4><font color=#000000>News Source Link Type</font></h4></th>";
	echo "<th border=1><h4><font color=#000000>Update Link</font></h4></th>";
	echo "<th border=1><h4>Delete Link</h4></th>";
echo "</tr>";	
	

foreach($newsSources as $newsSource)
{
	echo "<tr border=1>";
	echo "<td border=1>";
	echo "<h5><font color=#000000> ".$newsSource->getNewsSourceId() ."</font></h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5><font color=#000000> " .$newsSource->getNewsSourceName() ." </font></h5>" ;
	echo "</td>";
	echo "<td border=1>";
	echo "<h5><font color=#000000> " .$newsSource->getNewsSourceLink() ."</font></h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5><font color=#000000> " .$newsSource->getNewsSourceLinkType() ." </font></h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='UpdateNewsSource.php?id=" .$newsSource->getNewsSourceId() ."'><font color=#000000> Update News Source</font> </a>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='DeleteNewsSource.php?id=" .$newsSource->getNewsSourceId() ."'> <font color=#000000>Delete News Source</font> </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> <font color=#000000>Back to Home</font></a>");
echo "</body>";
echo "</html>";


?>