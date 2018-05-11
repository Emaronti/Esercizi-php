<?php
session_start();
$_SESSION['a']=null;	

?>
<html>

	
<div  align='center'>	
	<a href='homepage.php'>
			<img   id='bott8' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height="150" width="533" >
	</a>
</div>
		
<br><br>
<?php
	if(isset($_SESSION['msg'])==true){
		echo $_SESSION['msg'];
	}
	
		$_SESSION['msg']=NULL;
	
?>
<br>
<br><br>
<div align='center'>
	
	<form id="form1" action="portale.php" method="post">
		Inserire username: 
		<br>
		<input id="bott1" type="text" name="user" required>
		<br>
		Inserire la password :
		<br>
		<input id="bott1" type="password" name="password" required>
		<br><br><br>
		<input  type="submit" id="b_login2" value="Login">
	</form>
</div>
<link rel="stylesheet" type="text/css" href="homepage.css" />

</html>   
	