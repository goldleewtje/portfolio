<?php

setcookie("Winkelmand", "", time() + (86400 * 30), "/");
$Prijs = $_COOKIE['rowPrijs'];
$Naam= $_COOKIE['rowNaam'];
$dataArray = array($Prijs, $Naam);

//check of de Cookie actief is.
if(isset($_COOKIE["Winkelmand"]) && $_COOKIE["Winkelmand"] ==  NULL)
{
	//print_r(json_decode($_COOKIE["Winkelmand"], true));
	$winkelmand = json_decode($_COOKIE["Winkelmand"], true);	
	
	$winkelmand = array_push($winkelmand, $dataArray);
	echo "<p> test</p>";
	
	$winkelmand = json_encode($winkelmand);
	echo "test";
	setcookie("Winkelmand", $winkelmand, time() + (86400 * 30), "/");
}

else
{
	$winkelmand = array();	
	
	$winkelmand = $dataArray;
	
	$winkelmand = json_encode($winkelmand);
	
	setcookie("Winkelmand", $winkelmand, time() + (86400 * 30), "/");
}

//print_r($_SESSION["Winkelmand"]);
//unset
//header("location: HomePage.php");

