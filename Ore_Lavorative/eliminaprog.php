<?php

session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	
	$nome=$_REQUEST['progetto1'];
	
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	$sql="update progetto set nome=NULL,descrizione=NULL,idTipo_Pro=NULL,AnnoStart=NULL where idProgetto='$nome' ";
	$result=mysqli_query($conn,$sql);
	
	header('location:inserimento2.php');

?>