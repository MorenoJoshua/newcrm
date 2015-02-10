<?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
      <head>
      <meta charset="UTF-8">
      <title>Bank of Cardiff Login</title>
      <link rel="stylesheet" type="text/css" href="index.css">
      </head>
<body>
<div id="topbar">
</div>
  
</div>
      <form action="checksession.php" method="post">
      <table id="table" cellpadding="0" cellspacing="0">
      <tr id="titlebox">
      <td id="title" colspan="2"><img id="logo" src="images/logo.gif" alt="HTML5 Icon" /></td>
      </tr>
      <tr id="spacer">
        <td></td>
      </tr>
      <tr>
      <td id="textcolor">Username :</td><td><input type="text" name="username" id="textbar"></td>
      </tr>
            <tr id="spacer">
        <td></td>
      <tr>
      <td id="textcolor">Password :</td><td><input type="password" name="password" id="textbar"></td>
      </tr>
      <tr><td colspan="2"><input type="submit" name="Login" value="Login" id="loginbutton"></td></tr>
      </table>
      </form>
</body>
</html>