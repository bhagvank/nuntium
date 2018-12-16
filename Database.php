<?php
require_once("UserPDO.php");

$userPDO = new UserPDO();
$maxuserid = $userPDO->getMaxUserId();

echo "Max User Id " . $maxuserid;

?>