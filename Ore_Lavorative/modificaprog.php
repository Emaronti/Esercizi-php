<?php

session_start();
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	
	$nome=$_SESSION['p3'];
	$nome2=$_REQUEST['nomeprogetto1'];
	$desc2=$_REQUEST['desc1'];
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	$sql="update progetto set nome='$nome2',descrizione='$desc2' where idProgetto=$nome ";
	$result=mysqli_query($conn,$sql);
	
	header('location:inserimento2.php');

?>