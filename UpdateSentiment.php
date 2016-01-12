<!DOCTYPE html>
<html>
	<head>
		<meta content="noindex, nofollow" name="robots">
 <link rel="stylesheet" type="text/css" href="menu.css">

<title>News Portal - Update Sentiment</title>
	</head>
<body>
	<?php
	  include "menu.php";
	  require_once("SentimentPDO.php");
   require_once("Sentiment.php");
   $sentimentid = $_GET["id"];
   
   $sentimentPDO = new SentimentPDO();
   $sentiment = $sentimentPDO->getSentiment($sentimentid);
  
	?>
<form action="EditSentiment.php" method="post">
<input type="hidden" name="sentimentid" value="<?php echo $sentimentid ?>">
<h1>Input Sentiment Source</h1>
<br>
<input type="text" name="sentimentsourcename" value="<?php echo $sentiment->getSentimentSourceName() ?>">
<br>
<h1>Input Sentiment SourceLink</h1>
<br>
<input type="text" name="sentimentsourcelink" value="<?php echo $sentiment->getSentimentSourceLink() ?>">
<br>

<h1>Input Sentiment Source Link Type</h1>
<br>
<input type="text" name="sentimentsourcelinktype" value="<?php echo $sentiment->getSentimentSourceLinkType() ?>">
<br>
<h1>Submit</h1>
<input type="submit" name="submit" value="submit">

</form>

</body>
</html>