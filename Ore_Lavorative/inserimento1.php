<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	$id=$_SESSION['idU'];
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql="select Amministratori from amm where idUtente=$id";
	$result13=mysqli_query($conn,$sql);
	$sql1="select Commerciale from commerc where idUtente=$id";
	$result12=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result13)>0 || mysqli_num_rows($result12)>0){		 
	$utente=$_REQUEST['utenti'];
	$sql3="select idUtente from uten where idUten='$utente'";
	$result3=mysqli_query($conn,$sql3);
	$arre=mysqli_fetch_array($result3);
	}
	$nome_p=$_REQUEST['progetto'];
	$ore=$_REQUEST['ore'];
	$minuti=$_REQUEST['minuti'];
	$data=$_REQUEST['data'];
	$descrizione=$_REQUEST['desc'];
	$giornata=$_REQUEST['giornata'];
	$luogo=$_REQUEST['luogo'];
	
	
	//probabilmente è un errore di  primary key della data 
	
	
	
	if($minuti==0){
		$ore=$ore.".0";
	}
	else if($minuti==15)
		$ore=$ore.".25";
	
	else if($minuti==30)
		$ore=$ore.".50";
	
	else if($minuti==45)
		$ore=$ore.".75";
		
if($giornata==2 || $giornata==3 || $giornata==5){
	
	if(mysqli_num_rows($result13)>0 || mysqli_num_rows($result12)>0){
	
	
		$sql1="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES (1,'$arre[0]','$data',0,'Non significativa', '$giornata','Non significativa' ) ";
		$result1=mysqli_query($conn,$sql1);
		header("location: orelavoro.php");
	}
	else{
		$sql1="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES (1,'$_SESSION[idU]','$data',0,'Non significativa', '$giornata','Non significativa' )";
		$result1=mysqli_query($conn,$sql1);
		header("location: inserimento.php");
	}	
	
	}
	
else if($giornata==6)	{
	
	if(mysqli_num_rows($result13)>0 || mysqli_num_rows($result12)>0){		
	$sql="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES (1,'$arre[0]','$data','$ore', 'Non significativa', '$giornata', 'Non significativa')";
	$result=mysqli_query($conn,$sql);
	header("location: orelavoro.php");
	}
	else{
	$sql="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES (1,'$_SESSION[idU]','$data','$ore', 'Non significativa', '$giornata', 'Non significativa')";
	$result=mysqli_query($conn,$sql);
	header("location: inserimento.php");
	}
	
}
else if($giornata==1 || $giornata==4){
	
if(mysqli_num_rows($result13)>0 || mysqli_num_rows($result12)>0){		
	$sql="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES ('$nome_p','$arre[0]','$data','$ore', '$luogo', '$giornata', '$descrizione')";
	$result5=mysqli_query($conn,$sql);
	
	}
	else{
	$username=$_SESSION['username'];
	$sql="INSERT INTO data (idProgetto,idUtente,data,ore,luogo,idTipo,descrizione) VALUES ('$nome_p','$_SESSION[idU]','$data','$ore', '$luogo', '$giornata', '$descrizione')";
	$result=mysqli_query($conn,$sql);
	$sql2="select idUtente from utente where Username='$username'";
	$result2=mysqli_query($conn,$sql2);
	$art=mysqli_fetch_array($result2);
	if($ore>8){
		$app=$ore-8;
		$sql7="update ore_totali set Extra_ore=Extra_ore+$app where idUtente=$art[0]";
		$result7=mysqli_query($conn,$sql7);
	}
	else if($ore<8){
		$app=$ore-8;
		$sql7="update ore_totali set Extra_ore=Extra_ore+$app where idUtente=$art[0]";
		$result7=mysqli_query($conn,$sql7);
	}
	}
	if(isset($result5) && $result5==true)
		{
		   header("location: orelavoro.php");
		}
	else if(isset($result) && $result==true){
		 header("location: inserimento.php");
	}	
}
	?>