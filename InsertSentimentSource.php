<?php
require_once("SentimentPDO.php");
require_once("Sentiment.php");

if(isset($_POST['submit']))
{
 $sentimentsourcename = $_POST["sentimentsourcename"];
// echo $username . "<br>\n";

 $sentimentsourcelink = $_POST["sentimentsourcelink"];
 //echo $password ."<br>\n";
 
 $sentimentsourcelinktype = $_POST["sentimentsourcelinktype"];

 if($sentimentsourcename !='' && $sentimentsourcelink !='' && $sentimentsourcelinktype != '')
 {
  $sentimentPDO = new SentimentPDO();

  $sentiment = new Sentiment();
  $sentiment->setSentimentSourceName($sentimentsourcename);
  $sentiment->setSentimentSourceLink($sentimentsourcelink);
  $sentiment->setSentimentSourceLinkType($sentimentsourcelinktype);

  $sentimentPDO->insertSentiment($sentiment);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Insert Sentiment Source</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Created a Sentiment Source </br>");
  echo("<a href='index.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
     echo("<a href='CreateSentiment.php'> Back to Create Sentiment</a>");
 }
}
  

?>