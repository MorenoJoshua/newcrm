<?php
require('connect.php');
$phones = $phone;
if($phone2 != ''){				//si phone2 esta definido, hace una busqueda en el campo recordingfile por cualquiera de los 2 telefonos
	$phones .= '|'.$phone2;		//si no, solo busca con el primero numero
}

$phones = str_ireplace('-', '', $phones);
$query = sprintf('SELECT * from asteriskcdrdb.cdr where recordingfile regexp "%s"', $phones);
$callsres = mysql_query($query);

?>

<table id="callstable">
	<tr>
		<td>In/Out</td>
		<td>Date</td>
		<td>Destination</td>
		<td>Duration</td>
		<td>Play</td>
	</tr>

<?php 
while($row = mysql_fetch_array($callsres)){
	$inoutpreclean = $row['recordingfile'];
	$inout = strtok($inoutpreclean, '-');

$playurl = substr($row['calldate'], 0, 4) . '/' . 
substr($row['calldate'], 5, 2) . '/' .
substr($row['calldate'], 8, 2) . '/';

	echo '<tr>'.
			'<td>'.$inout.'</td>'.
			'<td>'.$row['calldate'].'</td>'.
			'<td>'.$row['dst'].'</td>'.
			'<td>'.$row['billsec'].'</td>'.
			'<td onclick="playfile('."'".
				$playurl.$row['recordingfile'].
				"'".')">Play file</td>'.
			'</tr>';
};
?>
<tr>
	<td colspan="5" id="playhere"></td>
</tr>
</table>
