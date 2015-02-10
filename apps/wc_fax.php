<?php

//Revisar si se manda un no de agente, y un leadid, si no (existen), regresa un error
if(!$_GET['leadid']){$checkerror = 'no lead '; $check = '1';}
if(!$_GET['agent']){$checkerror .= 'no agent'; $check = '1';}
if($check == '1'){echo 'There was an error:' . $checkerror; die();}

$usr = 'root';$pwd = 'espada98';$db = 'asteriskcdrdb';$tbl = 'cdr';
$connect = mysql_connect('localhost', $usr, $pwd) or die(mysql_error());

//Query para informacion de lead
$recieverquery = sprintf('SELECT * from crm.leads where leadid = "%s" order by id desc;', $_GET['leadid']);
$recieverres = mysql_query($recieverquery);
$recieverrow = mysql_fetch_array($recieverres);

//Query para desde que correo se envia
$credentialsquery = sprintf('SELECT * from crm.users where id = "%s" limit 0, 1;', $_GET['agent']);

$credentialsres = mysql_query($credentialsquery);
$credentialsrow = mysql_fetch_array($credentialsres);
$sender = $credentialsrow['email_cardiff'];
$cardiffpass = $credentialsrow['cardiffpass'];

$emailout = $credentialsrow['email_cardiff'];
$passwordout = $credentialsrow['cardiffpass'];
$nameout = $credentialsrow['name'];

$emailto = $recieverrow['fax'].'@faxage.com';
$nameto = $recieverrow['contact'];


$cmd = sprintf('rm -f "/var/www/html/WIP/apps/WC_test.pdf"');
		exec($cmd);
		echo $cmd;
		$cmd = sprintf('/usr/local/bin/wkhtmltopdf --zoom 0.9 -B 0mm -L 0mm -R 0mm -T 0mm -s Letter --enable-forms "http://127.0.0.1/WIP/apps/eqapp/index.php" "/var/www/html/WIP/apps/WC_test.pdf"');
		exec($cmd);
		echo $cmd;
		$apppath = sprintf('/var/www/html/WIP/apps/WC_test.pdf');
		// Attach it to the message

$subject = sprintf('CustID!%s', $recieverrow['agent']);

$body = sprintf('');

// Swift Mailer Library
require_once 'lib/swift_required.php';

// Mail Transport
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername($emailout) // Your Gmail Username
    ->setPassword($passwordout); // Your Gmail Password

// Mailer
$mailer = Swift_Mailer::newInstance($transport);

$attachment = Swift_Attachment::fromPath($apppath);
// Create a message

$message = Swift_Message::newInstance($subject)
    ->setFrom(array($emailout => $nameout)) // can be $_POST['email'] etc...
    ->setTo(array($emailto => $nameto)) // your email / multiple supported.
    ->setBody($body, 'text/html')//;
	->attach($attachment);

// Send the message
if ($mailer->send($message)) {
    echo 'Mail sent successfully.';
} else {
    echo 'I am sure, your configuration are not correct. :(';
}

		?>
