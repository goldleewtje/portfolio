<?php
session_start();

if(isset($_SESSION['functie'])){
    $functie = $_SESSION['functie'];
} else {
    $functie = "";
}

session_write_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link rel="stylesheet" type="text/css" href="style/pc4uOpmaak.css" />
    </head>

    <?php
    $host        =    'localhost';
    $user        =    'root';
    $password    =    '';
    $database    =    'phpopdracht';
    $conn        =    mysqli_connect($host,$user,$password, $database);

    if(isset($_GET['var'])) {
        $sql = "Select * from product WHERE categorie = '" . $_GET['var'] . "'";
    } else {
        $sql = "Select * from product";
    }
    if(isset($_POST['uitloggen'])) {
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
    }


    $result = mysqli_query( $conn, $sql);


    ?>	
    <body>
        <style>
            #catlist
            {
                background-color:#D8D8D8;
            }</style>
        <?php include("header/header.php")?>
        <?php
    while ($row = mysqli_fetch_assoc($result))
    { ?>

        <div style="width: 100px; height: 260px; float:left; margin-left:60px;">
            <table width='200px' border='0' style='margin-top:15px; margin-left:30px;'>
                <tr style="margin-left:20px;" >
                    <?php if(($row['imglocation']) != "")
    {?>
                    <a href="singlePage.php?id=<?php echo $row['ID'];?>"> <img style="width:107px; height:102px;" src="<?php echo $row['imglocation']; ?>" id="hoofdImg"> </a>
                    <?php  }
     else
     {?>
                    <a href="singlePage.php?id=<?php echo $row['ID'];?>"><img src="images/logo.PNG" id="hoofdImg"></a>
                    <?php } ?>
                <tr> <th class='Producten'><?php echo $row['Naam']?> </th> </tr>
                <tr> <th class='Producten'><?php echo $row['eig1']?> </th> </tr>
                <tr> <th class='Producten'><?php echo $row['eig2']?> </th> </tr>
                <tr> <th class='Producten'><?php echo $row['eig3']?> </th> </tr>
                <tr> <th class='Producten'><?php echo $row['eig4']?> </th> </tr>
                <?php if($row['Korting'] == 0) { ?>
                <tr> <th class='Producten'>€<?php echo  $row['Prijs']?> </th> </tr>
                <?php } else { ?>
                <tr> <th style="text-decoration: line-through;" class='Producten'>€<?php echo  $row['Prijs']?> </th> </tr>
                <tr> <th class='Producten'>€<?php echo  $row['Prijs'] - $row['Korting']?> </th> </tr>
                <?php } ?>
                <br>
            </table>
        </div>
        <?php }   ?>
        <?php
        if($functie == "administrator") {
            if(isset($_GET['var'])) {
                $categorie = $_GET['var'];
            }
        ?> <a style="margin-top 40px; float: left; margin: 40px;" href="editPage.php?Categorie=<?php echo $categorie; ?>"> <button>Product toevoegen</button></a> <?php
        }
        ?>
        <div style="width:100%; clear:both;"></div>
        <a style="text-align:center;" href="#"><p>Laad meer....</p></a> 
        <div style="width:100%; clear:both;"></div>
        <?php include("Footer.html");
        
        if(isset($_GET['alert']))
        {
        echo "<script> alert('Reparatie Aangevraagd');</script>";
        }
        ?>
    </body>
</html>




