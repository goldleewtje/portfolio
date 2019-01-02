<?php
session_start();
if(isset($_SESSION['functie'])){
    $functie = $_SESSION['functie'];
} else {
    $functie = "";
}

session_write_close();
include_once("Utility.php");
$database = new database;
$database->connectDatabase();
    if(isset($_GET['id'])){

        $row = $database->getDataRow("SELECT * FROM product WHERE ID = " . $_GET['id'] . " ");
		$images = $database->getDataRow("SELECT Location FROM images WHERE ID = '2'");
        $id = $row['ID'];

        setcookie("rowPrijs",  $row['Prijs'], time() + (86400 * 30), "/");
        setcookie("rowKorting",  $row['Korting'], time() + (86400 * 30), "/");
        setcookie("rowNaam",  $row['Naam'], time() + (86400 * 30), "/");
		setcookie("rowId",  $row['ID'], time() + (86400 * 30), "/");
        if(isset($_COOKIE["Winkelmand"]))
        {

        }
        else
        {
            $cookieValue = '';
            setcookie("Winkelmand", "somehting", time() + (86400 * 30), "/");
        }
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/singlePage.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>Title</title>
</head>
<body>
    <?php include('header/header.php');
    if($functie == "administrator") {
        ?> <a style="float: right; margin: 40px;" href="editPage.php?id=<?php echo $id; ?>"> <button>Bewerken</button></a> <?php
    }
    ?>

    <div id="singlePageContent">
        <div id="div1">
             <?php  if($row['imglocation'] != "")
{?>
                <img src="<?php echo $row['imglocation'];?>" id="hoofdImg">
                <?php  }else
{?>
                <img src="images/logo.PNG" id="hoofdImg">
                <?php } ?>
        </div>
        <div id="div2">
            <p class="groteText"><?php echo $row['Naam'] ?></p>
            <p class="normaleText"><?php echo $row['eig1'] ?><br><?php echo $row['eig2'] ?><br><?php echo $row['eig3'] ?><br><?php echo $row['eig4'] ?></p>
            <?php if($row['Korting'] == 0) { ?>
                <br><br><p class="normaleText" style="text-align: right;">€<?php echo $row['Prijs'] ?>,-</p><br>
            <?php } else { ?>
                <br><br><p class="normaleText" style="text-decoration: line-through; text-align: right;">€<?php echo $row['Prijs'] ?>,-</p>
                <p class="normaleText" style="text-align: right;">€<?php echo $row['Prijs'] - $row['Korting']; ?>,-</p><br>
            <?php } ?>

            <br><p class="normaleText" style="text-align: right;"><?php if($row['Voorraad'] > 0) {echo "Op voorraad";} else {echo "Niet op voorraad";}; ?></p>
            <form action="winkelmandje.php" method="post">
                <input type="submit" id="winkelButton" value="In winkelmandje">
            </form>
        </div>
        <div id="div3">
            <p class="groteText">Omschrijving</p>
            <p class="normaleText"><?php echo $row['Beschrijving'] ?></p>
        </div>

    </div>
    <?php include('footer.html') ?>
</body>
</html>