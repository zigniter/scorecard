<?php
require_once "../config.php";
require_once "../includes/header.php";

// only allow access by admins
if($USER->getProp('permissions.admin') != "true"){
	writeToLog('warning','adminpage','accessdenied');
	echo getString ("warning.accessdenied");
	die;
}

$nodays = optional_param("nodays",31,PARAM_INT);
$limit = optional_param("limit",50,PARAM_INT);
$type = optional_param("type",'all',PARAM_TEXT);
$admin  = new Admin();
$errors = $admin->log($type,$nodays,$limit);

include_once('../includes/menu-admin.php');

?>

<p>
Show:
<a href="?type=all">All</a>
<a href="?type=error">Errors</a>
<a href="?type=info">Info</a>
<a href="?type=warning">Warning</a>
</p>
<table class="admin">
		<tr>
			<th>Date</th>
			<th>Level</th>
			<th>Type</th>
			<th>Message</th>
			<th>IP</th>
			<th>PHP time</th>
			<th>No queries</th>
			<th>MySQL time</th>
			<th>Agent</th>
		</tr>
		<?php 
			foreach ($errors as $e){
				echo "<tr class='n'>";
				echo "<td nowrap>".$e->logtime."</td>";
				echo "<td nowrap>".$e->loglevel."</td>";
				echo "<td nowrap>".$e->logtype."</td>";
				echo "<td>".$e->logmsg."</td>";
				echo "<td nowrap>".$e->logip."</td>";
				echo "<td nowrap>".$e->logpagephptime."</td>";
				echo "<td nowrap>".$e->logpagequeries."</td>";
				echo "<td nowrap>".$e->logpagemysqltime."</td>";
				echo "<td>".$e->logagent."</td>";
				echo "</tr>";
			}
		?>
</table>

<?php 
include_once "../includes/footer.php";
?>