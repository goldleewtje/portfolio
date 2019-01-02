<?php


$host        =    'localhost';
$user        =    'root';
$password    =    '';
$database    =    'phpproject';
$conn        =    mysqli_connect("localhost","root","", "phpopdracht");

if(isset($_GET['add']))
{
    $add = "INSERT INTO product (Naam, eig1, eig2, eig3,eig4 ,Prijs ,Beschrijving ,Korting ,Categorie, Voorraad)
                     VALUES ('". $_GET['Naam']. "',
                             '". $_GET['Eig1']. "',
                             '". $_GET['Eig2']. "',
                             '". $_GET['Eig3']. "',
                             '". $_GET['Eig4']. "',
                             '". $_GET['Prijs']. "',
                             '". $_GET['Omschrijving']. "',
                             '". $_GET['Korting']. "',
                             '". $_GET['Categorie']. "',
                             '". $_GET['Voorraad']. "')";
    if($conn->query($add))
    {
        $lastid = $conn->insert_id;
    }
    $sql = "SELECT * FROM product WHERE ID = " . $lastid . " ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

}
else if(isset($_GET['Wijzig']))
{
    $updatequery = "UPDATE product SET Naam = '" . $_GET["Naam"] . "', 
        Beschrijving = '" . $_GET['Omschrijving'] . "', 
        eig1 = '" . $_GET['Eig1'] . "',
        eig2 = '" . $_GET['Eig2'] . "',
        eig3 = '" . $_GET['Eig3'] . "',
        eig4 = '" . $_GET['Eig4'] . "',
        Voorraad = '" . $_GET['Voorraad'] . "',
        Categorie = '" . $_GET['Categorie'] . "',
        Prijs = '" . $_GET['Prijs'] . "',
        Korting = '" . $_GET['Korting'] . "'
        WHERE ID = ". $_GET['id'] . "";
    mysqli_query($conn,$updatequery);
    echo $updatequery;
    $row['Naam'] = $_GET["Naam"];
    $row['eig1'] = $_GET['Eig1'];
    $row['eig2'] = $_GET['Eig2'];
    $row['eig3'] = $_GET['Eig3'];
    $row['eig4'] = $_GET['Eig4'];
    $row['Prijs'] = $_GET['Prijs'];
    $row['Korting'] = $_GET['Korting'];
    $row['Beschrijving'] = $_GET['Omschrijving'];
    $row['Voorraad'] =  $_GET["Voorraad"];
    $row['Categorie'] = $_GET['Categorie'];
    $row['imglocation'] = $_GET['imglocation'];
    $lastid = $_GET['id'];
}
else if(isset($_GET['id']))
{
    $sql = "SELECT * FROM product WHERE ID =" . $_GET['id'] . "";
    $lastid = $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

}
else 
{
    $row['Naam'] = "";
    $row['eig1'] = "";
    $row['eig2'] = "";
    $row['eig3'] = "";
    $row['eig4'] = "";
    $row['Prijs'] = "";
    $row['Korting'] = "";
    $row['Beschrijving'] = "";
    $row['Voorraad'] = "";

}

//}
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
        <?php include("header/header.php"); ?>
        <div id="singlePageContent" style="width:100%">
            <div id="div1">
                 <img src="<?php echo $row['imglocation'] ?>" id="hoofdImg">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Upload een foto voor het product:
                    <input style="display:none;" name="imglocation" value="<?php echo $row['imglocation']; ?>">
                    <input style="display:none;" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                    <input type="submit" value="Delete Image" name="delete">
                </form>
            </div>
            <div id="div2" style="float:left;">
                <table>
                    <tr>
                        <td>
                            <span class="groteText"> Naam</span>
                        </td>
                        <td>
                            <form method="GET" id="frm">
                                <input name="Naam" style="float:right;" class="groteText" value="<?php echo $row['Naam']?>">
                                </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Eig1</span>
                        </td>
                        <td>
                            <input  name="Eig1" class="normaleText" value="<?php echo $row['eig1']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Eig2</span>
                        </td>
                        <td>
                            <input name="Eig2"  class="normaleText" value="<?php echo $row['eig2']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Eig3</span>
                        </td>
                        <td>
                            <input name="Eig3" class="normaleText" value="<?php echo $row['eig3']?>">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Eig4</span>
                        </td>
                        <td>
                            <input name="Eig4" class="normaleText" value="<?php echo $row['eig4']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Prijs </span>
                        </td>
                        <td>
                            <input name="Prijs" class="normaleText" value="<?php echo $row['Prijs']; ?> ">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Voorraad</span>
                        </td>
                        <td>
                            <input name="Voorraad" class="normaleText" value="<?php echo $row['Voorraad']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="normaleText"> Korting</span>
                        </td>
                        <td>
                            <input name="Korting" class="normaleText" value="<?php echo $row['Korting'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="normaleText">Categorie</td>
                        <td><select form="frm" style="width:247px;" class="normaleText" name="Categorie">
                            <option value="
                                           <?php if(!isset($_GET['Categorie'])) {echo $row['Categorie'];}
                                   else if(isset($_GET['Categorie']))
                                   {
                                       echo $_GET['Categorie'];
                                   }
                                   else
                                   {
                                       echo " ";
                                   }
                                           ?>" selected>
                                <?php if(!isset($_GET['Categorie'])) {echo $row['Categorie'];}
                                else if(isset($_GET['Categorie']))
                                {
                                    echo $_GET['Categorie'];
                                }
                                else
                                {
                                    echo " ";
                                }
                                ?></option>
                            <?php
                            $kwery = mysqli_query($conn, "SELECT Categorie FROM categorie WHERE Parent != ''");
                            while($snow = mysqli_fetch_assoc($kwery)) {
                                echo "<option value='" . $snow['Categorie'] . "'>" . $snow['Categorie'] . "</option> ";
                            }
                            ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color:white;">o</p>
                            <input name="id" value="<?php echo $lastid; ?>" style="width:0px; height:0; border:none;">
                             <input name="imglocation" value="<?php echo $row['imglocation']; ?>" style="width:0px; height:0; border:none;">
                        </td>
                        <td>
                            <p style="color:white;">o</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="<?php if(isset($_GET['id'])){echo "Wijzig";}else{echo "add";} ?>" style="width:100%;" id="winkelButton"><?php if(isset($_GET['id'])){echo "Wijzig";}else{echo "Toevoegen";} ?></button>

                        </td>

                        <td>
                            <a href="singlePage.php?id=<?php echo $lastid; ?>"><input type="button"  value="Terug" style="width:50%; float:right;" id="winkelButton"> </a>
                        </td>
                    </tr>
                </table>

            </div>
            <div id="div3">
                <p class="groteText">Omschrijving</p>
                <textarea form="frm" name="Omschrijving" style="width:600px; height:300px; resize:none;" class="normaleText"><?php echo $row['Beschrijving'] ?></textarea>
                </form>
        </div>

        </div>

    <div style="width:100%; clear:both; margin-top:73px;"></div>
    <?php include("footer.html");
    ?>
    </body>
</html>