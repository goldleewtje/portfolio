<?php
session_start();
include_once("Utility.php");
$database = new database;
$database->connectDatabase();
    if(isset($_GET['id'])){
        $row = $database->getDataRow("SELECT * FROM product WHERE ID = " . $_GET['id'] . " ");
		setcookie("rowPrijs",  $row['Prijs'], time() + (86400 * 30), "/");
		setcookie("rowNaam",  $row['Naam'], time() + (86400 * 30), "/");
		if(isset($_COOKIE["Winkelmand"]))
		{
				
		}
		else
		{
		setcookie("Winkelmand", "null", time() + (86400 * 30), "/");
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
    <?php include('header/header.php') ?>
    <div id="singlePageContent">
        <div id="div1">
            <img src="https://www.paradigit.nl/picture/80048777/380/300" id="hoofdImg">
            <img src="https://www.paradigit.nl/picture/80048777/380/300" class="kleinImg">
            <img src="https://www.paradigit.nl/picture/80048777/380/300" class="kleinImg">
            <img src="https://www.paradigit.nl/picture/80048777/380/300" class="kleinImg">
        </div>
        <div id="div2">
            <p class="groteText"><?php echo $row['Naam'] ?></p>
            <p class="normaleText"><?php echo $row['eig1'] ?><br><?php echo $row['eig2'] ?><br><?php echo $row['eig3'] ?><br><?php echo $row['eig4'] ?></p>
            <br><br><p class="normaleText" style="text-align: right;">€<?php echo $row['Prijs'] ?>,-</p>
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