<?php
    session_start();
	$_SESSION['a']=null;	
	$id=$_SESSION['idU'];
	
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$sql="select Amministratori from amm where idUtente=$id";
	$result=mysqli_query($conn,$sql);
	$sql1="select Commerciale from commerc where idUtente=$id";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0){
	header('location:calcoliamm.php');
	}
	
	$username=$_SESSION['username'];
	
	for($i=0;$i<100;$i++){
	$sql="select nome,sum(ore)  from data inner join progetto on data.idProgetto=progetto.idProgetto  inner join utente on data.idUtente=utente.idUtente where Username='$username' and data.idProgetto=$i;";
	$result=mysqli_query($conn,$sql);
	$a=mysqli_fetch_array($result,MYSQLI_NUM);
	if($a[1]==null){
		$a[1]=0;
	}
	$sql1="update ore_totali set Ore_totali='$a[1]' where id_tot=$i;";
	$result1=mysqli_query($conn,$sql1);
	}
	if(!isset($_SESSION['c']))
	$_SESSION['c']=0;

	if(!isset($_SESSION['d']))
	$_SESSION['d']=0;
	
?>
<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height='100' width='433'>
		</td>
		<td valign="bottom"><h2 id='h3' style='margin-bottom:33px;'>Riepilogo</h2>
		</td>
		<td>
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
<br>


<table border='1' align='center'>
<tr><th>Nome progetto</th><th>Ore totali</th></tr>
<?php
 $sql2='select progetto.nome,ore_totali.Ore_totali from ore_totali inner join progetto on ore_totali.idProgetto=progetto.idProgetto where ore_totali!=0';	
 $result2=mysqli_query($conn,$sql2);
 while($dati = mysqli_fetch_array($result2)){ 
 
echo "<tr>";

	for($i=0;$i<mysqli_num_fields($result2);$i++){
	echo "<td> ".$dati[$i]."</td> ";
	}
echo "</tr>";	
}
$sql4="select sum(Ore_totali) from ore_totali";
$result4=mysqli_query($conn,$sql4);
$g=mysqli_fetch_array($result4);
echo "<div align='center'><strong>Ore complessive: ".$g[0]."</strong></div><br>";
?>
</table><br><br>
<table border='1' align='center'>
<tr><th>Ore complessive</th><th>Totale</th></tr>
<?php
 $sql2="select sum(ore) from data where idUtente=$id and idTipo=2 ";	
 $result2=mysqli_query($conn,$sql2);
$dati1 = mysqli_fetch_array($result2);
 echo "<tr>";

	echo "<td>Trasferta</td><td>".$dati1[0]."</td> ";
	
echo "</tr>";	
$sql3="select sum(ore) from data where idUtente=$id and idTipo=3 ";	
 $result3=mysqli_query($conn,$sql3);
$dati2 = mysqli_fetch_array($result3);
 echo "<tr>";

	echo "<td>Permessi</td><td>".$dati2[0]."</td> ";
	
echo "</tr>";	

$sql4="select count(*) from data where idUtente=$id and idTipo=4 ";	
 $result4=mysqli_query($conn,$sql4);
$dati3 = mysqli_fetch_array($result4);

 echo "<tr>";

	echo "<td>Malattia</td><td>".$dati3[0]."</td> ";
	
echo "</tr>";
$sql5="select count(*) from data where idUtente=$id and idTipo=5 ";	
 $result5=mysqli_query($conn,$sql5);
$dati4 = mysqli_fetch_array($result5);
 echo "<tr>";

	echo "<td>Ferie</td><td>".$dati4[0]."</td> ";
	
echo "</tr>";


?>
</table><br><br>
<form id='form1' action='calcoli1.php' method='post'>
<div align='center'><strong style='font-size:25px'>
Numero totale di ore in un determinato periodo</strong><br><br>
<input id='bott1' type='date' name='data1'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id='bott1' type='date' name='data2'>&nbsp&nbsp&nbsp&nbsp
<input type='submit' id='logout' value='Calcola'>

</div>
</form>
<div align='center'><strong style='background-color:white'>Ore di lavoro: 
<?php  
if($_SESSION['c']!=0)
	echo $_SESSION['c'];
else if($_SESSION['c']==null)
	echo 0;

 ?>
 </strong></div><br>
 <form id='form1' action='calcoli1.php' method='post'>
<div align='center'><strong style='font-size:25px'>
Numero totale di ore in un determinato mese</strong><br><br>
<select id='bott1' name='data3'>
	<option value=''>Scegli</option>
	<option value='1'>Gennaio</option>
	<option value='2'>Febbraio</option>
	<option value='3'>Marzo</option>
	<option value='4'>Aprile</option>
	<option value='5'>Maggio</option>
	<option value='6'>Giugno</option>
	<option value='7'>Luglio</option>
	<option value='8'>Agosto</option>
	<option value='9'>Settembre</option>
	<option value='10'>Ottobre</option>
	<option value='11'>Novembre</option>
	<option value='12'>Dicembre</option>
</select>&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='submit' id='logout' value='Calcola'>
</div>
</form>
<div align='center'><strong style='background-color:white'>Ore di lavoro: 
<?php  
if($_SESSION['d']!=0)
	echo $_SESSION['d'];
else if($_SESSION['d']==null)
	echo 0;
 ?>
 </strong></div><br><br>

 
<link  rel="stylesheet" type="text/css" href="homepage.css" />