<?php


if(!$_GET['agent']){echo 'error'; die();}
$usr = 'root';$pwd = 'espada98';$db = 'asteriskcdrdb';$tbl = 'cdr';
$connect = mysql_connect('localhost', $usr, $pwd) or die(mysql_error());


$query = sprintf('SELECT * from crm.users where id = "%s"', $_GET['agent']);
$res = mysql_query($query);
$row = mysql_fetch_array($res);

$leadquery = sprintf('SELECT * from crm.users where id = "%s"', $_GET['agent']);
$leadres = mysql_query($leadquery);
$leadrow = mysql_fetch_array($leadres);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EQ</title>
    <style type="text/css">
        body {width: 8.5in;height: 11in;background-image: url('bg.png');background-position: top left;background-repeat: no-repeat;font-family: Arial;}
        .textboxcontainer {display: flex;}
        .textboxcontainer * {display: flex;flex: auto;}
		input {background: transparent;border: 0px;padding-left: 5px;}
		#boxes1 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 273px;}
		#boxes2 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 324px;}
		#boxes3 {position: absolute;left: 780px;width: 798px;height: 25px;top: 380px;}
		#boxes4 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 480px;}
		#boxes5 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 535px;}
		#boxes6 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 587px;}
		#boxes7 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 640px;}
		#boxes8 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 740px;}
		#boxes9 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 838px;}
		#boxes10 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 890px;}
		#boxes11 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 1050px;}
		#boxes12 {position: absolute;left: 74px;width: 1503px;height: 25px;top: 273px;}
        #ContactInfo {position: absolute;top: 154px;left: 74px;font-size: 13pt;line-height: 0.99;}
		#agentname {position: absolute;top: 126px;left: 74px;font-size: 16pt;font-weight: 700;}
		#anchor {position: absolute;top: 1250px;}
    </style>
</head>
<body>

   	<div id="agentname"><?php echo $row['name'].' '.$row['lastname'];?></div>
    <div id="ContactInfo">
        Phone: 888-286-1071 Ext: <?php echo $row['ext'];?> <br>
        Fax: 855-599-5556 <br> 
        Email: <?php echo $row['email'];?> 
    </div>
    <form method="post" id="forma" action="./">
    	
    <div class="textboxcontainer" id="boxes1">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    </div>    
    
    <div class="textboxcontainer" id="boxes2">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    </div>
    
    <div class="textboxcontainer" id="boxes3">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    </div>
    <div class="textboxcontainer" id="boxes4">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes5">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes6">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes7">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes8">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes9">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
    <div class="textboxcontainer" id="boxes10">
    <input type="text" name="" value="" id="">
    </div>

	<div class="textboxcontainer" id="boxes11">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="">
    <input type="text" name="" value="" id="" class="maschico">
    <input type="text" name="" value="" id="" class="maschico">
    </div>
<div id="anchor">&nbsp;</div>
    </form>
</body>
</html>