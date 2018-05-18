<html>
<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	$_SESSION['a']=null;	
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$password=$_REQUEST["password"];
	$username=$_REQUEST["user"];
	
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){	

	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql="SELECT Username,Password,idUtente FROM utente where Username='$username' and Password='$password'";
	
	$result=mysqli_query($conn,$sql);
	
	$ar=mysqli_fetch_assoc($result);
	
	
	$_SESSION['idU']=$ar['idUtente'];
	
	
if(mysqli_num_rows($result)>0){
		
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		header('location:portale1.php');
}
	
	else{
		$_SESSION['msg']= "<div id='span' align ='center'>Username o password errate.</div>";
		header ('location: login.php') ;	
		
	}
}
	
	
	
	
?>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
</html>
