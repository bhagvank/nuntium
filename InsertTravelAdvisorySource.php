<?php
require_once("TravelAdvisoryPDO.php");
require_once("TravelAdvisory.php");

if(isset($_POST['submit']))
{
 $traveladvisorysourcename = $_POST["traveladvisorysourcename"];
// echo $username . "<br>\n";

 $traveladvisorysourcelink = $_POST["traveladvisorysourcelink"];
 //echo $password ."<br>\n";
 
 $traveladvisorysourcelinktype = $_POST["traveladvisorysourcelinktype"];

 if($traveladvisorysourcename !='' && $traveladvisorysourcelink !='' && $traveladvisorysourcelinktype != '')
 {
  $traveladvisoryPDO = new TravelAdvisoryPDO();

  $travelAdvisory = new TravelAdvisory();
  $travelAdvisory->setTravelAdvisorySourceName($traveladvisorysourcename);
  $travelAdvisory->setTravelAdvisorySourceLink($traveladvisorysourcelink);
  $travelAdvisory->setTravelAdvisorySourceLinkType($traveladvisorysourcelinktype);

  $traveladvisoryPDO->insertTravelAdvisory($travelAdvisory);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Insert Travel Advisory</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Created a Travel Advisory </br>");
  echo("<a href='index.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='CreateTravelAdvisorySource.php'> Back to Create Travel Advisory Source Page</a>");
 }
}
  

?>