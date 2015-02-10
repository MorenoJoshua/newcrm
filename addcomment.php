<?php
require('connect.php');
$query = sprintf('INSERT INTO crm.leads_notes (`leadid`, `note`, `date`, `time`, `user`, `status`, `typecomment`, `idsubcommet`, `iduser`) 
	VALUES ("%s", "%s", curdate(), curtime(), "%s", "%s", "%s", "%s", "%s")', 
	$_POST['leadsourceid'], $_POST['note'], $_POST['name'], $_POST['status'], $_POST['typecomment'], $_POST['idsubcommet'], $agent);
mysql_query($query);
    echo '<td colspan="4"><b>'. 
    $_POST['name'] .
    ' says:</b> '.
    $_POST['note'].
    '</td>';
?>
