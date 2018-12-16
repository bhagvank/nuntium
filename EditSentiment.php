<?php
require_once("SentimentPDO.php");
require_once("Sentiment.php");

if(isset($_POST['submit']))
{
	
 $sentimentid = $_POST["sentimentid"];
 	
 $sentimentsourcename = $_POST["sentimentsourcename"];
// echo $username . "<br>\n";

 $sentimentsourcelink = $_POST["sentimentsourcelink"];
 //echo $password ."<br>\n";
 
 $sentimentsourcelinktype = $_POST["sentimentsourcelinktype"];

 if($sentimentsourcename !='' && $sentimentsourcelink !='' && $sentimentsourcelinktype != '')
 {
  $sentimentPDO = new SentimentPDO();

  $sentiment = new Sentiment();
  $sentiment->setSentimentId($sentimentid);
  $sentiment->setSentimentSourceName($sentimentsourcename);
  $sentiment->setSentimentSourceLink($sentimentsourcelink);
  $sentiment->setSentimentSourceLinkType($sentimentsourcelinktype);

  $sentimentPDO->updateSentiment($sentiment);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Update Sentiment Source</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Updated a Sentiment Source </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
     echo("<a href='UpdateSentiment.php'> Back to Update Sentiment Page</a>");
 }
}
  

?>