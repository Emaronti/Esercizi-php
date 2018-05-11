<?php

session_start();
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	
	$nome=$_REQUEST['nomeprogetto'];
	$desc=$_REQUEST['desc'];
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql1="SELECT nome from progetto where nome='$nome'";
		
	$y=mysqli_query($conn,$sql1);
	
	if(mysqli_num_rows($y)>0){
		
	$_SESSION['msg']="<div id='span' align ='center'>Progetto già esistente.</div>";
	header ('location: inserimento2.php') ;			
	}
	else{
	$sql="insert into progetto (nome,descrizione) values ('$nome','$desc')";
	$result=mysqli_query($conn,$sql);
	
	$sql2="select idProgetto from progetto where nome='$nome'";
	$result2=mysqli_query($conn,$sql2);
	$arr=mysqli_fetch_array($result2);
	
	$sql1="insert into ore_totali (Ore_totali,Extra_ore,idProgetto) values (0,0,'$arr[0]')";
	$result1=mysqli_query($conn,$sql1);
	
	header('location:inserimento2.php');
	}
?>