<?php
$conn = mysqli_connect("localhost","root","", "phpopdracht");
$conn->query("INSERT INTO productreparaties ( Product, Beschrijving, telefoonnummer) VALUES('" .$_POST['Product']."','" .$_POST['Beschrijving']."'," .$_POST['telefoonnummer'].")");
header("Location: homePage.php?alert=1");
?>