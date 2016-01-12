<?php
require_once("UserPDO.php");
require_once("User.php");

$userPDO = new UserPDO();

$users = $userPDO->getUsers();

echo "<html>";
echo "<head>";

echo "<meta http-equiv='Content-Type'' content='text/html; charset=UTF-8' >";
echo "<link rel='stylesheet'' type='text/css' href='menu.css'>";
echo "<title>News Portal User List</title>";

echo "</head>";
echo "<body>";

	  include "menu.php";
echo "<table>";
echo "<tr>";
	echo "<th>Userid</th>";
	echo "<th>UserName</th>";
	echo "<th>Password</th>";
echo "</tr>";	
	

foreach($users as $user)
{
	echo "<tr>";
	echo "<td>";
	echo $user->getUserId();
	echo "</td>";
	echo "<td>";
	echo $user->getUserName();
	echo "</td>";
	echo "<td>";
	echo $user->getPassword();
	echo "</td>";
	echo "<td>";
	echo "<a href='UpdateUser.php?id=" .$user->getUserId() ."'> Update User </a>";
	echo "</td>";
	echo "<td>";
	echo "<a href='DeleteUser.php?id=" .$user->getUserId() ."'> Delete User </a>";
	echo "</td>";
	echo "</tr>";
	
}

echo "</table>";

echo("<a href='Home.php'> Back to Home</a>");
echo "</body>";
echo "</html>";


?>