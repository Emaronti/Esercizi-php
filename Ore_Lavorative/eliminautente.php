<?php
session_start();

	date_default_timezone_set('Europe/Rome');
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$utente=$_REQUEST['utente'];
	
	$sql="update uten set Utenti=NULL where idUten='$utente' ";
	$result=mysqli_query($conn,$sql);
	
	$sql2="select idUtente from uten where idUten='$utente'";
	$result2=mysqli_query($conn,$sql2);
	$arr=mysqli_fetch_array($result2);
	
	$sql1="update utente set Username=NULL,Password=NULL where idUtente='$arr[0]' ";
	$result1=mysqli_query($conn,$sql1);
	
	header('location:dipendenti.php');
?>