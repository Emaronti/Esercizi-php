<?php
session_start();


?>
<html>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
	
<div  align='center'>	
    <a href='index.php'>
			<img   id='bott8' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height="150" width="533" >
	</a>
</div>
		<br><br><br><br>
<?php
	if(isset($_SESSION['msg'])==true){
		echo $_SESSION['msg'];
	}
  if(isset($_SESSION['msg1'])==true){
		echo $_SESSION['msg1'];
	}
	
		$_SESSION['msg']=NULL;
  $_SESSION['msg1']=NULL;
	
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
