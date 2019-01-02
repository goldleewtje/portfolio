<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 4/16/2018
 * Time: 11:03 AM
 */

//connectie met de database
include_once("Utility.php");
include_once("users.php");
$database = new database;
$users = new users;
$database->connectDatabase();
session_start();
$userID = $_SESSION['id'];
session_write_close();
if(isset($userID))
{

    /*$userArray = [$_POST["inp1"], $_POST["inp2"], $_POST["inp3"], $_POST["inp4"], $_POST["inp5"], $_POST["inp6"], $_POST["inp7"],
        $_POST["inp8"], $_POST["inp9"], $_POST["inp10"]];
    $users->editUser($database, $userID, $userArray);*/
    //$database->updateQuery("UPDATE gebruikers SET Email = '" . $_POST["inp1"] . "' WHERE GebruikerID = 1;");
    $database->customQuery("INSERT INTO factuur (klantID, datum)
			VALUES ($userID, '" . date("Y/m/d") . "') ");

    $factuurRow = $database->getDataRow("SELECT * FROM factuur ORDER BY ID DESC LIMIT 1");

    $Product = json_decode($_COOKIE["Winkelmand"]);
    for($x = 0; $x < count($Product); $x++) {
        $productID = $Product[$x][2];
        $database->customQuery("INSERT INTO factuurregels (productID, aantal, factuurID)
			VALUES ($productID, 1, " . $factuurRow['ID'] . ") ");
    }
    header("location: cookieverwijderen.php");
} else {
    header("location: HomePage.php");
}
//$users->fillUser($userID);