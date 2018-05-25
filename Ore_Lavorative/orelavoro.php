<?php
session_start();

	date_default_timezone_set('Europe/Rome');
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	$username=$_SESSION['username'];
	$id=$_SESSION['idU'];
?>

<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height='100' width='433'>
		</td>
		<td valign="bottom"><h2 id='h3' style='margin-bottom:33px'>Gestione ore lavorative</h2>
		</td>
		<td>
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
	





<?php
	if(isset($_SESSION['msg'])==true){
		echo $_SESSION['msg'];
	}
	
		$_SESSION['msg']=NULL;
	
?>


<div align='center'><br>
<strong  style='color:#0c4977;background-color:white'>Inserisci ore lavorative</strong><br>
<table>
		<form  id='form1' action='inserimento1.php' method='post'>
	<tr><th colspan='2'>	<select name='utenti' id='bott1' required>
		<option value=''>Utenti</option>
	<?php
		$sql1='select Utenti from uten ';
		$result1=mysqli_query($conn,$sql1);
		$n=mysqli_num_rows($result1);
		for($i=1;$i<=$n;$i++){
		$sql="select Utenti from uten where idUten='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		if($ar[0]!=NULL)
		echo "<option value='$i'>$ar[0]</option>";
		}
	?>
	</select></th></tr>
				<tr><th align='right'><strong>Data:</strong></th>
						<th align='left'>
							<input id='bott1' type="date" name="data" required>
							</th></tr>
		
			
			<tr><th align='right'><strong>Tipo di giornata:</strong></th><th align='left'>
			<select  id='bott2' onchange='tipog()' name='giornata'   required >
				  <option value='6'>Lavoro</option>  
				  <option value='2'>Trasferta</option>
				  <option value='3'>Permessi</option>
				  <option value='4'>Malattia</option>
				  <option value='5'>Festivo</option>
				  <option value='1'>Ferie</option>
			</select></th></tr>
			
			<tr><th align='right'><strong>Tipo di impiego:</strong> </th><th align='left'>
			
			<select name='progetto' id='bott3' required>
			<?php 
        echo "AAAAAA";
				$sql1='select nome from progetto ';
				$result1=mysqli_query($conn,$sql1);
				$n=mysqli_num_rows($result1);
				for($i=1;$i<=$n;$i++){
				$sql="select idProgetto,nome from progetto where idProgetto='$i'";
				$result=mysqli_query($conn,$sql);
				$ar=mysqli_fetch_array($result);
				if($ar[1]!==NULL)
				echo "<option value='$i'>$ar[1]</option>";
			}
			?>
				  
				  
			</select></th></tr>
			
			<tr><th align='right'>Ore:</th>
			<th align='left'>
			<select name='ore' id='bott4' required>
				  <option value=''>H</option>
				  <option value='0'>0</option>
				  <option value='1'>1</option>
				  <option value='2'>2</option>
				  <option value='3'>3</option>
				  <option value='4'>4</option>
				  <option value='5'>5</option>
				  <option value='6'>6</option>
				  <option value='7'>7</option>
				  <option value='8'>8</option>
				  <option value='9'>9</option>
				  <option value='10'>10</option>
				  <option value='11'>11</option>
				  <option value='12'>12</option>
				  <option value='13'>13</option>
				  <option value='14'>14</option>
				  <option value='15'>15</option>
				  <option value='16'>16</option>
				  <option value='17'>17</option>
				  <option value='18'>18</option>
			</select>
			&nbsp&nbsp&nbsp
			<strong>Minuti:</strong>
			<select name='minuti' id='bott5' required>
				  <option value=''>m</option>
				  <option value='0'>0</option>
				  <option value='15'>15</option>
				  <option value='30'>30</option>
				  <option value='45'>45</option>
				  
			</select>
			</th>
			</tr>
			<br>
			<tr><th align='right'><strong>Descrizione:</strong></th><th align='left'>
			<textarea rows="7" cols="35" name='desc' id='bott6'></textarea></th></tr>
			<br>
			<tr><th align='right'><strong>Luogo:</strong></th><th align='left'>
			<select id='bott7' name='luogo'>
				<option value='Lastra a Signa' >Lastra a Signa</option>
				<option value='Bologna'>Bologna</option>
				<option value='Cattolica'>Cattolica</option>
				<option value='Roma'>Roma</option>
				<option value='Tavarnelle'>Tavarnelle</option>
			</select>
			</th></tr>
			</table>
			<br>
			
			<input  type='submit' id='logout' value='Inserisci'>
	</form>
</div>












<br><br><br><br>

