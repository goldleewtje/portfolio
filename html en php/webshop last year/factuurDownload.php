<?php
?>
<html>
    <head>
    </head>
    <body>
    </body>
    <?php
		$conn = mysqli_connect("localhost", "root", "");
		//Selecting Database
		$db = mysqli_select_db($conn, "phpopdracht");
		//sql query to fetch information of registerd user and finds user match.
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
		}

		if(isset($_GET['id'])) {
		$factuurID = $_GET['id'];
		$query = mysqli_query($conn, "SELECT * FROM factuurregels WHERE factuurID = $factuurID ");
		}
		
		$row = mysqli_fetch_assoc($query);
		$ID = $row['productID'];
		print_r($ID);
		$ProductID = mysqli_query($conn, "SELECT * FROM product WHERE ID = $ID ");
		$test = mysqli_fetch_assoc($ProductID);
		$myfile = fopen("factuur.txt", "w") or die("unable to open file");
		print_r($test);
		foreach($row as $value)
		{		
				$txt = "Productnaam:";
				fwrite($myfile, $txt);
				$txt = " ";
				fwrite($myfile, $txt);
				$txt = "Aantal:";
				fwrite($myfile, $txt);
				$txt = " ";
				fwrite($myfile, $txt);
				$txt = "totaal bedrag:";
				fwrite($myfile, $txt);
				$txt = PHP_EOL;
				fwrite($myfile, $txt);
				
				
				$txt = $test['Naam'];
				fwrite($myfile, $txt);
				$txt = " 	";
				fwrite($myfile, $txt);
				$txt = (string) $value['aantal'];
				fwrite($myfile, $txt);
				$txt = " 	";
				fwrite($myfile, $txt);
				$aantal = $value['aantal'];
				$totaalPrijs = $aantal*$test[0];
				$txt = $totaalPrijs;
				fwrite($myfile, $txt);
				$txt = PHP_EOL;
				fwrite($myfile, $txt);
				
		}
		readfile('factuur.txt');
		//header("location: cookieverwijderen.php");
	?>
   

</html>