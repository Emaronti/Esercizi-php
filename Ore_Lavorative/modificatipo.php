<?php

session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	
	$nome=$_SESSION['n3'];
	$nome2=$_REQUEST['nometipo1'];
	
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	$sql="update tipogiornata set Tipo='$nome2' where idTipo=$nome ";
	$result=mysqli_query($conn,$sql);
	
	header('location:orelavoro.php');

?>