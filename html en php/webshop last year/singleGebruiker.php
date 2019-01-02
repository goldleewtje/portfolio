<?php
//connectie met de database
include_once("Utility.php");
include_once("users.php");
$database = new database;
$users = new users;
$database->connectDatabase();


/*$host        =    'localhost';
$user        =    'root';
$password    =    '';
$database    =    'phpopdracht';
$conn        =    mysqli_connect($host,$user,$password, $database);
*/
$userID = "";
if(isset($_GET['id']))
{
    $userID = $_GET['id'];

}

if(isset($_POST['wijzigen']))
{

    $userArray = [$_POST["inp1"], $_POST["inp2"], $_POST["inp3"], $_POST["inp4"], $_POST["inp5"], $_POST["inp6"], $_POST["inp7"],
        $_POST["inp8"], $_POST["inp9"], $_POST["inp10"]];
    $users->editUser($database, $userID, $userArray);
    $users->setFunction($database, $userID, $_POST["inp11"]);
    //$database->updateQuery("UPDATE gebruikers SET Email = '" . $_POST["inp1"] . "' WHERE GebruikerID = 1;");
}

if(isset($_POST['voegToe']))
{
    $teller = 0;
    $rrow = $database->getDataRow("SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam = '" . $_POST['inp2'] . "' ");
    if(isset($rrow['gebruikersnaam'])) {
        header("location: gebruikersBeheer.php");
    }else {
        $userArray = [$_POST["inp1"], $_POST["inp2"], $_POST["inp3"], $_POST["inp4"], $_POST["inp5"], $_POST["inp6"], $_POST["inp7"],
            $_POST["inp8"], $_POST["inp9"], $_POST["inp10"]];
        $users->addUser($database, $userArray);
        $users->setFunction($database, $userID, $_POST["inp11"]);
        //$database->updateQuery("UPDATE gebruikers SET Email = '" . $_POST["inp1"] . "' WHERE GebruikerID = 1;");
    }

    header("location: gebruikersBeheer.php");
}

if(isset($_GET['id']))
{
    $users->fillUser($_GET['id']);
}

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
<a href="gebruikersBeheer.php"><button style="float: left; margin: 40px;">Terug</button></a>
<div id="mijnInformatie">

    <form method="post" action="singleGebruiker.php?id=<?php echo $userID ?>">
        <label for="inp1">E-mail</label>
        <input type="text" name="inp1" id="inp1" class="textBox" value="<?php echo $users->getEmail(); ?>">

        <label for="inp2">Gebruikersnaam</label>

        <input readonly type="text" name="inp2" id="inp2" class="textBox" value="<?php echo $users->getUsername(); ?>">

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
        <input type="text" name="inp10" id="inp10" placeholder="Leeg laten om wachtwoord niet te wijzigen"  class="textBox" >

        <label for="inp11">Functie</label>
        <select type="text" name="inp11" id="inp11" class="textBox" >
            <option value="<?php echo $users->getFunction() ?>"><?php echo $users->getFunction()?></option>
            <option value="gebruiker">Gebruiker</option>
            <option value="administrator">Administrator</option>
        </select>
        <?php if(isset($_GET['id']))
        {
            ?><input type="submit" name="wijzigen" value="Wijzigen" id="wijzigen"><?php
        } else {
            ?><input type="submit" name="voegToe" value="Voeg toe" id="wijzigen"><?php
        }
        ?>

    </form>
</div>

<?php include("Footer.html")?>
</body>
<script src="javaScript/profiel.js"></script>
</html>




