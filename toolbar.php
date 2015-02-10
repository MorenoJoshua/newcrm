<?php

require('functions.php');
$query = sprintf('SELECT 
count(*) as TCalls,
sum(if(a.billsec > 30, 1, 0)) as TConv, 
sum(if(a.billsec > 0, billsec, 0)) as TCTime,
avg(a.billsec) as AverageTT,
(SELECT COUNT(*) 
    FROM crm.callbacks 
    WHERE date(dateset) =curdate()  
    AND agent=b.id 
    AND active=1) AS CB_INTERNAL,
(SELECT COUNT(*) 
    FROM crm.`callbacks_cardiff` 
    WHERE date(dateset) = curdate()  
    AND agent=b.id) AS CB_CARDIFF,
(SELECT count(*) 
    FROM asteriskcdrdb.cdr 
    WHERE calldate regexp curdate() 
    and cnam regexp b.did 
    and dcontext regexp "app-blackhole|from-internal-xfer") as VMs,
(SELECT COUNT(*) 
    FROM crm.`callbacks_cardiff` 
    WHERE date(dateset) = curdate() 
    and status = "App In" 
    AND agent=b.id) AS appin,
(SELECT COUNT(*) 
    FROM crm.emails where date regexp curdate() 
    and what != "" 
    and agentname = b.username) as emails
from asteriskcdrdb.cdr a,
crm.users b
where b.ext = "%s"
and a.cnam = b.nickname
AND dst regexp "........*|%s"
and calldate regexp curdate()
and dcontext not regexp "from-internal-xfer|app-blackhole"
group by cnam
order by TCTime desc limit 0, 100', $_SESSION['ext'], $_SESSION['ext']);
$tbres = mysql_query($query);
$tbrow = mysql_fetch_array($tbres);


?>
   <div id="hamburger">&#8801;</div>
   <span class="flex">
    <input type="search" id="toolbarsearch" placeholder="Search By Phone No">
      
   </span>
            <table id="stats">
               <tr id="statstop">
                <td><?php echo $tbrow['TCalls'] ?></td>
                <td><?php echo $tbrow['TConv'] ?></td>
                <td><?php echo secsToTime($tbrow['TCTime']) ?></td>
                <td><?php echo secsToTime($tbrow['AverageTT']) ?></td>
                <td><?php echo $tbrow['VMs'] ?></td>
                <td><?php echo $tbrow['emails'] ?></td>
                <td><?php echo $tbrow['CB_INTERNAL'] ?></td>
                <td><?php echo $tbrow['CB_CARDIFF'] ?></td>
                <td><?php echo $tbrow['appin'] ?></td>
               </tr>
               <tr id="statsbottom">
                 <td>CALLS</td>
                 <td>CONVS</td>
                 <td>TTT</td>
                 <td>ATT</td>
                 <td>VM</td>
                 <td>@</td>
                 <td>CB</td>
                 <td>ISL</td>
                 <td>CSL</td>
               </tr>
           </table>
           <table>
            <tr>
             <td id="welcome">Welcome, <?php echo strtok($agentname, ' ');?></td>
             <td rowspan="2"><img src="profiles/<?php echo $username?>.png"></td>
            </tr>
            <tr>
             <td id="signout"><a href="./">Signout</a></td>
            </tr>
           </table>
