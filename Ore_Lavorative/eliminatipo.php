<?php

session_start();
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	
	$nome=$_REQUEST['nometipo'];
	
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	$sql="update tipogiornata set Tipo=NULL where idTipo='$nome' ";
	$result=mysqli_query($conn,$sql);
	
	header('location:orelavoro.php');

?>