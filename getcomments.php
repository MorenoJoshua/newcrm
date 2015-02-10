<?php
require('connect.php');

$cualeselleadoriginalquery = sprintf('SELECT leadsourceid from crm.Leads where leadid = "%s"', $leadid);
$cualeselleadoriginalres = mysql_query($cualeselleadoriginalquery);
$leadoriginalrow = mysql_fetch_array($cualeselleadoriginalres);
$leadsourceid = $leadoriginalrow['leadsourceid'];
$query = sprintf('SELECT * from crm.leads_notes where leadid = "%s" order by date desc, time desc', $leadsourceid);
$res = mysql_query($query);
?>

<table id="comments">
	<tr id="commentbox">
		<td>
		<form id="postcomment">
			<input type="hidden" placeholder="leadsourceid" name="leadsourceid" value="<?php echo $leadsourceid ?>">
			<input type="textarea" name="note" placeholder="Comment here" value='' required>
			<input type="hidden" placeholder="agentname" name="name" value="<?php echo $agentname ?>">
			<input type="hidden" placeholder="status" name="status" value="<?php echo $status ?>">
			<input type="hidden" placeholder="typecomment" name="typecomment" value="1">
			<input type="hidden" placeholder="idsubcomment" name="idsubcomment" value="<?php echo $idsubomment ?>">
			<input type="hidden" placeholder="agent" name="agent" value="<?php echo $agent ?>">
			<input type="button" value="Save new comment" id="addcomment">
		</form>
</td>
	</tr>
<?php while($row = mysql_fetch_array($res)) {
echo
	'<tr>'.
	 '<td class="comment" colspan="4"><b>'. $row['user'] .' says</b>:<br>&nbsp;&nbsp;'. $row['note'] . '<br>On: '. $row['date'] . '  ' . $row['time'] . '</td>'.
	 '</tr>';
};
?>
</table>
