<?php
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$username=$_SESSION['username'];
	
	$data1=$_REQUEST["data1"];
	$data2=$_REQUEST["data2"];
	$data3=$_REQUEST["data3"];
	
	$sql3="select sum(ore) from data inner join utente on data.idUtente=utente.idUtente where Username='$username' and data between '$data1' and '$data2' ";	
	$result3=mysqli_query($conn,$sql3);
	$dati1 = mysqli_fetch_array($result3);
	echo $dati1[0];
	$_SESSION['c']=$dati1[0];
	
	
	$sql5="select sum(ore) from data inner join utente on data.idUtente=utente.idUtente where Username='$username' and month(data)='$data3'";
	$result5=mysqli_query($conn,$sql5);
	$dati2 = mysqli_fetch_array($result5);
	echo $dati2[0];
	
	$_SESSION['d']=$dati2[0];
	
	
	
	header ('location:calcoli.php');


?>