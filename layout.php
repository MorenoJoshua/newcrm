<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <script src="jquery/jquery-2.1.3.min.js"></script>
	    <link rel="stylesheet" href="layout.css">
</head>
<body>

<table id="main" cellspacing="0">
 <tr>
  <td id="toolbar" colspan="2">
   <div id="hamburger">&#8801;</div>
   <span class="flex"></span>
            <table id="stats">
               <tr>
                    <td>0</td><td>0</td><td>time</td><td>time</td><td>5</td><td>3</td><td>2</td><td>1</td><td>1</td>
               </tr>
                   <tr><td>CALLS</td><td>CONVS</td><td>TTT</td><td>ATT</td><td>VM</td><td>@</td><td>CB</td><td>ISL</td><td>CSL</td>
               </tr>
           </table>
           <table>
            <tr>
             <td>Welcome, Enrique</td>
             <td rowspan="2" id="profilepic">img</td>
            </tr>
            <tr>
             <td id="signout">Signout</td>
            </tr>
           </table>

  </td>

 </tr>
 <tr>
  <td id="leadinfo">
   <table id="maintabs">
   <tr id="tabs">
    <td>Lead Info</td>
    <td>Owner 1</td>
    <td>Owner 2</td>
   </tr>
			<tr>
				<td id="lead" colspan="3">
					<table id="leadtable">
<tr>
<td colspan="2"><label for="company">Company</label><input type="text" name="company" value="<?php echo $company; ?>" id="company"></td>
<td colspan="2"><label for="contact">Contact</label><input type="text" name="contact" value="<?php echo $contact; ?>" id="contact"></td>
</tr>
<tr>
<td><label for="uccparty">UCC Party</label><input type="text" name="uccparty" value="<?php echo $uccparty; ?>" id="uccparty"></td>
<td><label for="ucctype">UCC Type</label><input type="text" name="ucctype" value="<?php echo $ucctype; ?>" id="ucctype"></td>
<td><label for="uccfiledate">UCC Filedate</label><input type="text" name="uccfiledate" value="<?php echo $uccfiledate; ?>" id="uccfiledate"></td>
<td><label for="employees">Employees</label><input type="text" name="employees" value="<?php echo $employees; ?>" id="employees"></td>
</tr>
<tr>
<td><label for="phone">Phone</label><input type="text" name="phone" value="<?php echo $phone; ?>" id="phone"></td>
<td><label for="phone">Phone</label><input type="text" name="phone" value="<?php echo $phone; ?>" id="phone"></td>
<td><label for="phone2">Phone2</label><input type="text" name="phone2" value="<?php echo $phone2; ?>" id="phone2"></td>
<td><label for="fax">Fax</label><input type="text" name="fax" value="<?php echo $fax; ?>" id="fax"></td>
</tr>
<tr>
<td><label for="email">Email</label><input type="text" name="email" value="<?php echo $email; ?>" id="email"></td>
<td><label for="receptionist">Receptionist</label><input type="text" name="receptionist" value="<?php echo $receptionist; ?>" id="receptionist"></td>
<td><label for="email_receptionist">Email Receptionist</label><input type="text" name="email_receptionist" value="<?php echo $email_receptionist; ?>" id="email_receptionist"></td>
<td><label for="web">Web</label><input type="text" name="web" value="<?php echo $web; ?>" id="web"></td>
</tr>
<tr>
<td><label for="app_timeframe">App Timeframe</label><input type="text" name="app_timeframe" value="<?php echo $app_timeframe; ?>" id="app_timeframe"></td>
<td><label for="app_purpose">App Purpose</label><input type="text" name="app_purpose" value="<?php echo $app_purpose; ?>" id="app_purpose"></td>
<td><label for="app_amount">App Amount</label><input type="text" name="app_amount" value="<?php echo $app_amount; ?>" id="app_amount"></td>
<td><label for="app_tib">App Tib</label><input type="text" name="app_tib" value="<?php echo $app_tib; ?>" id="app_tib"></td>
</tr>
<tr>
<td><label for="taxid">Tax id</label><input type="text" name="taxid" value="<?php echo $taxid; ?>" id="taxid"></td>
<td><label for="app_lastyear_gas">PP Last Year GAS</label><input type="text" name="app_lastyear_gas" value="<?php echo $app_lastyear_gas; ?>" id="app_lastyear_gas"></td>
<td colspan="2"><label for="app_thisyear_ams">Apps</label><input type="text" name="app_thisyear_ams" value="<?php echo $app_thisyear_ams; ?>" id="app_thisyear_ams"></td>
</tr>
<tr>
<td><label for="niche">Niche</label><input type="text" name="niche" value="<?php echo $niche; ?>" id="niche"></td>
<td><label for="lenguage">Lenguage</label><input type="text" name="lenguage" value="<?php echo $lenguage; ?>" id="lenguage"></td>
<td colspan="2"><label for="app">App</label><input type="text" name="app" value="<?php echo $app; ?>" id="app"></td>
</tr>
<tr>
<td colspan="4"><label for="notes">Notes</label><input type="text" name="notes" value="<?php echo $notes; ?>" id="notes"></td>
</tr>
</table>	
					
				</td>
			</tr>
			</table>
		</td>
		<td id="sidebar">
			<table id="sidebarcontent">
				<tr>
					<td>
					<table id="sidebartable">
						<tr>
							<td colspan="3">(858)909-8855</td>
							<td>Call</td>
						</tr>
						<tr>
							<td colspan="4">
								Dispo
							</td>
						</tr>
						<tr>
							<td colspan="4">Options here</td>
						</tr>
						<tr>
							<td colspan="2">Discard Lead</td>
							<td colspan="2">Save and dispo</td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div id="hbbutton">
<div id="hamburgerin">&#8801;</div>
	
<div id="hbtext">
    <a href="#">Dialer</a>
    <a href="#">Calls</a>
    <a href="#">Callbacks</a>
    <a href="#">Leads</a>
 </div>
</div>
</body>

<script>
function fadeout(){$("#hbbutton").fadeOut(200);}
        $('#hbbutton').hide();
        $('#hamburger').on('click', function(){
            $('#hbbutton').fadeIn(200);
        });
        $('#hbbutton a').on('click', function(){
        	fadeout();
        })
        $('#hbbutton').mouseleave(function() {
        	fadeout();
  });

    </script>

</html>