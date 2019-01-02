<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>

        <meta charset="UTF-8"> 
    </head>
    <body>
        <div id="container">

            <div id="result"></div>
            <div id="base">
                <div id="logo" class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                    <img src="res/logo.PNG">
                </div>
                <div id="zoeken" class="col-lg-5 col-md-4 col-sm-4 col-xs-3">
                    <input type="text" placeholder="<?php echo"test"; ?>">
                </div>

                <div id="inloggen" class="col-lg-2 col-md-2 col-sm-2 col-xs-3">


                    <div>
                        <button type="button" id="login" class="inloggentext">Login</button>
                    </div>
                    <div id="inlogform" class="hide">
                        <form action="/echo/html/" id="popForm" method="get">
                            <div>
                                <label for="email">Email:</label>
                                <input type="email" name="username" id="username" class="form-control input-md">
                                <label for="name">Password:</label>
                                <input type="password" name="password" id="password" class="form-control input-md">
                                <button style="margin-top: 5px;" type="button" class="btn btn-primary" data-loading-text="Sending info.."><em class="icon-ok"></em> Login</button>
                                <a href="registeren.html" style="font-size: 12px;">Registreren</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="winkelwagen"  class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
                    <button class="winkelbutton">
                        <img src="res/winkelwagen.png">

                    </button> 
                </div>
                <div id="mand" class="hide">
                    <form action="/echo/html/" id="popForm" method="get">
                        <div>
                            <table>
                                <tr>
                                    <th>Naam</th>
                                    <th>Prijs</th>
                                    <th>Aantal</th>
                                    <th>Totaal</th>
                                </tr>
                                <tr>
                                    <td>MSI Laptop</td>
                                    <td> $500,-</td>
                                    <td> 3</td>
                                    <td>$1500,-</td>
                                </tr>
                                <tr>
                                    <td>Wasmachine</td>
                                    <td> $200,-</td>
                                    <td> 5</td>
                                    <td>$1000,-</td>
                                </tr>
                                <tr>
                                    <td>Totaal: </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>$2500,-</td>
                                </tr>
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
                    <img src="res/homeicon.png">
                </div>
                <div id="catlist">
                    <ul class="horizontallist">
                        <?php $systemen = array("24 Inch laptops", "17.3 Inch laptops", "15.6 Inch laptops");  ?>
                        <?php $randapparatuur = array("Monitoren", "Speakers", "Toetsenbord", "Muizen");  ?>
                        <?php $onderdelen = array("Video Kaarten", "Processoren", "Opslag", "Geheugen", "Behuizingen");  ?>
                        <button class="button1"> Systemen </button>
                        <div id="desktops" class="hide">
                            <ul style="padding:0px">
                                <?php foreach($systemen as $item)
{
    echo "<a>",$item,"</a><br>";
}
                                ?>
                            </ul>
                        </div> 
                        <button class="button2"> Randapparatuur </button> 

                        <div id="randapparatuur" class="hide">
                            <ul style="padding:0px">
                                <?php foreach($randapparatuur as $item)
{
    echo "<a>",$item,"</a><br>";
}
                                ?>
                                <form action="product.php" method="get"> <a name="cat" value="Test">Test</a> </form>
                            </ul>
                        </div>
                        <button class="button3"> Onderdelen </button>
                        <div id="onderdelen" class="hide">
                            <ul style="padding:0px">
                                <?php foreach($onderdelen as $item)
{
    echo "<a>",$item,"</a><br>";
}
                                ?>
                            </ul>
                        </div> 
                        <button href="reparatie.html"> Reparatie </button>

                    </ul>
                </div>
            </div>

        </div>
        <script src="js/header.js"></script>
    </body>
</html>