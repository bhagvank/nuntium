<?php
require_once("TravelAdvisoryPDO.php");
require_once("TravelAdvisory.php");

   $traveladvisoryid = $_GET["id"];
   
   $traveladvisoryPDO = new TravelAdvisoryPDO();
   $traveladvisory = $traveladvisoryPDO->getTravelAdvisory($traveladvisoryid);
  
 // echo "UserId " .$user->getUserId();

   $traveladvisoryPDO->deleteTravelAdvisory($traveladvisory);
   
   echo("<html>");
   echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Delete Travel Advisory</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Deleted Travel Advisory </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
?>