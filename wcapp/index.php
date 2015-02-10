<?php


if(!$_GET['agent']){echo 'error'; die();}
$usr = 'root';$pwd = 'espada98';$db = 'asteriskcdrdb';$tbl = 'cdr';
$connect = mysql_connect('localhost', $usr, $pwd) or die(mysql_error());


$query = sprintf('SELECT * from crm.users where id = "%s"', $_GET['agent']);
$res = mysql_query($query);
$row = mysql_fetch_array($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WC</title>
    <style type="text/css">
        body {
            width: 8.5in;
            height: 11in;
            background-image: url('bg.png');
            background-position: top left;
            background-repeat: no-repeat;
            font-family: Arial;
        }
        
        .textboxcontainer {
            display: flex;
        }
				
		.textboxcontainer * {
			display: flex;
			flex: auto;
		}
        
		input {
		background: transparent;
		border: 0px solid transparent;
		padding-left: 5px;}
		
        #ContactInfo {
            position: absolute;
            top: 20px;
            left: 0px;
            width: 1650px;
            font-size: 19pt;
            line-height: 0.99;
			text-align: right;
        }
		
		#anchor {
		position: absolute;
		top: 2150px;}

        #r1 {
            position: absolute;
            top: 180px;
            left: 35px;
            width:1600px;
        }
        #r2 {
            position: absolute;
            top: 315px;
            left: 835px;
            width:700px;
        }
        #r3 {
            position: absolute;
            top: 370px;
            left: 35px;
            width:1600px;
        }
        #r4 {
            position: absolute;
            top: 425px;
            left: 35px;
            width:1600px;
        }
        #r5 {
            position: absolute;
            top: 503px;
            left: 35px;
            width:1600px;
        }
        #r6 {
            position: absolute;
            top: 573px;
            left: 35px;
            width:1600px;
        }
        #r7 {
            position: absolute;
            top: 643px;
            left: 35px;
            width:1600px;
        }
        #r8 {
            position: absolute;
            top: 760px;
            left: 265px;
            width:1380px;
        }
        #r9 {
            position: absolute;
            top: 821px;
            left: 995px;
            width:626px;
        }
        #r10 {
            position: absolute;
            top: 892px;
            left: 35px;
            width:1600px;
        }
        #r11 {
            position: absolute;
            top: 945px;
            left: 35px;
            width:1600px;
        }


    </style>
</head>
<body>

    <div id="ContactInfo">
Please return via fax or email to: <?php echo $row['name'].' '.$row['lastname'] ;?><br>
Fax: 855-599-5556, <?php echo $row['email'];?><br>
Toll free: 888-296-1071 Ext: <?php echo $row['ext'];?></div>
<div id="anchor">&nbsp;</div>

<div class="textboxcontainer" id="r1">
    <input type="text"><input type="text">
</div>
<div class="textboxcontainer" id="r2">
    <input type="text"><input type="text">
</div>
<div class="textboxcontainer" id="r3">
    <input type="text"><input type="text">
    <input type="text"><input type="text">
</div>
<div class="textboxcontainer" id="r4">
    <input type="text"><input type="text">
    <input type="text"><input type="text">
</div>
<div class="textboxcontainer" id="r5">
    <input type="text"><input type="text">
    <input type="text">
</div>
<div class="textboxcontainer" id="r6">
    <input type="text"><input type="text">
    <input type="text">
</div>
<div class="textboxcontainer" id="r7">
    <input type="text"><input type="text">
    <input type="text">
</div>
<div class="textboxcontainer" id="r8">
    <input type="text"><input type="text">
    </div>
<div class="textboxcontainer" id="r9">
    <input type="text">
</div>

<div class="textboxcontainer" id="r10">
    <input type="text"><input type="text">
    <input type="text"><input type="text">
    <input type="text">
    </div>

<div class="textboxcontainer" id="r11">
    <input type="text">
    <input type="text">
    <input type="text">
    <input type="text">
</div>
</body>
</html>