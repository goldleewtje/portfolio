
<?php
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
$conn = mysqli_connect("localhost", "root", "");
//Selecting Database
$db = mysqli_select_db($conn, "phpopdracht");
//sql query to fetch information of registerd user and finds user match.

if(isset($_POST['delete'])) {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $factuurSql = mysqli_query($conn, "SELECT * FROM factuur WHERE ID = $id");
        $factuurRow = mysqli_fetch_assoc($factuurSql);
        mysqli_query($conn,"DELETE FROM factuur WHERE ID = $id");
        mysqli_query($conn, "DELETE FROM factuurregels WHERE factuurID = " . $factuurRow['ID'] . " ");
    }
}
if(isset($_POST['zoekButton'])) {
    $query = mysqli_query($conn, "SELECT * FROM factuur WHERE ID = " . $_POST['zoekInput'] . " ");
} else {
    $query = mysqli_query($conn, "SELECT * FROM factuur");
}




//$query = mysqli_query($conn, "SELECT GebruikerID, gebruikersnaam, Voornaam, Tussenvoegsel, Achternaam FROM gebruikers");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/productBeheer.css">

</head>

<body>
<?php include_once("header/header.php") ?>
<div id="categorieBeheer">


    <table width="100%" style="margin: 0px auto;">
        <form method="POST" action="bestellingBeheer.php">
            <tr>

                <td colspan="2"><input id="zoekInput" style="width: 100%" type="text" name="zoekInput" placeholder="Zoeken op factuurID"> </td>
                <td><input type="submit" name="zoekButton" value="Zoeken"><a href="bestellingBeheer.php"> <input style="float: right;" type="button" value="Herlaad"></a> </td>
            </tr>
        </form>
        <tr></tr>
        <tr id="tableHeader">
            <td style="padding-right: 20px;">FactuurID</td>
            <td style="padding-right: 20px;">KlantID</td>
            <td style="padding-right: 20px;">Datum</td>

            <td></td>

        </tr>
        <?php

        while($row = mysqli_fetch_assoc($query))
        {

            ?>
            <form method="POST" action="regelBeheer.php?id=<?php echo $row['ID']; ?>" >
                <tr>
                    <td><?php echo $row['ID'] ?></td>
                    <td><?php echo $row['klantID'] ?></td>
                    <td><?php echo $row['datum'] ?></td>

                    <td><a href="singleGebruiker.php?id=<?php echo $row['ID'] ?>"> <input type="submit" name="submit" value="Wijzigen"></a></td>
            </form>
            <form method="POST" action="bestellingBeheer.php?id=<?php echo $row['ID']; ?>">
                <td><input type="submit" name="delete" value="Verwijderen" ></td>
            </form>
			<form method="POST" action="factuurDownload.php?id=<?php echo $row['ID']; ?>">
                <td><input type="submit" name="delete" value="Factuurdownload" ></td>
            </form>

            </tr>


            <?php
        }
        ?>

    </table>

</div>
<?php include_once("footer.html") ?>
</body>

</html>