
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


if(isset($_POST['submit']))
{
    if(isset($_GET['id']))
    {
        redirect("editPage.php?id=" . $_GET['id']);
    }
    /*
    if(isset($_GET['id'])){
        $var = $_GET['id']; //some_value
        mysqli_query($conn,"UPDATE product SET Naam = '" . $_POST["Naam"] . "', 
        Beschrijving = '" . $_POST['Beschrijving'] . "', 
        eig1 = '" . $_POST['Eig1'] . "',
        eig2 = '" . $_POST['Eig2'] . "',
        eig3 = '" . $_POST['Eig3'] . "',
        eig4 = '" . $_POST['Eig4'] . "',
        Voorraad = '" . $_POST['Voorraad'] . "',
        Categorie = '" . $_POST['Categorie'] . "',
        Prijs = '" . $_POST['Prijs'] . "',
        Korting = '" . $_POST['Korting'] . "'
        WHERE ID = $var;");
    }
    */
}

if(isset($_POST['delete'])) {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        mysqli_query($conn,"DELETE FROM product WHERE id = $id");
    }
}


if(isset($_POST['addCat']))
{
    mysqli_query($conn,"INSERT INTO product (Naam, Beschrijving, eig1, eig2, eig3, eig4, Voorraad, Categorie, Prijs, Korting) VALUES ('" . $_POST['Naam'] . "', '" . $_POST['Beschrijving'] . "', '" . $_POST['Eig1'] . "', '" . $_POST['Eig2'] . "', '" . $_POST['Eig3'] . "', '" . $_POST['Eig4'] . "', '" . $_POST['Voorraad'] . "', '" . $_POST['Categorie'] . "', '" . $_POST['Prijs'] . "', '" . $_POST['Korting'] . "' )");
}

$query = mysqli_query($conn, "SELECT * FROM product");
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


            <table width="100%" style="margin-left:-50px;">
                <tr id="tableHeader">
                    <td>Naam</td>
                    <td>Beschrijving</td>
                    <td>Eig1</td>
                    <td>Eig2</td>
                    <td>Eig3</td>
                    <td>Eig4</td>
                    <td>Voorraad</td>
                    <td>Categorie</td>
                    <td>Prijs</td>
                    <td>Korting</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php

    while($row = mysqli_fetch_assoc($query))
    {
        $id = $row['ID'];
                ?>
                <form method="POST" action="productBeheer.php?id=<?php echo $id; ?>" >
                    <tr>
                        <td><a href=singlePage.php?id=<?php echo $row['ID'] ?> style="color:black;"><input type="text" name="Naam" value="<?php echo $row['Naam'] ?>"></td>
                        <td><input type="text" name="Beschrijving" value="<?php echo $row['Beschrijving'] ?>"></td>
                        <td><input type="text" name="Eig1" value="<?php echo $row['eig1'] ?>"></td>
                        <td><input type="text" name="Eig2" value="<?php echo $row['eig2'] ?>"></td>
                        <td><input type="text" name="Eig3" value="<?php echo $row['eig3'] ?>"></td>
                        <td><input type="text" name="Eig4" value="<?php echo $row['eig4'] ?>"></td>
                        <td><input type="text" name="Voorraad" value="<?php echo $row['Voorraad'] ?>"></td>
                        <td><select name="Categorie">
                            <option value="<?php echo $row['Categorie'] ?>" selected><?php echo $row['Categorie'] ?></option>
                            <?php
                    $kwery = mysqli_query($conn, "SELECT Categorie FROM categorie WHERE Parent != ''");
        while($snow = mysqli_fetch_assoc($kwery)) {
            echo "<option value='" . $snow['Categorie'] . "'>" . $snow['Categorie'] . "</option> ";
        }
                            ?>
                            </select></td>

                        <td><input type="text" name="Prijs" value="<?php echo $row['Prijs'] ?>"></td>
                        <td><input type="text" name="Korting" value="<?php echo $row['Korting'] ?>" style=""></td>
                        <td><input type="submit" name="submit" value="Bewerken"></td>
                        <td><a href="categorieen.php?id=<?php echo $id ?>"> <input type="submit" name="delete" value="Verwijderen" ></a></td>

                    </tr>

                </form>
                <?php
    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2"><a href="editPage.php" style="color:black;"><button action="editPage.php">Product toevoegen +</button></a></td>
                    <td></td>

                </tr>
            </table>

        </div>
        <?php include_once("footer.html") ?>
    </body>

</html>