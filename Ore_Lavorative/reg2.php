<?php
session_start();
$servername='localhost';
$user='root';
$pass='indi1';

$password=$_REQUEST["password"];
$pass1=$_REQUEST["pass1"];
$username=$_REQUEST["user"];


$conn=mysqli_connect($servername,$user,$pass);



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");

	
	$sql1="SELECT Username from utente where Username='$username'";
	
	 
	
	$y=mysqli_query($conn,$sql1);
	
	
	
	
	
	if(mysqli_num_rows($y)>0){
		
		$_SESSION['msg']="<div id='span' align ='center'>Username gia' esistente.</div>";
    
    if(isset($_REQUEST['tipoutente'])==false){
       header ('location: reg.php') ; 
        
      }
      else{
       header ('location: dipendenti.php') ; 
      }
    
    
		
		
	}
	
	
	else {
		
		
	  if($password===$pass1)
	  {
		$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
		
      if(isset($_REQUEST['tipoutente'])==false){
        $tipo="Dipendente";
        
      }
      else{
        $tipo=$_REQUEST['tipoutente'];
      }
		
		
		if($tipo=="Amministratore"){
      $_SESSION['msg']="<div id='span1' style='color:green;' align ='center'>Account creato con successo</div>";
		$sql="INSERT INTO utente (Username, Password) VALUES ('$username','$password')";
		$result=mysqli_query($conn,$sql);
		$sql2="select idUtente from utente where Username='$username'";
		$result2=mysqli_query($conn,$sql2);
		$ar=mysqli_fetch_array($result2);
		$sql1="INSERT INTO amm (idUtente, Amministratori) VALUES ('$ar[0]','$username')";
		$result1=mysqli_query($conn,$sql1);
		$sql3="INSERT INTO ore_totali (idUtente, Extra_ore) VALUES ('$ar[0]',0)";
		$result3=mysqli_query($conn,$sql3);
		header("location: dipendenti.php");
		}
		
		else if($tipo=="Commerciale"){
      $_SESSION['msg']="<div id='span1' style='color:green;' align ='center'>Account creato con successo</div>";
		$sql="INSERT INTO utente (Username, Password) VALUES ('$username','$password')";
		$result=mysqli_query($conn,$sql);
		$sql2="select idUtente from utente where Username='$username'";
		$result2=mysqli_query($conn,$sql2);
		$ar=mysqli_fetch_array($result2);
		$sql1="INSERT INTO commerc (idUtente, Commerciale) VALUES ('$ar[0]','$username')";
		$result1=mysqli_query($conn,$sql1);
		$sql3="INSERT INTO ore_totali (idUtente, Extra_ore) VALUES ('$ar[0]',0)";
		$result3=mysqli_query($conn,$sql3);
		header("location: dipendenti.php");
		}
		
		else if($tipo=="Dipendente"){
      $_SESSION['msg']="<div id='span1' style='color:green;' align ='center'>Account creato con successo</div>";
		$sql="INSERT INTO utente (Username, Password) VALUES ('$username','$password')";
		$result=mysqli_query($conn,$sql);
		$sql2="select idUtente from utente where Username='$username'";
		$result2=mysqli_query($conn,$sql2);
		$ar=mysqli_fetch_array($result2);
		$sql1="INSERT INTO uten (idUtente, Utenti) VALUES ('$ar[0]','$username')";
		$result1=mysqli_query($conn,$sql1);
		$sql3="INSERT INTO ore_totali (idUtente, Extra_ore) VALUES ('$ar[0]',0)";
		$result3=mysqli_query($conn,$sql3);
      if(isset($_REQUEST['tipoutente'])==false){
        header("location:reg.php");
       }
      else{
       header("location: dipendenti.php");
      }
		
		}
		
	  }
	  
	  else
		{
		 $_SESSION['msg1']="<div id='span' align ='center'>Username o password errate.</div>";
		 header ('location: dipendenti.php') ;	 
		 
		}
}
  
}
?>
<link rel="stylesheet" type="text/css" href="homepage.css" />


