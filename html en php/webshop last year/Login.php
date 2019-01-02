<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
@font-face {
	font-family: roboto;
	src:url(Roboto-Regular.ttf);
}
*
{
	margin: 0px;
	padding: 0px;
}
body {
	background-image:url(achtergrond.png);
	background-size: cover;
	background-repeat:no-repeat;
	padding:243px;
	font-family: roboto;
}
#mainContainer {
	width: 600px;
	height: 300px;
}
#blackBox {
	width: 600px;
	height: 300px;
	background-color: rgba(0,0,0,0.7);
	float:left;
	color: white;
}
#login {
	width: 100px;
	height: 52px;
	background-color: rgb(0,0,0);
	z-index: 1;
	margin-top:-26px;
	
	
}
.logintext {
	padding: 10px 0 0 0;
	font-weight: bold;
	font-size: 24px;
}
#topbar {
	height:25px;
	overflow:visible !important;
	float:left;
}
#loginpage {
	margin: 50px 0 0 -110px;
}
.input {
	width: 300px;
	height: 40px;
	margin: 5px;
	font-size: 24px;
}
.onzin {
	font-size: 16px;
}
#submitButton {
	width: 300px;
	height: 40px;
	font-size: 24px;
	background-color: rgba(0, 0, 0, 0.7);
	color: white;
	margin: 7px;
	font-family: roboto;
	
}

</style>
</head>

<body>


<center>
	<div id="mainContainer">
    	<div id="topbar">
        	
        </div>
    	<div id="blackBox">
        	<div id="login">
            <p class="logintext">Login</p>
            </div>
            
            <table id="loginpage">
            <form name="loginSystem" method="post" action="LoginServer.php">
            	<tr>
                	<td class="onzin">
                    Gebruikersnaam</td>
                    <td><input type="text" name="username" class="input"></td>
                </tr>
                <tr>
                	<td class="onzin">Wachtwoord</td>
                    <td><input type="password" name="password" class="input"></td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                    <button type="submit" value="Login" name="submit" id="submitButton">Login</button>
                    </td>
            	</tr>
            </form>
            </table>
    	</div>
	</div>
</center>
</body>
</html>