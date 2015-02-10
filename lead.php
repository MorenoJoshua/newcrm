<?php 
require('connect.php');

if (!$_GET['e'] OR !$_GET['leadid']) { //si no se especifica un leadid, busca en la tabla de crm.Leads un lead que complacon los requisitos, dentro de un rango de 100 leads

  if(!$_GET['leadid']){                 //genera dicho leadid
    $lownumber = rand(2554459, 2901691);
    $highnumber = ($lownumber + '100');
    $query = sprintf('SELECT leadid from crm.Leads where leadid between "%s" and "%s" and status = "" and agent = "" order by rand() limit 0, 1', $lownumber, $highnumber);
    $res = mysql_query($query) or die();
    $row = mysql_fetch_array($res);
    $newleadid = $row['leadid'];
    header('location:./lead.php?leadid='.$newleadid); //entra de nuevo a la pagina con el leadid generado
    $leadid = $_GET['leadid'];
  }

  if(!$_GET['e']){    // e = existing, si el valor es 1, busca en la tabla de crm.leads, si no existe o es algo mas, busca en la de crm.Leads, pasa valores a variables, y sigue
$leadquery = sprintf('SELECT * FROM crm.Leads where leadid = "%s"', $_GET['leadid']);
$leadres = mysql_query($leadquery) or die(mysql_error());
$freshleadrow = mysql_fetch_array($leadres);
    $source = $freshleadrow['leadsource'];
    $leadid = $freshleadrow['leadid'];
    $company = $freshleadrow['name'];
    $contact = $freshleadrow['contact'];
    $address = $freshleadrow['address'];
    $city = $freshleadrow['city'];
    $state = $freshleadrow['state'];
    $zip = $freshleadrow['zip'];
    $phone = $freshleadrow['phone'];
    $fax = $freshleadrow['fax'];
    $email = $freshleadrow['email'];
    $web = $freshleadrow['web'];
    $niche = $freshleadrow['sicdesc'];
    $app_tib = $freshleadrow['tib'];
    $app_lastyear_gas = $freshleadrow['annualsales'];
    $sales = $freshleadrow['annualsales'];
    $uccparty = $freshleadrow['uccparty'];
    $ucctype = $freshleadrow['ucctype'];
    $uccfiledate = $freshleadrow['uccfileyear'] . ' / ' . $freshleadrow['uccfilemonth'];
    $employees = $freshleadrow['employees'];
    $taxid = $freshleadrow['taxid'];
    $addname01 = $freshleadrow['p1name'];
    $addtitle01 = $freshleadrow['p1title'];
    $addhomephone01 = $freshleadrow['p1phone'];
    $addssn01 = $freshleadrow['ssn'];
    $addownership01 = $freshleadrow['p1ownership'];
    $p1credit = $freshleadrow['p1credit'];
    $p1yrs = $freshleadrow['p1yrs'];
  }
}

if($_GET['e'] == '1') { //si se especifica que el lead existe, se busca en la tabla de crm.leads, y de ahi asigna valores a variables y sigue

      $leadid = $_GET['leadid'];
      $existingleadquery = sprintf('SELECT * FROM crm.leads where leadid = "%s" and agent = "%s" order by id desc', $leadid, $agent);
      $existingleadres = mysql_query($existingleadquery) or die();
      $leadarr = mysql_fetch_array($existingleadres);

      if ($leadarr['phone'] == '') {  // si el lead regresado esta en blanc, ya sea xk no pertenece al agente, este erroneo 
        header('location:./lead.php');  //el id, o que no exista en tabla de crm.leads, se regresa a leads.php x un lead nuevo
      }

    $source = 'workingonthis';
    $leadid = $leadarr['leadid'];
    $company = $leadarr['company'];
    $contact = $leadarr['contact'];
    $address = $leadarr['address'];
    $city = $leadarr['city'];
    $state = $leadarr['state'];
    $zip = $leadarr['zip'];
    $phone = $leadarr['phone'];
    $phone2 = $leadarr['phone2'];
    $fax = $leadarr['fax'];
    $email = $leadarr['email'];
    $receptionist = $leadarr['receptionist'];
    $email_receptionist = $leadarr['email_receptionist'];
    $web = $leadarr['web'];
    $niche = $leadarr['niche'];
    $app_tib = $leadarr['app_tib'];
    $app_amount = $leadarr['app_amount'];
    $app_purpose = $leadarr['app_purpose'];
    $app_product = $leadarr['app_product'];
    $app_timeframe = $leadarr['app_timeframe'];
    $lenguage = $leadarr['lenguage'];
    $app_lastyear_gas = $leadarr['app_lastyear_gas'];
    $app_thisyear_ams = $leadarr['app_thisyear_ams'];
    $uccparty = $leadarr['uccparty'];
    $ucctype = $leadarr['ucctype'];
    $uccfiledate = $leadarr['uccfiledate'];
    $employees = $leadarr['employees'];
    $app = $leadarr['app'];
    $taxid = $leadarr['taxid'];
    $addname01 = $leadarr['addname01'];
    $addtitle01 = $leadarr['addtitle01'];
    $addhomeaddres01 = $leadarr['addhomeaddres01'];
    $addcity01 = $leadarr['addcity01'];
    $addstate01 = $leadarr['addstate01'];
    $addzip01 = $leadarr['addzip01'];
    $addhomephone01 = $leadarr['addhomephone01'];
    $addssn01 = $leadarr['addssn01'];
    $addownership01 = $leadarr['addownership01'];
    $adddatebirth01 = $leadarr['adddatebirth01'];
    $addficoscore01 = $leadarr['addficoscore01'];
    $p1credit = $leadarr['p1credit'];
    $addyearcompany01 = $leadarr['addyearcompany01'];
    $addname02 = $leadarr['addname02'];
    $addtitle02 = $leadarr['addtitle02'];
    $addhomeaddres02 = $leadarr['addhomeaddres02'];
    $addcity02 = $leadarr['addcity02'];
    $addstate02 = $leadarr['addstate02'];
    $addzip02 = $leadarr['addzip02'];
    $addhomephone02 = $leadarr['addhomephone02'];
    $addssn02 = $leadarr['addssn02'];
    $addownership02 = $leadarr['addownership02'];
    $adddatebirth02 = $leadarr['adddatebirth02'];
    $addficoscore02 = $leadarr['addficoscore02'];
    $p1credit = $leadarr['p1credit'];
    $addyearcompany02 = $leadarr['addyearcompany02'];
    $notes = $leadarr['notes'];
  
} 


