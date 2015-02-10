<?php require('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CALLBACKS.PHP</title>
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
		<table  cellspacing="0">
			<tr id="encabezado">
				<td>No</td>
				<td>Company</td>
				<td>Contact</td>
				<td>Date/Time</td>
				<td>SSN</td>
				<td>Phone</td>
				<td></td>
			</tr>
<?php 

$timecondition = '>= curdate()';
$eachCBquery = sprintf('SELECT leadid, date, time FROM crm.callbacks 
WHERE agent = "%s" 
and date %s
AND active = 1 
group by leadid 
order by date 
asc, time asc;', $agent, $timecondition);

$eachCBres = mysql_query($eachCBquery) or die(mysql_error());
		$i = 0;
		function ifemptyechonone($xcheckx){
			if($xcheckx == '' OR !$xcheckx){
			return "None";
		} else {
			return $xcheckx;
		}
	}

	while($leadFromCBID = mysql_fetch_array($eachCBres)){
		$leadid = $leadFromCBID['leadid'];
		$eachquery = sprintf('SELECT id, leadid, company, contact, date, time, addssn01, phone from crm.leads where leadid = "%s" group by company order by id desc, date asc, time asc', $leadid);
		$eachLeadRes = mysql_query($eachquery);
		while($row = mysql_fetch_array($eachLeadRes)){
			$i  = $i + 1;
		echo '<tr id="'. $leadid .'">'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. $i .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. ifemptyechonone($row['company']) .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. ifemptyechonone($row['contact']) .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. ifemptyechonone($leadFromCBID['date']) . ' \ ' . $leadFromCBID['time'] .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. ifemptyechonone($row['addssn01']) .'</a></td>'.
				'<td><a href="lead.php?e=1&leadid='. $row['leadid'] .'">'. ifemptyechonone($row['phone']) .'</a></td>'.
				'<td class="clicktodelete">X</td>'.
			'</tr>';
		}
	} ?>
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