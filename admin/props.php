<?php
require_once "../config.php";
require_once "../includes/header.php";

// only allow access by admins
if($USER->getProp('permissions.admin') != "true"){
	writeToLog('warning','adminpage','accessdenied');
	echo getString ("warning.accessdenied");
	die;
}

include_once('../includes/menu-admin.php');

echo "<br><pre>";
print_r($CONFIG->props);
echo "</pre>";
include_once "../includes/footer.php";