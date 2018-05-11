<?php
session_start();
$_SESSION['a']=null;	
?>
<html>
<head>
	<title>Ore lavorative</title>
	<link  rel="stylesheet" type="text/css" href="homepage.css" />		
</head>
<body>

<div  align='center'>	
	<img   id='bott8' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height="150" width="533" >
	
	<h1>Portale Ore Lavorative</h1>
</div> 
	<div  align="center">
	<form  action="reg.php" method="post">
		<input  type="submit" id="b_reg" value="Registrati">
	</form>	
</div>  
<br><br><br><br>
 <div  align="center">
	<form  action="login.php" method="post">
		<input  type="submit" id="b_login" value="Login">
	</form>	
</div>  
</body>
</html>