
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
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
if(isset($_POST['delete'])) {
    if(isset($_GET['deleteid'])){
        $deleteid = $_GET['deleteid'];
        //$factuurSql = mysqli_query($conn, "SELECT * FROM factuur WHERE ID = $deleteid");
        //$factuurRow = mysqli_fetch_assoc($factuurSql);
        //mysqli_query($conn,"DELETE FROM factuur WHERE ID = $id");
        mysqli_query($conn, "DELETE FROM factuurregels WHERE ID = $deleteid ");
    }
}
if(isset($_GET['id'])) {
    $factuurID = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM factuurregels WHERE factuurID = $factuurID ");
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
<a href="bestellingBeheer.php"><button style="float: left; margin: 40px;">Terug</button></a>
<div id="categorieBeheer">


    <table width="100%" style="margin: 0px auto;">
        <form method="POST" action="bestellingBeheer.php">
            <tr>

            </tr>
        </form>
        <tr></tr>
        <tr id="tableHeader">
            <td style="padding-right: 20px;">productID</td>
            <td style="padding-right: 20px;">productNaam</td>
            <td style="padding-right: 20px;">aantal</td>

            <td></td>
            <td><a href="singleRegel.php?factuurID=<?php echo $_GET['id'] ?>" style="color:black;"><button action="editPage.php">Regel +</button></a></td>
        </tr>
        <?php

        while($row = mysqli_fetch_assoc($query))
        {

            ?>
            <form method="POST" action="singleRegel.php?id=<?php echo $row['ID']; ?>" >
                <tr>
                    <td><?php echo $row['productID'] ?></td>
                    <td><?php
                        $qquery = mysqli_query($conn, "SELECT Naam FROM product WHERE ID = " . $row['productID'] . " " );
                        $rrow = mysqli_fetch_assoc($qquery);
                        echo $rrow['Naam'] ?></td>
                    <td><?php echo $row['aantal'] ?></td>

                    <td><a href="#"> <input type="submit" name="submit" value="Wijzigen"></a></td>
            </form>
            <form method="POST" action="regelBeheer.php?id=<?php echo $id; ?>&deleteid=<?php echo $row['ID']; ?>">
                <td><input type="submit" name="delete" value="Verwijderen" ></td>
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