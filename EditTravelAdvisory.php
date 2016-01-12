<?php
require_once("TravelAdvisoryPDO.php");
require_once("TravelAdvisory.php");

if(isset($_POST['submit']))
{
	
$traveladvisoryid = $_POST["traveladvisoryid"];
	
 $traveladvisorysourcename = $_POST["traveladvisorysourcename"];
// echo $username . "<br>\n";

 $traveladvisorysourcelink = $_POST["traveladvisorysourcelink"];
 //echo $password ."<br>\n";
 
 $traveladvisorysourcelinktype = $_POST["traveladvisorysourcelinktype"];

 if($traveladvisorysourcename !='' && $traveladvisorysourcelink !='' && $traveladvisorysourcelinktype != '')
 {
  $traveladvisoryPDO = new TravelAdvisoryPDO();

  $travelAdvisory = new TravelAdvisory();
  $travelAdvisory->setTravelAdvisoryId($traveladvisoryid);
  $travelAdvisory->setTravelAdvisorySourceName($traveladvisorysourcename);
  $travelAdvisory->setTravelAdvisorySourceLink($traveladvisorysourcelink);
  $travelAdvisory->setTravelAdvisorySourceLinkType($traveladvisorysourcelinktype);

  $traveladvisoryPDO->updateTravelAdvisory($travelAdvisory);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Insert Travel Advisory</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Created a Travel Advisory </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='UpdateTravelAdivsory.php'> Back to Update Travel Advisory Page</a>");
 }
}
  

?>