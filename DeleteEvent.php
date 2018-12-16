<?php
require_once("EventPDO.php");
require_once("Event.php");

   $eventid = $_GET["id"];
   
   $eventPDO = new EventPDO();
   $event = $eventPDO->getEvent($eventid);
  
 // echo "UserId " .$user->getUserId();

   $eventPDO->deleteEvent($event);
   
   echo("<html>");
   echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Delete Event</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Deleted Event </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
?>