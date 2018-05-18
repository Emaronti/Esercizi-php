<?php

session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	$tipop=$_REQUEST['tipop'];
	$anno=$_REQUEST['anno'];
	$prog=$_REQUEST['progetto'];
		
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	$sql1="select max(pro_commessa) from progetto";
	$result1=mysqli_query($conn,$sql1);
	$ar=mysqli_fetch_array($result1);
	
	
	$sql="update progetto set idTipo_Pro='$tipop',AnnoStart='$anno',pro_commessa='$ar[0]'+1 where idProgetto='$prog'";
	$result=mysqli_query($conn,$sql);
	
	header('location:calendario2.php');

?>