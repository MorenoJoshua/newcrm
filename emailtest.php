<?php
//Revisar si se manda un no de agente, y un leadid, si no (existen), regresa un error
// if(!$_GET['leadid']){$checkerror = 'no lead '; $check = '1';}
// if(!$_GET['agent']){$checkerror .= 'no agent'; $check = '1';}
// if($check == '1'){echo 'There was an error:' . $checkerror; die();}

echo "now";

die();
$usr = 'root';$pwd = 'espada98';$db = 'asteriskcdrdb';$tbl = 'cdr';
$connect = mysql_connect('localhost', $usr, $pwd) or die(mysql_error());


//Query para desde que correo se envia
$credentialsquery = sprintf('SELECT * from crm.users where id = "%s" limit 0, 1;', $_GET['agent']);
echo $credentialsquery;
$credentialsres = mysql_query($credentialsquery);
$credentialsrow = mysql_fetch_array($credentialsres);

//Query para informacion de lead
$recieverquery = sprintf('SELECT * from crm.leads where leadid = "%s" order by id desc;', $_GET['leadid']);
$recieverres = mysql_query($recieverquery);
$recieverrow = mysql_fetch_array($recieverres);

$emailout = $credentialsrow['email_cardiff'];
$passwordout = $credentialsrow['cardiffpass'];
print_r(error_get_last());


	$sender = $emailout;
	$cardiffpass = $passwordout;

		$reciever = $recieverrow['email'];
		$recievername = strtok($recieverrow['Contact'], ' ');


		$cmd = sprintf('rm "/var/www/html/layout/generatedapps/WC_'.addslashes($_POST['contact']).'.pdf"');
		exec($cmd);

		echo $cmd.'<br>';
		

		$pdfpath = sprintf('/var/www/html/layout/generatedapps/WC_'.addslashes($_POST['contact']).'.pdf');

		$cmd = sprintf('/usr/local/bin/wkhtmltopdf --zoom 0.9 -B 0mm -L 0mm -R 0mm -T 0mm -s Letter --enable-forms '.
		'"http://127.0.0.1/layout/apps/wcapp/index.php?'.		# WC APP Fax/Email
			'" "/var/www/html/layout/generatedapps/WC_'.addslashes($_POST['contact']).'.pdf"', $pdfpath);
		exec($cmd);

		echo $cmd.'<br>';

		require_once 'lib/swift_required.php';

		$apppath = sprintf('/var/www/html/layout/generatedapps/WC_'.addslashes($_POST['contact']).'.pdf');


		$attachment = Swift_Attachment::fromPath($apppath);
		// Attach it to the message
		// Mail Transport
		$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
		    ->setUsername($sender) // Your Gmail Username
		    ->setPassword($cardiffpass); // Your Gmail Password

		// Mailer
		$mailer = Swift_Mailer::newInstance($transport);

		// Create a message
		$message = Swift_Message::newInstance('xxxxxxxxxxxxxx')
		    ->setFrom(array($sender => $sender)) // can be $_POST['email'] etc...
		    ->setTo(array($reciever => $recievername)) // your email / multiple supported.
		    ->setBody('xxxxxxxxxxx', 'text/html')//;
			->attach($attachment);
		// Send the message

			print_r(error_get_last());

		if ($mailer->send($message)) {
			echo "ok";	
		    echo 'Mail sent successfully.';

		} else {
		    echo 'I am sure, your configuration are not correct. :(';
		}

		?>
