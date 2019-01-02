
<?php
$conn = mysqli_connect("localhost", "root", "");
//Selecting Database
$db = mysqli_select_db($conn, "phpopdracht");
//sql query to fetch information of registerd user and finds user match.


if(isset($_POST['submit']))
{
    if(isset($_GET['id'])){
        $var = $_GET['id']; //some_value
        mysqli_query($conn,"UPDATE categorie SET Categorie = '" . $_POST["categorie"] . "', Parent = '" . $_POST['parent'] . "' WHERE ID = $var;");
    }
}

if(isset($_POST['delete'])) {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        mysqli_query($conn,"DELETE FROM categorie WHERE id = $id");
    }
}


if(isset($_POST['addCat']))
{
    mysqli_query($conn,"INSERT INTO categorie (Categorie, Parent) VALUES ('" . $_POST['addBox'] . "', '" . $_POST['subCat'] . "')");
}

$query = mysqli_query($conn, "SELECT * FROM categorie");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/categorie.css">

</head>

<body>
    <?php include_once("header/header.php") ?>
    <div id="categorieBeheer">


            <table width="100%">
                <tr>
                    <span class="categorieHeader">Categorie</span><span style="margin-left: 100px;" class="categorieHeader">Parent</span>
                </tr>
                <tr>

                        <form method="POST" action="categorieen.php" >
                            <td style="text-align:right">
                            <input type="text" name="addBox">
                            </td>
                            <td>
                            <input  type="text" name="subCat">
                            </td>
                            <td>
                            <input type="submit" name="addCat" value="Categorie toevoegen + ">
                            </td>
                        </form>
                    </td>


                </tr>
                <?php

                while($row = mysqli_fetch_assoc($query))
                {
                    $id = $row['ID'];
                    $categorie = $row['Categorie'];
                    $parent = $row['Parent'];
                    ?>
                    <form method="POST" action="categorieen.php?id=<?php echo $id; ?>" >
                        <tr>
                            <td><input type="text" name="categorie" value="<?php echo $categorie ?>"></td>
                            <td><input type="text" name="parent" value="<?php echo $parent ?>"></td>
                            <td><input type="submit" name="submit" value="Opslaan"></td>
                            <td><input type="submit" name="delete" value="Verwijderen" ></td>

                        </tr>
                    </form>
                    <?php
                }

                ?>
            </table>

    </div>
    <?php include_once("footer.html") ?>
</body>

</html>