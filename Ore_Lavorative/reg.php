<?php
session_start();


?>
<html>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
	
<div  align='center'>	
    <a href='homepage.php'>
			<img   id='bott8' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height="150" width="533" >
	</a>
</div>
		<br><br><br><br>
<?php
	if(isset($_SESSION['msg'])==true){
		echo $_SESSION['msg'];
	}
	
		$_SESSION['msg']=NULL;
	
?>
<div align='center'>
	<form id="form1" action ="reg2.php" method="post">
		Inserire username:
		<br>
		<input id="bott1" type="text" name="user" required> 
		<br>
		
		Inserire la password :
		<br>
		 <input id="bott1" type="password" name="password" required>
		
		<br>
		Confermare password: 
		<br>
		<input id="bott1" type="password" name="pass1" required>
		
		<br><br><br>
		
		<input id="b_reg2" type="submit" value="Registrati" >
		
	</form>
</div>
</html>
