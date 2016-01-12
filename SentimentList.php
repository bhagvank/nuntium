<?php
require_once("SentimentPDO.php");
require_once("Sentiment.php");

 $sentimentPDO = new SentimentPDO();

$sentiments = $sentimentPDO->getSentiments();

echo "<html>";
echo "<head>";

echo "<meta http-equiv='Content-Type'' content='text/html; charset=UTF-8' >";
echo "<link rel='stylesheet'' type='text/css' href='menu.css'>";
echo "<title>News Portal Sentiment List</title>";

echo "</head>";
echo "<body>";

	  include "menu.php";
echo "<table border=1>";
echo "<tr border=1>";
	echo "<th border=1><h4>Sentiment Source Id</h4></th>";
	echo "<th border=1><h4>Sentiment Source Name</h4></th>";
	echo "<th border=1><h4>Sentiment Source Link</h4></th>";
	echo "<th border=1><h4>Sentiment Source Link Type</h4></th>";
	echo "<th border=1><h4>Update Link</h4></th>";
	echo "<th border=1><h4>Delete Link</h4></th>";
echo "</tr>";	
	

foreach($sentiments as $sentiment)
{
	echo "<tr border=1>";
	echo "<td border=1>";
	echo "<h5>" .$sentiment->getSentimentId() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$sentiment->getSentimentSourceName() ."</h5>" ;
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$sentiment->getSentimentSourceLink() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<h5>" .$sentiment->getSentimentSourceLinkType() ."</h5>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='UpdateSentiment.php?id=" .$sentiment->getSentimentId() ."'> Update Sentiment Source </a>";
	echo "</td>";
	echo "<td border=1>";
	echo "<a href='DeleteSentiment.php?id=" .$sentiment->getSentimentId() ."'> Delete Sentiment Source </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> Back to Home</a>");
echo "</body>";
echo "</html>";


?>