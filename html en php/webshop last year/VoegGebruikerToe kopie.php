<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="header.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
a {
	text-decoration:none;
}</style>
<body><center><?php
//=============Configuring Server and Database=======
$host        =    'localhost';
$user        =    'root';
$password    =    '';
$database    =    'phpopdracht';
$conn        =    mysqli_connect($host,$user,$password, $database) or die('Server Information is not Correct');

$Gebruikersnaam    =    mysqli_real_escape_string($conn, $_POST['username']);
$Wachtwoord    =    mysqli_real_escape_string($conn, $_POST['password']);
if(isset($_POST['username']))
{
$sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord)
VALUES ('$Gebruikersnaam', md5('$Wachtwoord'))";

       if ($conn->query($sql) === TRUE) 
	   {
	   } 
		else 
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
$conn->close();
header("location: HomePage.php");
} 
	

?></center>
  </div></div>
  </div><center>
<footer>
<p>© TeamNaamloos2016V2</p>
</footer></center>
</body>
</html>