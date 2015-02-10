<?php require('connect.php');

$phone = $_GET['phone'];

$phone = str_ireplace('-', '', $phone);
$phone = str_ireplace('(', '', $phone);
$phone = str_ireplace(')', '', $phone);
$phone = str_ireplace(' ', '', $phone);

$phoneformatted = '.*';
$phoneformatted .= substr($phone, 0, 3).'.*';
$phoneformatted .= substr($phone, 3, 3).'.*';
$phoneformatted .= substr($phone, 6, 4).'.*';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="layout.css">
	<link rel="stylesheet" href="joshua.css">
</head>
<body>
	<table id="searchmaintable">
		<tr>
			<td id="toolbar"><?php require('toolbar.php');?></td>
		</tr>
		<tr id="spacer">
		<td></td>
		</tr>
		<tr id="searchresults">
			<td>

			<table id="searchtable" cellspacing="0">
				<tr>
					<td>Company</td>
					<td>Contact</td>
					<td>Phone</td>
					<td>Date Dispo'd</td>
					<td>Agent</td>
				</tr>

			<?php 


$searchquery = sprintf('SELECT a.*, b.name from crm.leads a, crm.users b where phone regexp "%s" and a.agent = b.id;',  $phoneformatted);
$resres = mysql_query($searchquery);
while($resrow = mysql_fetch_array($resres)){
	echo '<tr>'.
	'<td><a href="./lead.php?e=1&leadid='.$resrow['leadid'].'">'.$resrow['company'].'</td>'.
	'<td><a href="./lead.php?e=1&leadid='.$resrow['leadid'].'">'.$resrow['contact'].'</td>'.
	'<td><a href="./lead.php?e=1&leadid='.$resrow['leadid'].'">'.$resrow['phone'].'</td>'.
	'<td><a href="./lead.php?e=1&leadid='.$resrow['leadid'].'">'.$resrow['date'].'</td>'.
	'<td><a href="./lead.php?e=1&leadid='.$resrow['leadid'].'">'.$resrow['name'].'</td>'.
	'</tr>';
}
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

<div id="lightbox">
  <div id="lbcontent">
    <div id="closelb">X</div>
    <div id="lbhtml"></div>
  </div>  
</div>

</body>
      <script type="text/javascript" src="js.js"></script>

</html>