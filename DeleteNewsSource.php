<?php
require_once("NewsSourcePDO.php");
require_once("NewsSource.php");

   $newssourceid = $_GET["id"];
   
   $newssourcePDO = new NewsSourcePDO();
   $newssource = $newssourcePDO->getNewsSource($newssourceid);
  
 // echo "UserId " .$user->getUserId();

   $newssourcePDO->deleteNewsSource($newssource);
   
   echo("<html>");
   echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Delete NewsSource</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Deleted NewsSource </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
?>