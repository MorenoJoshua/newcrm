<?php
// Swift Mailer Library
require_once 'connect.php';
// die();
// echo $_POST['type'];

// print_r($_POST);
// die();

	$query = sprintf('SELECT curtime() as time, a.* from crm.users a where id = %s limit 0, 1;', $agent);
	$res = mysql_query($query);
	$row = mysql_fetch_array($res);
	$sendername = $row['nickname'];
	$leadid = $_POST['leadid'];
	$fax = $_POST['fax'];

$queryX = sprintf('SELECT * from crm.users where id = "%s"', $agent);
$resX = mysql_query($queryX);
$row = mysql_fetch_array($resX);

$agentnameX = $row['nickname'];
$extX = $row['ext'];
$agentpositionX = $row['position'];
$agentphoneX = $row['did'];

// $loanfor = $_POST['app_amount'];
$app_amount = $_POST['app_amount'];
// $contact = strtok($_POST['contact'], ' ');
$contact = strtok('Joshua Moreno', ' ');
// $loanfor = $_POST['app_amount'];


if ($_POST['app_product'] == 'Capital' AND $_POST['type'] == 'sendfax') {	//Working capital
		// require('sendapps/wc_fax.php');
		echo 'capital fax';
	}

if ($_POST['app_product'] == 'Capital' AND $_POST['type'] == 'email') {	//Working capital
		echo 'capital email';
		require('apps/wc_email.php');
	}

if ($_POST['app_product'] == 'Equipment' AND $_POST['type'] == 'sendfax') {	//Working capital
		// require('sendapps/eq_fax.php');
		echo 'equipment fax';
	}

if ($_POST['app_product'] == 'Equipment' AND $_POST['type'] == 'email') {	//Working capital
		// require('sendapps/eq_email.php');
		echo 'equipment email';
	}

if ($_POST['app_product'] == 'Both' AND $_POST['type'] == 'email') {	//Both email
		// require('sendapps/both_email.php');
		echo 'both email';
	}

if ($_POST['app_product'] == 'Both' AND $_POST['type'] == 'sendfax') {	//Both fax
		// require('sendapps/both_fax.php');
		echo 'both fax';
	}

?>