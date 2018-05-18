<?php

session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	
	$nome=$_REQUEST['nometipologia'];
	
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql1="SELECT Tipo from tipogiornata where Tipo='$nome'";
		
	$y=mysqli_query($conn,$sql1);
	
	if(mysqli_num_rows($y)>0){
		
	$_SESSION['msg']="<div id='span' align ='center'>Giornata già esistente.</div>";
	header ('location: orelavoro.php') ;			
	}
	else{
	$sql="insert into tipogiornata (Tipo) values ('$nome')";
	$result=mysqli_query($conn,$sql);
	
	header('location:orelavoro.php');
	}
?>