?>

<!DOCTYPE html>

<html>
<head>
  <title></title>
      <script src="jquery/jquery-2.1.3.min.js"></script>
      <script src="debounce.js"></script>
      <link rel="stylesheet" href="joshua.css">
      <link rel="stylesheet" href="layout.css">
</head>
<body>

  <form id="leadform">

<table id="main" cellspacing="0">
 <tr>
  <td id="toolbar" colspan="2">
  <?php require('toolbar.php'); ?>
  </td>

    <input type="hidden" name="agent" value="<?php echo $agent ?>">
    <input type="hidden" name="agentdid" value="<?php echo $agentdid ?>">
    <input type="hidden" name="leadid" value="<?php echo $leadid ?>">
    <input type="hidden" name="source" value="<?php echo $source ?>">
    <input type="hidden" name="city" value="<?php echo $city ?>">
    <input type="hidden" name="state" value="<?php echo $state ?>">
    <input type="hidden" name="source" value="<?php echo $source ?>">
    <input type="hidden" name="leadsourceid" value="<?php echo $leadsourceid ?>">
    <input type="hidden" name="uccparty" value="<?php echo $uccparty ?>">
    <input type="hidden" name="ucctype" value="<?php echo $ucctype ?>">
    <input type="hidden" name="app" value="0">
 </tr>
 <tr>
  <td id="leadinfo">

   <table id="maintabs" cellspacing="0">
   <tr id="tabs">
    <td id="leadtab" class="tabs tabselected">Lead Info</td>
    <td id="ownertab01" class="tabs">Owner 1</td>
    <td id="ownertab02" class="tabs">Owner 2</td>
   </tr>
      <tr>
        <td id="lead" colspan="3">
          <table id="leadtable">
            <tr>
              <td colspan="2"><label for="company">Company</label><input type="text" name="company" value="<?php echo $company; ?>" id="company"></td>
              <td colspan="2"><label for="contact">Contact Name</label><input type="text" name="contact" value="<?php echo $contact; ?>" id="contact"></td>
              <!-- <td><label for="contact">Contact Lastname</label><input type="text" name="contact" value="<?php echo $contact; ?>" id="contact"></td> -->
              </tr>
            <tr>
              <td><label for="phone">Phone</label><input type="text" name="phone" value="<?php echo $phone; ?>" id="phone"></td>
              <td><label for="phone2">Phone2</label><input type="text" name="phone2" value="<?php echo $phone2; ?>" id="phone2"></td>
              
              <!-- <td> tentativo a futuro cercano -->  
              <!-- 
              <label for="phonetype">Type</label>
              <select type="text" name="phonetype" value="<?php echo $phonetype; ?>" id="phonetype">
              <select type="text" name="phonetype" value="<?php echo $phonetype; ?>" id="phonetype">
                <option value="Work1">Work 1</option>
                <option value="Work2">Work2</option>
                <option value="Home1">Home 1</option>
                <option value="Home2">Home 2</option>
                <option value="Mobile1">Mobile 1</option>
                <option value="Mobile2">Mobile 2</option>
              </select> -->
              <!-- </td> -->

              <td><label for="fax">Fax</label><input type="text" name="fax" value="<?php echo $fax; ?>" id="fax"></td>
              <td><label for="email">Email</label><input type="text" name="email" value="<?php echo $email; ?>" id="email"></td>
            </tr>
            <tr>
              <td><label for="uccparty">UCC Party</label><input type="text" name="uccparty" value="<?php echo $uccparty; ?>" id="uccparty"></td>
              <td><label for="ucctype">UCC Type</label><input type="text" name="ucctype" value="<?php echo $ucctype; ?>" id="ucctype"></td>
              <td><label for="uccfiledate">UCC Filedate</label><input type="text" name="uccfiledate" value="<?php echo $uccfiledate; ?>" id="uccfiledate"></td>
              <td><label for="employees">Employees</label><input type="text" name="employees" value="<?php echo $employees; ?>" id="employees"></td>
            </tr>
            <tr>
              <td><label for="address">Addres</label><input type="text" name="address" value="<?php echo $address; ?>" id="address"></td>
              <td><label for="city">City</label><input type="text" name="city" value="<?php echo $city; ?>" id="city"></td>
              <td><label for="state">State</label><input type="text" name="state" value="<?php echo $state; ?>" id="state"></td>
              <td><label for="zip">ZIP</label><input type="text" name="zip" value="<?php echo $zip; ?>" id="zip"></td>
            </tr>
            <tr>
              <td><label for="receptionist">Receptionist</label><input type="text" name="receptionist" value="<?php echo $receptionist; ?>" id="receptionist"></td>
              <td><label for="email_receptionist">Email Receptionist</label><input type="text" name="email_receptionist" value="<?php echo $email_receptionist; ?>" id="email_receptionist"></td>
              <td><label for="web">Web</label><input type="text" name="web" value="<?php echo $web; ?>" id="web"></td>
              <td><label for="app_product">App Product</label>
              <select name="app_product" id="app_product">
                <option value="Capital" <?php if($app_product == 'Working Capital'){ echo 'selected'; }?> >Working Capital</option>
                <option value="Equipment" <?php if($app_product == 'Equipment'){ echo 'selected'; }?>>Equipment</option>                
                <option value="Both" <?php if($app_product == 'Both'){ echo 'selected'; }?>>Both</option>                
              </select>
            </td>
            </tr>
            <tr>
              <td><label for="app_timeframe">App Timeframe</label>
              <select name="app_timeframe" id="app_timeframe">
                <option value="Immediate" <?php if($app_timeframe == 'Immediate'){ echo 'selected'; }?> >Immediate</option>
                <option value="Less than 30 days" <?php if($app_timeframe == 'Less than 30 days'){ echo 'selected'; }?>>Less than 30 days</option>                
                <option value="More than 30 days" <?php if($app_timeframe == 'More than 30 days'){ echo 'selected'; }?>>More than 30 days</option>                
              </select>
            </td>
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
              <td><label for="lenguage">Lenguage</label>
              <select name="lenguage" id="lenguage">
                <option value="English" <?php if($lenguage == 'English'){ echo 'selected'; }?> >English</option>
                <option value="Spanish" <?php if($lenguage == 'Spanish'){ echo 'selected'; }?>>Spanish</option>                
              </select>
              </td>
              <td colspan="2"><label for="app">App</label><input type="text" name="app" value="<?php echo $app; ?>" id="app"></td>
            </tr>
            <tr>
              <td colspan="4"><label for="notes">Notes</label><input type="text" name="notes" value="<?php echo $notes; ?>" id="notes"></td>
            </tr>
          </table>
          <table id="owner1table">
            <tr>
              <td colspan="2"><label for="addname01">Name</label><input type="text" name="addname01" value="<?php echo $addname01; ?>" id="addname01"></td>
              <td colspan="2"><label for="addtitle01">Title</label><input type="text" name="addtitle01" value="<?php echo $addtitle01; ?>" id="addtitle01"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addhomeaddres01">Home Addres</label><input type="text" name="addhomeaddres01" value="<?php echo $addhomeaddres01; ?>" id="addhomeaddres01"></td>
              <td colspan="2"><label for="addcity01">City</label><input type="text" name="addcity01" value="<?php echo $addcity01; ?>" id="addcity01"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addstate01">State</label><input type="text" name="addstate01" value="<?php echo $addstate01; ?>" id="addstate01"></td>
              <td colspan="2"><label for="addzip01">ZIP</label><input type="text" name="addzip01" value="<?php echo $addzip01; ?>" id="addzip01"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addssn01">SSN</label><input type="text" name="addssn01" value="<?php echo $addssn01; ?>" id="addssn01"></td>
              <td colspan="2"><label for="addhomephone01">Home Phone</label><input type="text" name="addhomephone01" value="<?php echo $addhomephone01; ?>" id="addhomephone01"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addownership01">Ownership</label><input type="text" name="addownership01" value="<?php echo $addownership01; ?>" id="addownership01"></td>
              <td colspan="2"><label for="adddatebirth01">Date Of Birth</label><input type="text" name="adddatebirth01" value="<?php echo $adddatebirth01; ?>" id="adddatebirth01"></td>
            </tr>
            <tr>
              <td colspan="4"><label for="addficoscore01">FICO Score</label><input type="text" name="addficoscore01" value="<?php echo $addficoscore01; ?>" id="addficoscore01"></td>
            </tr>
          </table>    
          <table id="owner2table">
            <tr>
              <td colspan="2"><label for="addname02">Name</label><input type="text" name="addname02" value="<?php echo $addname02; ?>" id="addname02"></td>
              <td colspan="2"><label for="addtitle02">Title</label><input type="text" name="addtitle02" value="<?php echo $addtitle02; ?>" id="addtitle02"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addhomeaddres02">Home Addres</label><input type="text" name="addhomeaddres02" value="<?php echo $addhomeaddres02; ?>" id="addhomeaddres02"></td>
              <td colspan="2"><label for="addcity02">City</label><input type="text" name="addcity02" value="<?php echo $addcity02; ?>" id="addcity02"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addstate02">State</label><input type="text" name="addstate02" value="<?php echo $addstate02; ?>" id="addstate02"></td>
              <td colspan="2"><label for="addzip02">ZIP</label><input type="text" name="addzip02" value="<?php echo $addzip02; ?>" id="addzip02"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addssn02">SSN</label><input type="text" name="addssn02" value="<?php echo $addssn02; ?>" id="addssn02"></td>
              <td colspan="2"><label for="addhomephone02">Home Phone</label><input type="text" name="addhomephone02" value="<?php echo $addhomephone02; ?>" id="addhomephone02"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="addownership02">Ownership</label><input type="text" name="addownership02" value="<?php echo $addownership02; ?>" id="addownership02"></td>
              <td colspan="2"><label for="adddatebirth02">Date Of Birth</label><input type="text" name="adddatebirth02" value="<?php echo $adddatebirth02; ?>" id="adddatebirth02"></td>
            </tr>
            <tr>
              <td colspan="4"><label for="addficoscore02">FICO Score</label><input type="text" name="addficoscore02" value="<?php echo $addficoscore02; ?>" id="addficoscore02"></td>
            </tr>
          </table>    
        </td>
      </tr>
      </table>
    </td>
    <td id="sidebar">
    <?php require('sidebar.php');?>
    </td>
  </tr>
