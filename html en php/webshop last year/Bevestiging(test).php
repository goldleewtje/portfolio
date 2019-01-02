<?php
?>
<html>
    <head>
    </head>
    <body>
    </body>
    <?php

	
		$myfile = fopen("factuur.txt", "w") or die("unable to open file");
		print_r(json_decode($_COOKIE['Winkelmand']));
		foreach(json_decode($_COOKIE['Winkelmand']) as $value)
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
				
				
				$txt = $value[1];
				fwrite($myfile, $txt);
				$txt = " 	";
				fwrite($myfile, $txt);
				$txt = "1";
				fwrite($myfile, $txt);
				$txt = " 	";
				fwrite($myfile, $txt);
				$totaalPrijs = 1*$value[0];
				$txt = "€" + $totaalPrijs;
				fwrite($myfile, $txt);
				$txt = PHP_EOL;
				fwrite($myfile, $txt);
				
		}
		//header("location: cookieverwijderen.php");
	?>
   

</html>