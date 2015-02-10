<?php
require('connect.php');
session_start();
$sessionquery = sprintf('SELECT * from crm.users where username = "%s" and password = "%s" limit 0, 1;', $_POST['username'], $_POST['password']);
$res = mysql_query($sessionquery) or die(mysql_error());
$row = mysql_fetch_array($res);
echo $sessionquery;

$num = mysql_num_rows($res);
if($num == '1'){

$_SESSION['username'] = $row['username'];
$_SESSION['agent'] = $row['id'];
$_SESSION['name'] = $row['name'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['pass'] = $row['password'];
$_SESSION['email'] = $row['email'];
$_SESSION['level'] = $row['level'];
$_SESSION['status'] = $row['status'];
$_SESSION['ext'] = $row['ext'];
$_SESSION['datestart'] = $row['datestart'];
$_SESSION['did'] = $row['did'];
$_SESSION['position'] = $row['position'];
$_SESSION['nickname'] = $row['nickname'];
$_SESSION['cardiffpass'] = $row['cardiffpass'];
$_SESSION['vicdial_user'] = $row['vicdial_user'];
$_SESSION['vcc'] = $row['vcc'];
$_SESSION['phonepass'] = $row['phonepass'];

	header('location:./lead.php');
} else {
header("location:./index.php");
}


// echo "<br>". $row['username'] . "<br>" . $row['password'] . "<br>" . $row['vcc'] . "<br>";
// print_r(error_get_last());
?>