</table>
  </form>

<div id="hbbutton"> <!-- hamburguer menu -->
<div id="hamburgerin">&#8801;</div>
  
<div id="hbtext">
    <a href="lead.php">Dialer</a>
    <a href="calls.php">Calls</a>
    <a href="callbacks.php">Callbacks</a>
    <a href="leads.php">Leads</a>
 </div>
</div>

<div id="lightbox">
  <div id="lbcontent">
    <div id="closelb">X</div>
    <div id="lbhtml"></div>
  </div>  
</div>


<div id="saveprogress">Saving Changes...</div>


</body>
      <script type="text/javascript" src="js.js"></script>
      <script>
function secretsave(){
          console.log('debounced');
          leadvalues = $('#leadform').serialize();
          $.post('dispo.php', leadvalues, function(data) {
          });
          $('#saveprogress').fadeOut(200);
}
          $('#saveprogress').fadeOut('slow');
          $('input').on('click', function(event) {
            event.preventDefault();
            $('#saveprogress').fadeIn(fast);
          });

$('input').keyup( $.debounce( 500, secretsave) );

  $('#capitalemail').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('wce Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/wc_email.php?leadid=<?php echo $leadid;?>&agent=<?php echo $agent;?>');
  });
   
  $('#eqemail').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('eqe Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/eq_email.php?leadid=<?php echo $leadid;?>&agent=<?php echo $agent;?>');
  });   

  
  $('#capitalfax').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('wcf Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/wc_fax.php?leadid=<?php echo $leadid;?>&agent=63');
  });

  
  $('#eqfax').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('eqf Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/wc_fax.php?leadid=<?php echo $leadid;?>&agent=63');
  });


   
  $('#preappemail').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('eqe Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/eq_email.php?leadid=<?php echo $leadid;?>&agent=<?php echo $agent;?>');
  });   

  
  $('#preappfax').on('click', function(event) {
  secretsave();
  event.preventDefault();
  leadinfo = $('#leadform').serialize();
  shlb();
  $('#lbhtml').html('wcf Please wait for a confirmation to close this...');
  $('#lbhtml').load('apps/wc_fax.php?leadid=<?php echo $leadid;?>&agent=63');
  });



  
      </script>

</html>