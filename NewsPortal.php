<?PHP
require_once("myRSSParser.php");


	  include "menu.php";

function http_get_contents($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_TIMEOUT, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  if(FALSE === ($retval = curl_exec($ch))) {
    error_log(curl_error($ch));
  } else {
    return $retval;
  }
}

$date = $_GET["date"];
echo $date . "<br>\n";

$url = $_GET["source"];
echo $url. "<br>\n";

getNewsByDate($date,$url);

function getNewsByDate($date,$BLOGURL)
{
 
  $NUMITEMS = 100;
  $TIMEFORMAT = "j F Y, g:ia";
  $CACHE = "/tmp/" . md5($BLOGURL);
  $TIME = 4;



 if(!file_exists($CACHE) || ((time() - filemtime($CACHEFILE)) > 3600 * $CACHETIME))
{
   if($feed_content = http_get_contents($BLOGURL))
    {
        $feed = fopen($CACHE,"w'");
		fwrite($feed,$feed_content);
		fclose($feed);
    }

}


$rssParser = new myRSSParser($CACHE);

$feeddata = $rssParser->getRawOutput();

extract($feeddata['RSS']['CHANNEL'][0],EXTR_PREFIX_ALL, 'rss');

echo htmlspecialchars($rss_TITLE) . "<br> \n";

$count=0;

foreach($rss_ITEM as $itemdata)
{
	$pubdate = $itemdata['PUBDATE'];
	
	if(strpos($pubdate,$date) !== false)
	{
	echo  $itemdata['LINK'] . " " . $itemdata['DESCRIPTION'] . " " . $itemdata['PUBDATE'] . "<br>\n";
    }
	if(++$count >= $NUMITEMS) break;
}
  	
	
}
 

?>