<form action="orelavoro.php" method="post" align='center'>
<strong  style='color:#0c4977;background-color:white'>Elimina ore lavorative</strong><br><br>
<select name='utenti1' id='bott1' required>
		<option value=''>Utenti</option>
	<?php
		$sql1='select Utenti from uten ';
		$result1=mysqli_query($conn,$sql1);
		$n=mysqli_num_rows($result1);
		for($i=1;$i<=$n;$i++){
		$sql="select Utenti from uten where idUten='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		if($ar[0]!=NULL)
		echo "<option value='$i'>$ar[0]</option>";
		}
	?>
	</select>
	<br><br>
<strong style='background-color:white'>Data :</strong> <input id='bott1' type="date" name="data1" required>
<br><br>
<input  type='submit' id='logout' value='Elimina'>
</form>
<?php 
if(isset($_REQUEST['data1'])){
$data1=$_REQUEST['data1'];
$utente=$_REQUEST['utenti1'];
echo $utente;
$sql3="select idUtente from uten where idUten='$utente'";
	$result3=mysqli_query($conn,$sql3);
	$arre=mysqli_fetch_array($result3);

$sql="delete from data  where idUtente='$arre[0]' and data='$data1'";
$result=mysqli_query($conn,$sql);
}
?>

<link  rel="stylesheet" type="text/css" href="homepage.css" />
<script type='text/javascript'>
function tipog(){
var x= document.getElementById('bott2').selectedIndex;
var y = document.getElementById('bott2').options;

if(y[x].index == '3' || y[x].index == '4' || y[x].index == '5')
{
	
	document.getElementById('bott3').disabled=true;
	document.getElementById('bott4').disabled=true;
	document.getElementById('bott5').disabled=true;
	document.getElementById('bott6').disabled=true;
	document.getElementById('bott7').disabled=true;
}
else if(y[x].index == '2'){
	document.getElementById('bott3').disabled=true;
	document.getElementById('bott6').disabled=true;
	document.getElementById('bott7').disabled=true;
	document.getElementById('bott4').disabled=false;
	document.getElementById('bott5').disabled=false;
}
else{
	document.getElementById('bott3').disabled=false;
	document.getElementById('bott4').disabled=false;
	document.getElementById('bott5').disabled=false;
	document.getElementById('bott6').disabled=false;
	document.getElementById('bott7').disabled=false;
}
}
</script>










<!--



<form action="<?php
			if(isset($_REQUEST['utenti2']) && isset($_REQUEST['data1'])){
					$utenti3=$_REQUEST['utenti2'];
					$_SESSION['u3']=$utenti3;
					$data3=$_REQUEST['data1'];
					$_SESSION['d3']=$data3;
					echo "orelavoro.php";
					
			}
			?>" method="post"  >
			
				<h3  style='color:#0c4977'>Modifica ore lavorative</h3>
				<select name='utenti2' id='bott1' required>
					<option value=''>Utenti</option>
				<?php
					$sql1='select Utenti from uten ';
					$result1=mysqli_query($conn,$sql1);
					$n=mysqli_num_rows($result1);
					for($i=1;$i<=$n;$i++){
					$sql="select Utenti from uten where idUten='$i'";
					$result=mysqli_query($conn,$sql);
					$ar=mysqli_fetch_array($result);
					if($ar[0]!=NULL)
					echo "<option value='$i'>$ar[0]</option>";
					}
					?>
					</select>
					<br><br>
					<strong style='background-color:white'>Data :</strong> <input id='bott1' type="date" name="data1" required><br><br>
					<input type='submit' id='logout'  value='Invia'></form>
					<form action='modificaore.php' method='post'>
					<?php
				 if(isset($_REQUEST['utenti2'])&&isset($_REQUEST['data1'])){
					 if($_REQUEST['utenti2']!=NULL&&$_REQUEST['data1']!=NULL){
						$sql2="select idProgetto,idUtente,data,ore,luogo,idTipo,descrizione from data where idUtente='$utenti3' and data='$data3'";
						$result2=mysqli_query($conn,$sql2);
						$arr=mysqli_fetch_array($result2);
				 echo "<br>
				 <strong style='background-color:white'>Progetto</strong><br>
				<input type='text' name='nomeprogetto1'  id='bott1'   value='$arr[0]' required> 
				<br><br>
				<strong style='background-color:white'>Descrizione</strong><br>
				<textarea rows='7' cols='35' name='desc1'  id='bott1' >$arr[1]</textarea> 
				<br><br>
				<input type='submit' id='logout'  value='Modifica'>
				";
					 }
				 }?>
					
			</form>-->