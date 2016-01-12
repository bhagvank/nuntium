<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Update NewsSource</title>
	</head>
<body>
	<?php
	  include "menu.php";
	  require_once("NewsSourcePDO.php");
   require_once("NewsSource.php");
   $newssourceid = $_GET["id"];
   
   $newssourcePDO = new NewsSourcePDO();
   $newssource = $newssourcePDO->getNewsSource($newssourceid);
  
	?>
<form action="EditNewsSource.php" method="post">
<input type="hidden" name="newssourceid" value="<?php echo $newssourceid ?>">
<h1>Input NewsSource</h1>
<br>
<input type="text" name="newssourcename" value="<?php echo $newssource->getNewsSourceName() ?>">
<br>
<h1>Input NewsSourceLink</h1>
<br>
<input type="text" name="newssourcelink" value="<?php echo $newssource->getNewsSourceLink() ?>">
<br>

<h1>Input NewsSourceLinkType</h1>
<br>
<input type="text" name="newssourcelinktype" value="<?php echo $newssource->getNewsSourceLinkType() ?>">
<br>
<h1>Submit</h1>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>