<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Naamloos document</title>
</head>

<body>
<?php
   // turn error reporting on, it makes life easier if you make typo in a variable name etc
    error_reporting(E_ALL);

    session_start();

    //Start Database
    $IP = "localhost";
    $user = "root";
    $pass = "";
    $db = "phpopdracht";
    $con = mysqli_connect($IP, $user, $pass, $db);

    // Check connection
    if (!$con) {
        echo "<div>";
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "</div>";

        // *** what happens here, you let the script continue regardless of the error?
    }

    // Pretty much kicks out a user once they revisit this age and is logged in

    // *** It is best to test isset($_SESSION["name"]), otherwise php will generate a warning if 'name' index is not set.
    // you can also test for !empty($_SESSION["name"]), as empty detects if a value is not set, but it will also detect 0 as empty, so use with caution
    // if( $_SESSION["name"] )
    if( isset($_SESSION["name"]) && $_SESSION["name"] )
    {
        echo "You are already logged in, ".$_SESSION['name']."! <br> I'm Loggin you out M.R ..";
        unset( $_SESSION );
        session_destroy();

        // *** The empty quotes do nothing
        // exit("");
        exit;
    }

    $loggedIn = false;

    // *** While or is nice solution, it doesn't take into account when the 'name' index is not set, which generates a php warning
    // $userName = $_POST["name"] or "";
    $userName = isset($_POST["gebruiker"]) ? $_POST["gebruiker"] : null;

    // *** same change as above
    // $userPass = $_POST["pass"] or "";
    $userPass = isset($_POST["wachtwoord"]) ? $_POST["wachtwoord"] : null;

    // *** This test really comes down to, what if username or password is evaluated to false.
    // have a good think about what it is you are actually testing
			    // php casts strings and numeric values to boolean, so something that you don't think is false could be cast as false, eg a string containing "0"
    if ($userName && $userPass )
    {
        // User Entered fields
        // plenty of info on sql injection and mysqli and improve it
        $query = "SELECT GebruikerID, gebruikersnaam, wachtwoord, functie FROM gebruikers WHERE gebruikersnaam = '$userName' AND Wachtwoord = '".md5($userPass)."'";
		$functie = "SELECT functie FROM gebruikers WHERE gebruikersnaam = '$userName'";

        $result = mysqli_query( $con, $query);
		$faal = mysqli_query($con, $functie);

        // *** Error checking, what if !$result? eg query is broken
		
		while ($rij=mysqli_fetch_assoc($faal))
			{
				$test = $rij['functie'];
			}
		
        $row = mysqli_fetch_array($result);
		
        if(!$row){
            echo "<div>";
			echo $row;
            echo "No existing user or wrong password.";
            echo "</div>";
        }
        else {
            // *** My PERSONAL preference is to use {} every where, it just makes it easier if you add  
            // code into the condition later
            $loggedIn = true;
        }
    }

    if ( $loggedIn = true )
    {
		$_SESSION['id'] = $row["GebruikerID"];
		$_SESSION['name'] = $row["gebruikersnaam"];
		$_SESSION['functie'] = $row["functie"];
		header("location: HomePage.php");
        
    }
?>
</body>
</html>
