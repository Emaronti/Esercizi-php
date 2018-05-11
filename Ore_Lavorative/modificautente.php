<?php
session_start();

	date_default_timezone_set('Europe/Rome');
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$utente=$_SESSION['u3'];
	$utente1=$_REQUEST['utente1'];
	$password=$_REQUEST['pass2'];
	
	$sql2="select idUtente from uten where idUten='$utente'";
	$result2=mysqli_query($conn,$sql2);
	$arr=mysqli_fetch_array($result2);
	
	$sql3="update uten set Utenti='$utente1' where idUten='$utente' ";
	$result3=mysqli_query($conn,$sql3);
	
	$sql1="update utente set Username='$utente1',Password='$password' where idUtente='$arr[0]' ";
	$result1=mysqli_query($conn,$sql1);
	
	header('location:dipendenti.php');
?>