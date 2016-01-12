<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
		
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Update User</title>
	</head>
<body>
	
<?php
  include "menu.php";
  require_once("UserPDO.php");
   require_once("User.php");
   $userid = $_GET["id"];
   
   $userPDO = new UserPDO();
   $user = $userPDO->getUser($userid);
  
?>	
<form action="EditUser.php" method="post">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
Input Username
<br>
<input type="text" name="username" value="<?php echo $user->getUserName() ?>">
<br>
Input Password
<br>
<input type="text" name="password" value="<?php echo $user->getPassword() ?>">
<br>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>