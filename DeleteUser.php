<?php
   
   require_once("UserPDO.php");
   require_once("User.php");
   $userid = $_GET["id"];
   
   $userPDO = new UserPDO();
   $user = $userPDO->getUser($userid);
  
 // echo "UserId " .$user->getUserId();

   $userPDO->deleteUser($user);
   
   echo("<html>");
   echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Delete User</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("Deleted User </br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
?>