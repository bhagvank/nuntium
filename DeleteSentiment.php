<?php
require_once("SentimentPDO.php");
require_once("Sentiment.php");

   $sentimentid = $_GET["id"];
   
   $sentimentPDO = new SentimentPDO();
   $sentiment = $sentimentPDO->getSentiment($sentimentid);
  
 // echo "UserId " .$user->getUserId();

   $sentimentPDO->deleteSentiment($sentiment);
   
   echo("<html>");
   echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Delete Sentiment</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Deleted Sentiment </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
?>