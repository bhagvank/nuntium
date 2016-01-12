<?php
require_once("UserPDO.php");
require_once("User.php");

if(isset($_POST['submit']))
{
 $username = $_POST["username"];
// echo $username . "<br>\n";

 $password = $_POST["password"];
 //echo $password ."<br>\n";

 if($username !='' && $password !='')
 {
  $userPDO = new UserPDO();

  $user = new User();
  $user->setUserName($username);
  $user->setPassword($password);

  $loggedIn = $userPDO->checkUserExists($user);
  
  
  echo("<html>");
  echo("<head>");
  echo("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >");
  echo("<link rel='stylesheet' type='text/css' href='menu.css'>");

  echo("<title>News Portal -User Login</title>");
  echo("</head>");
  echo("<body>");
  
  
  if($loggedIn)
  {
  	include "menu.php";
    echo("User LoggedIn </br>");
   
    echo("Welcome to Nuntium Home");
  }
  else
  {
       echo("User Not LoggedIn </br>");
    echo("<a href='index.php'> Go to Home</a>");
  }
  
  echo("</body>");
  echo("</html");
  
 }
 else {
     echo "Please fill all of the fields" . "<br>\n";
	 echo("<a href='index.php'> Go to Login Page</a>");
 }
}
  

?>