<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style/registartie.css" >
</head>

<body>
<?php include("header/header.php")?>
<div id="container">
	<form action="VoegGebruikerToe.php" id="popForm" method="post" style="width:200px; margin: 0 auto;">
    
          <div id="form">
              <label for="User">Username:</label>
              <input type="User" name="username" id="Gebruikesnaam" class="form-control input-md" style="width:200px;">
              <label for="password">Wachtwoord:</label>
              <input type="password" name="password" id="wachtwoord" class="form-control input-md" style="width:200px;">
              <button type="submit" class="btn btn-primary" data-loading-text="Sending info.." style="margin-top:10px;"><em class="icon-ok"></em> Registreren</button>
         </div>
     </form>
</div>
<?php include("Footer.html")?>
</body>
</html>