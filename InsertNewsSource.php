<?php
require_once("NewsSourcePDO.php");
require_once("NewsSource.php");

if(isset($_POST['submit']))
{
 $newssourcename = $_POST["newssourcename"];
// echo $username . "<br>\n";

 $newssourcelink = $_POST["newssourcelink"];
 //echo $password ."<br>\n";
 
 $newssourcelinktype = $_POST["newssourcelinktype"];

 if($newssourcename !='' && $newssourcelink !='' && $newssourcelinktype != '')
 {
  $newsSourcePDO = new NewsSourcePDO();

  $newsSource = new NewsSource();
  $newsSource->setNewsSourceName($newssourcename);
  $newsSource->setNewsSourceLink($newssourcelink);
  $newsSource->setNewsSourceLinkType($newssourcelinktype);

  $newsSourcePDO->insertNewsSource($newsSource);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Insert NewsSource</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Created a NewsSource </br>");
  echo("<a href='index.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
     echo("<a href='CreateNewsSource.php'> Back to Create News Source Page</a>");
 }
}
  

?>