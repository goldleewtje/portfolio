<?php

$Prijs = $_COOKIE['rowPrijs'];
$Korting = $_COOKIE['rowKorting'];
$Naam = $_COOKIE['rowNaam'];
$id = $_COOKIE['rowId'];
$dataArray = array($Prijs - $Korting, $Naam, $id);
$winkelmand = array();
//check of de Cookie actief is.
if(isset($_COOKIE["Winkelmand"]) && $_COOKIE["Winkelmand"] != "somehting")
{
	//print_r(json_decode($_COOKIE["Winkelmand"], true));
	$winkelmand = json_decode($_COOKIE["Winkelmand"], true);	
	
	array_push($winkelmand, $dataArray);
	echo "<p> test</p>";
	
	$winkelmand = json_encode($winkelmand);
	setcookie("Winkelmand", $winkelmand, time() + (86400 * 30), "/");
}

else
{
	$winkelmand = array(' ');	
	
	array_push($winkelmand, $dataArray);
	
	array_shift($winkelmand);	
	
	$winkelmand = json_encode($winkelmand);
	echo json_encode($winkelmand);
	setcookie("Winkelmand", $winkelmand, time() + (86400 * 30), "/");
}

//print_r($_SESSION["Winkelmand"]);
//unset
	header("location: HomePage.php");

