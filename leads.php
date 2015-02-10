<?php require('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LEADS.PHP</title>
	<script src="jquery/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="layout.css">
</head>
<body>
<table id="callsmain" cellspacing="0">
	<tr>
		<td id="toolbar"><?php require('toolbar.php');?></td>
	</tr>
	<tr>
		<td id="callstable" >
		<table cellspacing="0">
						<tr id="encabezado">
				<td>Date / Time</td>
				<td>LeadID</td>
				<td>Company</td>
				<td>Phone</td>
				<td>Status</td>
			</tr>
	<?php 

$query = sprintf('SELECT * FROM crm.callbacks_cardiff WHERE agent = "%s" order by date desc, time desc', $agent);
$res = mysql_query($query) or die(mysql_error());
// echo $query;
		while($row = mysql_fetch_array($res)){
			$eachquery = sprintf('SELECT name, phone from crm.Leads where leadid = "%s"', $row['leadid']);
			$eachleadres = mysql_query($eachquery);
			$eachrow = mysql_fetch_array($eachleadres);
		echo '<tr>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['date'] . " / " . $row['time'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['leadid'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $eachrow['name'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $eachrow['phone'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['status'] .'</a></td>'.
			'</tr>';
	}


	print_r(error_get_last());
	?>
		</table>
		</td>
	</tr>
</table>
	<div id="hbbutton">
<div id="hamburgerin">&#8801;</div>
  
<div id="hbtext">
    <a href="lead.php">Dialer</a>
    <a href="calls.php">Calls</a>
    <a href="callbacks.php">Callbacks</a>
    <a href="leads.php">Leads</a>
 </div>
</div>
</body>
  <script type="text/javascript" src="js.js"></script>
</html>