<?php
require_once("UserPDO.php");
require_once("User.php");

if(isset($_POST['submit']))
{
	
 $userid = $_POST["userid"];
// echo $userid . "<br>\n";
 	
 $username = $_POST["username"];
 //echo $username . "<br>\n";

 $password = $_POST["password"];
 //echo $password ."<br>\n";

 if($username !='' && $password !='')
 {
  $userPDO = new UserPDO();

  $user = new User();
  $user->setUserId($userid);
  $user->setUserName($username);
  $user->setPassword($password);

  $userPDO->updateUser($user);
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal - Edit User</title>");
  echo("</head>");
  echo("<body>");
  include "menu.php";
  echo("User updated <br>");
  echo("<a href='Home.php'> Back to Home</a>");
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='UpdateUser.php'> Back to Update User</a>");
 }
}
