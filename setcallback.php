<?php
require('connect.php');
$query = sprintf('INSERT INTO crm.callbacks (`lead`, `date`, `time`, `agent`, `status`, `dateset`, `timeset`, `leadid`, `active`) 
	VALUES ("%s", "%s", "%s", "%s", "pending", curdate(), curtime(), "%s", "1");', 
	$_POST['cardiffid'], $_POST['date'], $_POST['time'], $_POST['agent'], $_POST['leadid']);
// echo $query;
mysql_query($query);

?>



<div id='callbackset'>Callback Set!<br><br>
CardiffID: <?php echo $_POST['cardiffid']?><br>
LeadID: <?php echo $_POST['leadid']?><br>
On: <?php echo $_POST['date']?> / <?php echo $_POST['time']?><br>
By: <?php echo $_POST['agent']?><br>
With status: <?php echo $_POST['status']?><br>
</div>
<script>
	$('#callbackset').on('click', function(event) {
		$('#lightbox').fadeOut('slow');
		window.location.href = "./lead.php";
	});
</script>