<?php
$usr = 'root';$pwd = 'espada98';$db = 'asteriskcdrdb';$tbl = 'cdr';
$connect = mysql_connect('localhost', $usr, $pwd) or die(mysql_error());

session_start();
    $agent = $_SESSION['agent'];
    $username = $_SESSION['username'];
    $ext = $_SESSION['ext'];
    $agentname = $_SESSION['name'] . " " . $_SESSION['lastname'];
    $agentemail = $_SESSION['email'];
    $cardiffpass = $_SESSION['cardiffpass'];
    $agentlevel = $_SESSION['level'];
    $agentstatus = $_SESSION['status'];
    $agentdid = $_SESSION['did'];
    $agentposition = $_SESSION['position'];
    $agentnickname = $_SESSION['nickname'];
    $key = $_SESSION['nickname'];

if($_SESSION['username'] == ''){
	echo 'nosession <br>';
	header('location:./index.php');
}
?>