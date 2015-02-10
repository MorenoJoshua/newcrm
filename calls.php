<?php require('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CALLS.PHP</title>
	<script src="jquery/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="layout.css">
</head>
<body>
<table id="callsmain">
	<tr>
		<td id="toolbar"><?php require('toolbar.php');?></td>
	</tr>
	<tr>
		<td id="callstable">
		<table cellspacing="0">
						<tr id="encabezado">
				<td>No</td>
				<td>Date/Time</td>
				<td>Company</td>
				<td>Contact</td>
				<td>Leadid</td>
				<td>Cardiffid</td>
				<td>Destination</td>
				<td>Source</td>
				<td>Duration</td>
				<td>Disposition</td>
			</tr>

						<?php

$timecondition = '';
	 
$eachCBquery = sprintf('SELECT * from crm.cdr where agent = "%s" %s order by calldate desc limit 0, 100', $agent, $timecondition);
// $eachCBquery = sprintf('SELECT * from crm.cdr where agent = "%s" and calldate regexp curdate() order by calldate desc', $agent);
$eachCBres = mysql_query($eachCBquery) or die(mysql_error());
		$i = 0;

	while($leadFromCBID = mysql_fetch_array($eachCBres)){
		while($row = mysql_fetch_array($eachCBres)){
			$infoquery = sprintf('SELECT company, contact from crm.leads where id = "%s" limit 0, 1', $row['lead']);
			$infores = mysql_query($infoquery);
			$inforow = mysql_fetch_array($infores);
		$i++;
		echo '<tr>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $i .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['calldate'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $inforow['company'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $inforow['contact'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['leadid'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['lead'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['dst'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['src'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. secsToTime($row['billsec']) .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $row['disposition'] .'</a></td>'.
			'</tr>';
		}
	}
	// print_r(error_get_last());
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