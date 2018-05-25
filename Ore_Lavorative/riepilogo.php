<html>
<?php
	session_start();
	$_SESSION['a']=null;	
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$username=$_SESSION['username'];
	
	$sql="select distinct utente.Username, progetto.nome,progetto.descrizione from data inner join progetto on data.idProgetto=progetto.idProgetto  inner join utente on data.idUtente=utente.idUtente where utente.Username='$username'";
	
	$result=mysqli_query($conn,$sql);
?>
<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height='100' width='433'>
		</td>
		<td><h2 id='h3'>Calendario</h2>
		</td>
		<td>
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><?php echo "&nbsp Utente: $username &nbsp" ?></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
<br><br><br><br><br><br><br><br><br><br>

<table border='1' align='center'>
<tr><th>Username</th><th>Progetto</th><th>Descrizione progetto</th></tr>
<?php while($dati = mysqli_fetch_array($result)){ ?>
<tr>
<?php 
	for($i=0;$i<mysqli_num_fields($result);$i++){
	echo "<td> ".$dati[$i]."</td> ";
	}
echo "</tr>";	
}
?>

</table><br>	
	
	
	
<link rel="stylesheet" type="text/css" href="homepage.css" />
</html>