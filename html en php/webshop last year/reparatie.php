<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style/reparatie.css">
        <title>Reparatie aanvragen</title>
    </head>

    <body>
        <?php include("header/header.php")?>
        <div id="repair">
            <form action="ReparatieToevoegen.php" id="form" method="post" style="
                                                                                    width:200px; 
                                                                                    margin: 0 auto;">
                <div style="margin-bottom:20px; margin-top:10px;">
                    <label for="Product">Product:</label>
                        <input type="text" name="Product" id="Product" class="form-control input-md" style="width:200px;" required>

                        <label for="Beschrijving">Beschrijving:</label>
                        <textarea form="form" style="width:300px; height:200px; resize:none;" type="text" name="Beschrijving" id="Beschrijving" class="form-control input-md" required> </textarea>
                        <label for="telefoonnummer"> Telefoonnummer:</label>
                        <input type="tel" name="telefoonnummer" id="telefoonnummer" class="form-control input-md" style="width:200px;" required>
                        <button type="submit" class='btn btn-primary' data-loading-text="Sending info.." style="margin-top:10px;"><em class="icon-ok"></em> Aanvragen
                        </button>
                    </form>
                </div>
            </form>
        </div>
        <?php include("Footer.html")?>
    </body>
</html>