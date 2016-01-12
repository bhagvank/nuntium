<?php
require_once("NewsSourcePDO.php");
require_once("NewsSource.php");

if(isset($_POST['submit']))
{
	
 $newssourceid = $_POST["newssourceid"];
 
 $newssourcename = $_POST["newssourcename"];
// echo $username . "<br>\n";

 $newssourcelink = $_POST["newssourcelink"];
 //echo $password ."<br>\n";
 
 $newssourcelinktype = $_POST["newssourcelinktype"];

 if($newssourcename !='' && $newssourcelink !='' && $newssourcelinktype != '')
 {
  $newsSourcePDO = new NewsSourcePDO();

  $newsSource = new NewsSource();
  $newsSource->setNewsSourceId($newssourceid);
  $newsSource->setNewsSourceName($newssourcename);
  $newsSource->setNewsSourceLink($newssourcelink);
  $newsSource->setNewsSourceLinkType($newssourcelinktype);

  $newsSourcePDO->updateNewsSource($newsSource);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Edit NewsSource</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Updated the NewsSource </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='UpdateNewsSource.php'> Back to Update News Source Page</a>");
 }
}
  

?>