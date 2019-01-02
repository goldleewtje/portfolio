<?php
class users
{
    private $userID;
    private $email;
    private $username;
    private $password;
    private $firstName;
    private $middle;
    private $lastName;
    private $street;
    private $number;
    private $zipCode;
    private $function;
    private $phoneNumber;

    /*private function __construct()
    {

    }*/

    function authenticate()
    {

    }

    function fillUser($userID)
    {
        $conn = mysqli_connect("localhost", "root", "");
        //Selecting Database
        $db = mysqli_select_db($conn, "phpopdracht");
        //sql query to fetch information of registerd user and finds user match.
        $query = mysqli_query($conn, "SELECT * FROM gebruikers WHERE GebruikerID = $userID");
        $row = mysqli_fetch_assoc($query);
        $this->userID = $row['GebruikerID'];
        $this->email = $row['Email'];
        $this->username = $row['gebruikersnaam'];
        $this->password = $row['wachtwoord'];
        $this->function = $row['functie'];
        $this->firstName = $row['Voornaam'];
        $this->lastName = $row['Achternaam'];
        $this->middle = $row['Tussenvoegsel'];
        $this->street = $row['Straat'];
        $this->number = $row['HuisNr'];
        $this->zipCode = $row['Postcode'];
        $this->phoneNumber = $row['Telefoonnummer'];
    }

    function addUser($database, $userArray)
    {
        $database->customQuery("INSERT INTO gebruikers (Email, gebruikersnaam, Voornaam, Achternaam, Tussenvoegsel, Straat, HuisNr, Postcode, Telefoonnummer, wachtwoord)
        VALUES ('$userArray[0]', '$userArray[1]', '$userArray[2]', '$userArray[3]', '$userArray[4]', '$userArray[5]', '$userArray[6]', '$userArray[7]', '$userArray[8]', '" . md5($userArray[9]) . "')");
    }

    function editUser($database, $userID, $userArray)
    {
        if(md5($userArray[9]) == md5("")) {
            $database->customQuery("UPDATE gebruikers SET Email = '" . $userArray[0] . "',
                                                      gebruikersnaam = '" . $userArray[1] . "',
                                                      Voornaam = '" . $userArray[2] . "',
                                                      Achternaam = '" . $userArray[3] . "', 
                                                      Tussenvoegsel = '" . $userArray[4] . "', 
                                                      Straat = '" . $userArray[5] . "',
                                                      HuisNr = '" . $userArray[6] . "',
                                                      Postcode = '" . $userArray[7] . "',
                                                      Telefoonnummer = '" . $userArray[8] . "' 
                                                      WHERE GebruikerID = $userID;");
        } else {
            $database->customQuery("UPDATE gebruikers SET Email = '" . $userArray[0] . "',
                                                      gebruikersnaam = '" . $userArray[1] . "',
                                                      Voornaam = '" . $userArray[2] . "',
                                                      Achternaam = '" . $userArray[3] . "', 
                                                      Tussenvoegsel = '" . $userArray[4] . "', 
                                                      Straat = '" . $userArray[5] . "',
                                                      HuisNr = '" . $userArray[6] . "',
                                                      Postcode = '" . $userArray[7] . "',
                                                      Telefoonnummer = '" . $userArray[8] . "',
                                                      wachtwoord = '" . md5($userArray[9]) . "'
                                                      WHERE GebruikerID = $userID;");
        }

    }

    function setFunction($database, $userID, $function) {
        $database->customQuery("UPDATE gebruikers SET functie = '" . $function . "'
                                                      WHERE GebruikerID = $userID;");
        $this->function = $function;
    }

    function forgotPassword()
    {

    }

    function getTransactionHistory()
    {

    }

    function getShoppingCartProducts()
    {

    }

    function startSession()
    {

    }

    function checkSession()
    {

    }

    function logout()
    {

    }

    function getUserId()
    {
        return $this->userID;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getMiddle()
    {
        return $this->middle;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getStreet()
    {
        return $this->street;
    }

    function getNumber()
    {
        return $this->number;
    }

    function getZipCode()
    {
        return $this->zipCode;
    }

    function getFunction()
    {
        return $this->function;
    }

    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    function getEmail()
    {
        return $this->email;
    }
}