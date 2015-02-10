<?php
require('connect.php');

//Leads + forma > leads
//set agent and status en Leads

$revisarsiexisteenleads = sprintf('SELECT count(*) as noseaverquepedo from crm.leads where leadid = "%s"', mysql_escape_string($_POST['leadid']));
$res = mysql_query($revisarsiexisteenleads) or die(mysql_error());
$row = mysql_fetch_array($res);
if ($row['noseaverquepedo'] == '0'){
echo 'Lead Dispositioned<br>';
$updateOrAddQuery = sprintf('INSERT INTO crm.leads (source, leadid, date, time, company, contact, address, city, state, zip, phone, phone2, fax, email, web, niche, app_product, app_timeframe, app_purpose, app_amount, app_tib, app_lastyear_gas, app_thisyear_ams, agent, status, notes, uccparty, ucctype, uccfiledate, employees, app, taxid, addname01, addtitle01, addhomeaddres01, addcity01, addstate01, addzip01, addhomephone01, addssn01, addownership01, adddatebirth01, addficoscore01, addname02, addtitle02, addhomeaddres02, addcity02, addstate02, addzip02, addhomephone02, addssn02, addownership02, adddatebirth02, addficoscore02, addyearcompany01,  addyearcompany02, receptionist, lenguage, email_receptionist) VALUES ("%s", "%s", curdate(), curtime(), "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', mysql_escape_string($_POST['source']), mysql_escape_string($_POST['leadid']), mysql_escape_string($_POST['company']), mysql_escape_string($_POST['contact']), mysql_escape_string($_POST['address']), mysql_escape_string($_POST['city']), mysql_escape_string($_POST['state']), mysql_escape_string($_POST['zip']), mysql_escape_string($_POST['phone']), mysql_escape_string($_POST['phone2']), mysql_escape_string($_POST['fax']), mysql_escape_string($_POST['email']), mysql_escape_string($_POST['web']), mysql_escape_string($_POST['niche']), mysql_escape_string($_POST['app_product']), mysql_escape_string($_POST['app_timeframe']), mysql_escape_string($_POST['app_purpose']), mysql_escape_string($_POST['app_amount']), mysql_escape_string($_POST['app_tib']), mysql_escape_string($_POST['app_lastyear_gas']), mysql_escape_string($_POST['app_thisyear_ams']), mysql_escape_string($_POST['agent']), mysql_escape_string($_POST['status']), mysql_escape_string($_POST['notes']), mysql_escape_string($_POST['uccparty']), mysql_escape_string($_POST['ucctype']), mysql_escape_string($_POST['uccfiledate']), mysql_escape_string($_POST['employees']), mysql_escape_string($_POST['app']), mysql_escape_string($_POST['taxid']), mysql_escape_string($_POST['addname01']), mysql_escape_string($_POST['addtitle01']), mysql_escape_string($_POST['addhomeaddres01']), mysql_escape_string($_POST['addcity01']), mysql_escape_string($_POST['addstate01']), mysql_escape_string($_POST['addzip01']), mysql_escape_string($_POST['addhomephone01']), mysql_escape_string($_POST['addssn01']), mysql_escape_string($_POST['addownership01']), mysql_escape_string($_POST['adddatebirth01']), mysql_escape_string($_POST['addficoscore01']), mysql_escape_string($_POST['addname02']), mysql_escape_string($_POST['addtitle02']), mysql_escape_string($_POST['addhomeaddres02']), mysql_escape_string($_POST['addcity02']), mysql_escape_string($_POST['addstate02']), mysql_escape_string($_POST['addzip02']), mysql_escape_string($_POST['addhomephone02']), mysql_escape_string($_POST['addssn02']), mysql_escape_string($_POST['addownership02']), mysql_escape_string($_POST['adddatebirth02']), mysql_escape_string($_POST['addficoscore02']), mysql_escape_string($_POST['addyearcompany01']), mysql_escape_string($_POST['addyearcompany02']), mysql_escape_string($_POST['receptionist']), mysql_escape_string($_POST['lenguage']), mysql_escape_string($_POST['email_receptionist']));
} else {
	echo 'Lead Updated<br>';
		$updateOrAddQuery = sprintf('UPDATE crm.leads SET source = "%s", leadid = "%s", date = curdate(), time = curtime(), company = "%s", contact = "%s", address = "%s", city = "%s", state = "%s", zip = "%s", phone = "%s", phone2 = "%s", fax = "%s", email = "%s", web = "%s", niche = "%s", app_product = "%s", app_timeframe = "%s", app_purpose = "%s", app_amount = "%s", app_tib = "%s", app_lastyear_gas = "%s", app_thisyear_ams = "%s", agent = "%s", status = "%s", notes = "%s", uccparty = "%s", ucctype = "%s", uccfiledate = "%s", employees = "%s", app = "%s", taxid = "%s", addname01 = "%s", addtitle01 = "%s", addhomeaddres01 = "%s", addcity01 = "%s", addstate01 = "%s", addzip01 = "%s", addhomephone01 = "%s", addssn01 = "%s", addownership01 = "%s", adddatebirth01 = "%s", addficoscore01 = "%s", addname02 = "%s", addtitle02 = "%s", addhomeaddres02 = "%s", addcity02 = "%s", addstate02 = "%s", addzip02 = "%s", addhomephone02 = "%s", addssn02 = "%s", addownership02 = "%s", adddatebirth02 = "%s", addficoscore02 = "%s", addyearcompany01 = "%s",  addyearcompany02 = "%s", receptionist = "%s", lenguage = "%s", email_receptionist = "%s" where leadid = "%s"', mysql_escape_string($_POST['source']), mysql_escape_string($_POST['leadid']), mysql_escape_string($_POST['company']), mysql_escape_string($_POST['contact']), mysql_escape_string($_POST['address']), mysql_escape_string($_POST['city']), mysql_escape_string($_POST['state']), mysql_escape_string($_POST['zip']), mysql_escape_string($_POST['phone']), mysql_escape_string($_POST['phone2']), mysql_escape_string($_POST['fax']), mysql_escape_string($_POST['email']), mysql_escape_string($_POST['web']), mysql_escape_string($_POST['niche']), mysql_escape_string($_POST['app_product']), mysql_escape_string($_POST['app_timeframe']), mysql_escape_string($_POST['app_purpose']), mysql_escape_string($_POST['app_amount']), mysql_escape_string($_POST['app_tib']), mysql_escape_string($_POST['app_lastyear_gas']), mysql_escape_string($_POST['app_thisyear_ams']), mysql_escape_string($_POST['agent']), mysql_escape_string($_POST['status']), mysql_escape_string($_POST['notes']), mysql_escape_string($_POST['uccparty']), mysql_escape_string($_POST['ucctype']), mysql_escape_string($_POST['uccfiledate']), mysql_escape_string($_POST['employees']), mysql_escape_string($_POST['app']), mysql_escape_string($_POST['taxid']), mysql_escape_string($_POST['addname01']), mysql_escape_string($_POST['addtitle01']), mysql_escape_string($_POST['addhomeaddres01']), mysql_escape_string($_POST['addcity01']), mysql_escape_string($_POST['addstate01']), mysql_escape_string($_POST['addzip01']), mysql_escape_string($_POST['addhomephone01']), mysql_escape_string($_POST['addssn01']), mysql_escape_string($_POST['addownership01']), mysql_escape_string($_POST['adddatebirth01']), mysql_escape_string($_POST['addficoscore01']), mysql_escape_string($_POST['addname02']), mysql_escape_string($_POST['addtitle02']), mysql_escape_string($_POST['addhomeaddres02']), mysql_escape_string($_POST['addcity02']), mysql_escape_string($_POST['addstate02']), mysql_escape_string($_POST['addzip02']), mysql_escape_string($_POST['addhomephone02']), mysql_escape_string($_POST['addssn02']), mysql_escape_string($_POST['addownership02']), mysql_escape_string($_POST['adddatebirth02']), mysql_escape_string($_POST['addficoscore02']), mysql_escape_string($_POST['addyearcompany01']), mysql_escape_string($_POST['addyearcompany02']), mysql_escape_string($_POST['receptionist']), mysql_escape_string($_POST['lenguage']), mysql_escape_string($_POST['email_receptionist']), mysql_escape_string($_POST['leadid']));
}
mysql_query($updateOrAddQuery);
// echo $updateOrAddQuery;
// die();
$updateLeadsQuery = sprintf('UPDATE crm.Leads SET callstatus = "1", agent = "%s" WHERE leadid = "%s";', mysql_escape_string($_POST['agent']), mysql_escape_string($_POST['leadid']));
mysql_query($updateLeadsQuery);

