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
// echo $credentialsquery;
$credentialsres = mysql_query($credentialsquery);
$credentialsrow = mysql_fetch_array($credentialsres);
$sender = $credentialsrow['email_cardiff'];
$cardiffpass = $credentialsrow['cardiffpass'];

$emailout = $credentialsrow['email_cardiff'];
$passwordout = $credentialsrow['cardiffpass'];
$nameout = $credentialsrow['name'];

$emailto = $recieverrow['email'];
$nameto = $recieverrow['contact'];

// echo $emailto;
// echo $nameto;
// die();

$cmd = sprintf('rm -f "/var/www/html/WIP/apps/WC_test.pdf"');
		exec($cmd);
		echo $cmd;
		$cmd = sprintf('/usr/local/bin/wkhtmltopdf --zoom 0.9 -B 0mm -L 0mm -R 0mm -T 0mm -s Letter --enable-forms "http://127.0.0.1/WIP/apps/eqapp/index.php" "/var/www/html/WIP/apps/WC_test.pdf"');
		exec($cmd);
		echo $cmd;
		$apppath = sprintf('/var/www/html/WIP/apps/WC_test.pdf');
		// Attach it to the message

$subject = sprintf('Bank of Cardiff Loan Application for %s', $recieverrow['app_amount']);

$body = sprintf('<pre style=\'font-family:Verdana\'>
	<p>%s,

	It was a pleasure speaking with you today about your interest in a working capital loan of %s.

	Bank of Cardiff is the nation\'s premier small-business lender. While other banks aren\'t lending, Bank of Cardiff approves 90%% of all Working Capital loan applications.

	Per our conversation, we\'ll need the following six items to process your application: 

	1. Most recent six months business bank statements. Please include all pages of each statement.
	2. Most recent four months credit card processing statements. Please include all pages of each statement. (If you do not accept credit cards, please disregard).
	3. Please complete and sign the included Working Capital Application.
	4. Please include the first two pages of your 2013 Business Tax Return and the K1 section
	5. Voided check
	6. Driver’s License

	Please fax the above referenced items to our toll-free fax number: 855-599-5556 or email to credit@cardiffbank.com

	Upon receipt, I\'ll make sure to reach out via phone or email to confirm that your application is in process with Underwriting. Most applications can be decisioned same day.

	If you have any questions or concerns in the meantime, feel free to call me at 888-296-1071 ext: %s. 



	<b>%s</b>
	%s
	Toll-Free:	888-296-1071 ext. $s
	Direct:	%s
	Fax:		855-599-5556
	http://www.cardiffbank.com

	Equipment Financing Apply here:
	http://cardiffbank.com/apply/

	Bank of Cardiff - Corporate Overview Video: http://youtu.be/8v8LIhMH_Os', 
strtok($recieverrow['contact'], ' '),
$recieverrow['app_amount'],
$credentialsrow['ext'],
$credentialsrow['nickname'],
$credentialsrow['position'],
$credentialsrow['ext'],
$credentialsrow['did']);


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
