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
$ID = "";
if(isset($_GET['id']))
{
    $ID = $_GET['id'];

}

if(isset($_POST['wijzigen']))
{

    //$userArray = [$_POST["inp1"], $_POST["inp2"], $_POST["inp3"], $_POST["inp4"], $_POST["inp5"], $_POST["inp6"], $_POST["inp7"],
        //$_POST["inp8"], $_POST["inp9"], $_POST["inp10"]];
    //$users->editUser($database, $userID, $userArray);
    //$users->setFunction($database, $userID, $_POST["inp11"]);
    //$database->updateQuery("UPDATE gebruikers SET Email = '" . $_POST["inp1"] . "' WHERE GebruikerID = 1;");
    $database->customQuery("UPDATE factuurregels SET productID = '" . $_POST["inp1"] . "', aantal = '" . $_POST["inp2"] . "' WHERE ID = $ID;");
}

if(isset($_POST['voegToe']))
{
    $factuurID = $_GET['factuurID'];
    $database->customQuery("INSERT INTO factuurregels (productID, aantal, factuurID) VALUES (" . $_POST["inp1"] . ", " . $_POST["inp2"] . ", $factuurID )");

    header("location: regelBeheer.php?id=" . $_GET['factuurID'] . " ");
}

if(isset($_GET['id']))
{
    $ID = $_GET['id'];
    $row = $database->getDataRow("SELECT * FROM factuurregels WHERE ID = $ID");
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
<a href="regelBeheer.php?id=<?php echo $row['factuurID'] ?>"><button style="float: left; margin: 40px;">Terug</button></a>
<div id="mijnInformatie">

    <form method="post" action="singleRegel.php?factuurID=<?php echo $_GET['factuurID'] ?>&id=<?php echo $ID ?>">
        <label for="inp1">ProductID</label>
        <input type="text" name="inp1" id="inp1" class="textBox" value="<?php
        if(isset($row)) {
            echo $row['productID'];
        }
        ?>">

        <label for="inp2">Aantal</label>

        <input type="text" name="inp2" id="inp2" class="textBox" value="<?php
        if(isset($row)) {
            echo $row['aantal'];
        }
         ?>">

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
