<?php
require_once("EventPDO.php");
require_once("Event.php");

if(isset($_POST['submit']))
{
	
 $eventtype = $_POST["eventtype"];
 	
 $eventsourcename = $_POST["eventsourcename"];
// echo $username . "<br>\n";

 $eventsourcelink = $_POST["eventsourcelink"];
 //echo $password ."<br>\n";
 
 $eventsourcelinktype = $_POST["eventsourcelinktype"];

 if($eventtype !='' && $eventsourcename !='' && $eventsourcelink !='' && $eventsourcelinktype != '')
 {
  $eventPDO = new EventPDO();

  $event = new Event();
  $event->setEventType($eventtype);
  $event->setEventSourceName($eventsourcename);
  $event->setEventSourceLink($eventsourcelink);
  $event->setEventSourceLinkType($eventsourcelinktype);

  $eventPDO->insertEvent($event);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Insert Event Source</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Created a Event Source </br>");
  echo("<a href='index.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='CreateEvent.php'> Back to Create Event Page</a>");
 }
}
  

?>