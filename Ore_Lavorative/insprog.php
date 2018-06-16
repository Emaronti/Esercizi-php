<?php

session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	
	$nome=$_REQUEST['nomeprogetto'];
	$desc=$_REQUEST['desc'];
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql1="SELECT nome from progetto where nome='$nome'";
		
	$y=mysqli_query($conn,$sql1);
	
	if(mysqli_num_rows($y)>0){
		
	$_SESSION['msg']="<div id='span' align ='center'>Progetto già esistente.</div>";
	header ('location: inserimento2.php');			
	}
	else{
	$sql="insert into progetto (nome,descrizione) values ('$nome','$desc')";
	$result=mysqli_query($conn,$sql);
	
	
	
	header('location:inserimento2.php');
	}
?>