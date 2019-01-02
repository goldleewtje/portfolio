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

$why = "dafuq?";
$check = "SELECT * FROM gebruikers WHERE gebruikersnaam = '". $Gebruikersnaam."'";
 $dubbelCheck = mysqli_query($conn, $check);
 $dubbelCheck = mysqli_fetch_array($dubbelCheck);
if(isset($_POST['username']))
{
	//if($check['gebruikersnaam'] = true )
	//{
		if(!isset($dubbelCheck['gebruikersnaam'])/*$dubbelCheck['gebruikersnaam'] != $_POST['username']*//*$Gebruikersnaam*/)
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
			print_r($why);
		}
		else
		{
			print_r($Gebruikersnaam);
			//header("location: HomePage.php");
		}

	//}
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