$idquery = sprintf('SELECT id as cardiffid from crm.leads where leadid = "%s" order by date desc, time desc limit 0, 1', mysql_escape_string($_POST['leadid']));
$idres = mysql_query($idquery);
$idrow = mysql_fetch_array($idres);
$cardiffid = $idrow['cardiffid'];

?>
<div>
	<form id='setcallback'>
	<h4>Set as a Callback? (CardiffID: <?php echo $cardiffid ?>, LeadID: <?php echo mysql_escape_string($_POST['leadid']); ?> )</h4>
	<label for='date' class="tres lh label">Date:</label><br>
	<input type="date" name="date" id="dispodate" min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>"><br>
	<label for='time' class="tres lh label">Time:</label><br>
	<input type="time" name="time" id="dispotime" value="<?php echo date('H:m:s') ?>">

	<input type="hidden" placeholder="cardiffid" name="cardiffid" value="<?php echo $cardiffid ;?>">
	<input type="hidden" placeholder="agent" name="agent" value="<?php echo mysql_escape_string($_POST['agent']) ;?>">
	<input type="hidden" placeholder="status" name="status" value="<?php echo $_POST['status'];?>">
					<select name="status" class="fullw fullh" id="status">
					<option value="BUSY">Busy Line</option>
					<option value="DISCONNECTED">Disconnected Line</option>
					<option value="VOICEMAIL">Voice Mail</option>
					<option value="NO_ANSWER">No Answer</option>
					<option value="FAX">Fax Machine</option>
					<option value="GATEKEEPER">Gatekeeper</option>
					<option value="NOT_INTERESTED">Not Interested</option>
					<option value="OUT_OF_BUSINESS">Out of Business</option>
					<option value="Incomplete Submission Lead">Incomplete Submission Lead</option>
					<option value="App Out">App Out</option>
					<option value="App In">App In</option>
					<option value="Complete Submission Lead">Complete Submission Lead</option>
					<option value="Declined">Declined</option>
					<option value="In Funding">In Funding</option>
					<option value="Funded">Funded</option>
				</select>
	<input type="hidden" placeholder="leadid" name="leadid" value="<?php echo mysql_escape_string($_POST['leadid']) ;?>">

	<input type="button" id="nocallback" value="No (Go to a new lead)">
	<input type="button" id="yescallback" value="Yes (Set as callback and go to a new lead)">
		<script>
		$('#nocallback').on('click', function(event) {
			$('#lightbox').fadeOut('slow');
		window.location.href = "./lead.php";
;});
		$('#yescallback').on('click', function(event) {
			callbackinfo = $('#setcallback').serialize();
			$.post('./setcallback.php', callbackinfo, function(data) {
				$('#lbcontent').html( data );
			});
		});
		</script>
	</form>
</div>