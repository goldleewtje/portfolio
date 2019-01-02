<?php
    //connectie met de database
    include_once("Utility.php");
    include_once("users.php");
    $database = new database;
    $users = new users;
    $database->connectDatabase();
    session_start();
    $userID = $_SESSION['id'];
    session_write_close();
    if(isset($_POST['submit']))
    {

        $userArray = [$_POST["inp1"], $_POST["inp2"], $_POST["inp3"], $_POST["inp4"], $_POST["inp5"], $_POST["inp6"], $_POST["inp7"],
            $_POST["inp8"], $_POST["inp9"], $_POST["inp10"]];
        $users->editUser($database, $userID, $userArray);
        //$database->updateQuery("UPDATE gebruikers SET Email = '" . $_POST["inp1"] . "' WHERE GebruikerID = 1;");

    }
    $users->fillUser($userID)
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="style/profiel.css" />
</head>

<body>


<?php include("header/header.php") ?>
<div id="mijnInformatie">
    <form method="post" action="profiel.php">
        <label for="inp1">E-mail</label>
        <input type="text" name="inp1" id="inp1" class="textBox" value="<?php echo $users->getEmail();?>">

        <label for="inp2">Gebruikersnaam</label>
        <input readonly type="text" name="inp2" id="inp2" class="textBox" value="<?php echo $users->getUsername();/*echo $row["gebruikersnaam"]*/ ?>">

        <label for="inp3">Voornaam</label>
        <input type="text" name="inp3" id="inp3" class="textBox" value="<?php echo $users->getFirstName(); ?>">

        <label for="inp4">Achternaam</label>
        <input type="text" name="inp4" id="inp4" class="textBox" value="<?php echo $users->getLastName(); ?>">

        <label for="inp5">Tussenvoegsel</label>
        <input type="text" name="inp5" id="inp5" class="textBox" value="<?php echo $users->getMiddle(); ?>">

        <label for="inp6">Straat</label>
        <input type="text" name="inp6" id="inp6" class="textBox" value="<?php echo $users->getStreet(); ?>">

        <label for="inp7">HuisNr</label>
        <input type="text" name="inp7" id="inp7" class="textBox" value="<?php echo $users->getNumber(); ?>">

        <label for="inp8">Postcode</label>
        <input type="text" name="inp8" id="inp8" class="textBox" value="<?php echo $users->getZipCode(); ?>">

        <label for="inp9">Telefoonnummer</label>
        <input type="text" name="inp9" id="inp9" class="textBox" value="<?php echo $users->getPhoneNumber(); ?>">

        <label for="inp10">Wachtwoord</label>
        <input type="text" name="inp10" id="inp10" placeholder="Leeg laten om wachtwoord niet te wijzigen" class="textBox">

        <input type="submit" name="submit" value="Wijzigen" id="wijzigen">
    </form>
</div>

<?php include("Footer.html")?>
</body>
<script src="javaScript/profiel.js"></script>
</html>




