<html>
    <?php
    $mysqli = new mysqli("localhost","root", "", "phpopdracht");
	
    ?>
								
    <head>
        <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/header.css">
        <script src="javaScript/bootstrap.js"></script>
        <meta charset="UTF-8"> 
    </head>
    <body>	
        <div id="container">

            <div id="result"></div>
            <div id="base">
                <div id="logo" class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                    <a href="homePage.php"><img src="images/logo.PNG"></a> 
                </div>
                <div id="zoeken" class="col-lg-5 col-md-4 col-sm-4 col-xs-3">
                    <input type="text" placeholder="Zoeken...">
                </div>

                <div id="inloggen" class="col-lg-2 col-md-2 col-sm-2 col-xs-3">



                    <?php 
                    if(isset($_SESSION['id'])) //login session
                    {?>
                        <div>
                            <button type="button" id="login" class="inloggentext">Account</button>
                        </div>
                        <div id="inlogform" class="hide">
                            <form action="HomePage.php" id="popForm" method="POST">
                                <div>
                                    <button style="margin:5px 5px 5px 5px; width:150px;" type="submit" name="uitloggen" class="btn btn-primary">Uitloggen</button>
                                    <a href="profiel.php"> <button style="margin:5px 5px 5px 5px; width:150px;" type="button" class="btn btn-primary">Mijn account</button></a>
                                    <?php
                                    if($_SESSION['functie'] == "administrator") //admin session
                                    {?>

                                        <a href="productBeheer.php"> <button style="margin:5px 5px 5px 5px; width:150px;" type="button" class="btn btn-primary">Product beheer</button></a>
                                        <a href="categorieen.php"> <button style="margin:5px 5px 5px 5px; width:150px;" type="button" class="btn btn-primary">Categorie beheer</button></a>
                                        <a href="gebruikersBeheer.php"> <button style="margin:5px 5px 5px 5px; width:150px;" type="button" class="btn btn-primary">Gebruikers beheer</button></a>
                                    <?php }  ?>
                                </div>
                            </form>
                        </div>

                    <?php }
                    else
                    {?>
                        <div>
                            <button type="button" id="login" class="inloggentext">Login</button>
                        </div>
                        <div id="inlogform" class="hide">
                            <form action="checkLogin.php"id="popForm" method="POST">
                                <div>
                                    <label for="email">Gebruikersnaam</label>
                                    <input type="text" name="gebruiker" id="username" class="form-control input-md">
                                    <label for="name">Password:</label>
                                    <input type="password" name="wachtwoord" id="password" class="form-control input-md">
                                    <input style="margin-top: 5px;" type="submit" class="btn btn-primary" value="Login" type="submit">
                                    <a href="Registratie.php" style="font-size: 12px;">Registreren</a>
                                </div>
                            </form>
                        </div>

                    <?php 
					}
					?>

                </div>

                <div id="winkelwagen"  class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
                    <button class="winkelbutton">
                        <img src="images/winkelwagen.png">

                    </button> 
                </div>
                <div id="mand" class="hide">
                    <form action="/echo/html/" id="popForm" method="get">
                        <div>
                            <table>
                            <?php
							print_r(json_decode($_COOKIE["Winkelmand"], true));
									if(isset($_COOKIE["Winkelmand"]))
									{
									$Product = json_decode($_COOKIE["Winkelmand"]);
												echo '<tr>';
												echo '<td>' . $Product[1] . '</td>';
												echo '<td>' ;
												echo '<td> &#8364;' . $Product[0] . '</td>';
												echo '</tr>';
									}
								 ?>
                            </table>
                            <button style="margin-left:50%; transform: translate(-50%); margin-top:10px;" class="btn btn-primary"> Afrekenen</button>
                        </div>
                    </form>
                </div>


            </div>
            <div id="info">
                <p>Voor <span class="orange"> 23:59 </span> Besteld morgen in huis 
                    <span class="space delete2">oooooooooo</span>
                    <span class="orange delete2">7 </span>
                    <span class="delete2">Locaties </span> 
                    <span class="space delete2">oooooooooo</span> <span class="orange delete">Gratis </span> <span class="delete">retourneren</span>    </p> 
            </div>
            <div id="catbalk">
                <div id="homeknop">
                    <img src="images/homeicon.png">
                </div>
                <div id="catlist">
                    <ul class="horizontallist">
                        <?php   

                        $queryonderdelen = "SELECT Categorie FROM `categorie` WHERE Parent = \"onderdelen\"";
                        $resultonderdelen = $mysqli->query($queryonderdelen);

                        $querysystemen = "SELECT Categorie FROM `categorie` WHERE Parent = \"systemen\"";
                        $resultsystemen = $mysqli->query($querysystemen);


                        $queryrandapparatuur = "SELECT Categorie FROM `categorie` WHERE Parent = \"randapparatuur\"";
                        $resultrandapparatuur = $mysqli->query($queryrandapparatuur);

                        ?>
                        <button class="button1"> Systemen </button>
                        <div id="desktops" class="hide">
                            <ul style="padding:0px">
                                <?php 
                        foreach($resultsystemen as $systemen)
                        {
                            foreach($systemen as $categorie)
                            {
                                echo "<a href='homePage.php?var=",$categorie,"'>",$categorie,"</a><br>";
                            }
                        }
                                ?>
                            </ul>
                        </div> 
                        <button class="button2"> Randapparatuur </button> 

                        <div id="randapparatuur" class="hide">
                            <ul style="padding:0px">
                                <?php 
                        foreach($resultrandapparatuur as $randapparatuur)
                        {
                            foreach($randapparatuur as $categorie)
                            {
                                echo "<a href='homePage.php?var=",$categorie,"'>",$categorie,"</a><br>";
                            }
                        }
                                ?>
                                <form action="product.php" method="get"> <a name="cat" value="Test">Test</a> </form>
                            </ul>
                        </div>
                        <button class="button3"> Onderdelen </button>
                        <div id="onderdelen" class="hide">
                            <ul style="padding:0px">
                                <?php 
                        foreach($resultonderdelen as $onderdelen)
                        {
                            foreach($onderdelen as $categorie)
                            {
                                echo "<a href='homePage.php?var=",$categorie,"'>",$categorie,"</a><br>";
                            }
                        }
                                ?>
                            </ul>
                        </div> 
                        <button href="reparatie.html"> Reparatie </button>

                    </ul>
                </div>
            </div>

        </div>
        <script src="javaScript/header.js"></script>
    </body>
</html>