 <html> 
  <?php
    session_start();
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
		<td><img   id='bott' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height='100' width='433'>
		</td>
		<td valign="top"><h2 id='h3' style='margin-top:30px;margin-bottom:0px'>Gestione commesse</h2>
		</td>
		<td valign="middle">
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp";?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
	<br>
	
	
<div align='left'>	
	<table  border="black" align="left">
	 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Legenda commesse</caption>

	<tr>
		<th align="left">Numero</th>
		<th align="left">Tipologia di progetto</th>
	</tr>
	<?php 
	$sql1='select Nome_Tipo from tipo_progetto ';
	$result1=mysqli_query($conn,$sql1);
	$n=mysqli_num_rows($result1);
	for($i=1;$i<=$n;$i++){
		$sql="select idTipo_Pro,Nome_Tipo from tipo_progetto where idTipo_Pro='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		if($i<10){
			echo "<tr><td align='left' style='font-size:11px'>0$i</td><td align='left' style='font-size:11px'>$ar[1]</td>";
		}
		else{
		echo "<tr><td align='left' style='font-size:11px'>$i</td><td align='left' style='font-size:11px'>$ar[1]</td>";
		}
	}
	?>
	</table>
</div>	
<div align='right' style='float:right'> 	
	<table  border="black" align="left">
	 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Progetti</caption>

	<tr>
		<th align="left">Nome </th>
		<th align="left">Descrizione</th>
		<th align="left">Tipo Progetto</th>
		<th align="left">Anno inizio</th>
		<th align="left">Progressivo commessa</th>
	</tr>
	<?php 
	$sql2='select nome,descrizione,idTipo_Pro,AnnoStart,pro_commessa from progetto ';
	$result2=mysqli_query($conn,$sql2);
	$n=mysqli_num_rows($result2);
	for($i=2;$i<=$n;$i++){
		$sql3="select nome,descrizione,idTipo_Pro,AnnoStart,pro_commessa from progetto  where idProgetto='$i' order by pro_commessa desc";
		$result3=mysqli_query($conn,$sql3);
		$ar=mysqli_fetch_array($result3);
		if($ar[0]!==NULL){
		if(strcmp($ar[0],"Other") !=0 && strcmp($ar[0],"QA") !=0 && strcmp($ar[0],"Ing.Offerta") !=0 && strcmp($ar[0],"Commerc") !=0 && strcmp($ar[0],"Training") !=0 ){
				echo "<tr><td align='left' style='font-size:11px'>$ar[0]</td><td align='left' style='font-size:11px'>$ar[1]</td><td align='center' style='font-size:11px'>$ar[2]</td><td align='center' style='font-size:11px'>$ar[3]</td><td align='center' style='font-size:11px'>$ar[4]</td>";
				}
		}
	}
	?>
	</table>
</div>
<div  align="center" style='margin-left:15%'>
	<form action='inscomm.php' method='post'>
		<label><strong align="left" style='color:#0c4977; font-size:20px'>Inserimento commesse</strong></label>
		<br><br>
		<select name='tipop'  id='bott1' required>
		<option value=''>Tipo progetto</option>
		<?php 
		$sql1='select Nome_Tipo from tipo_progetto ';
		$result1=mysqli_query($conn,$sql1);
		$n=mysqli_num_rows($result1);
		for($i=1;$i<=$n;$i++){
		$sql="select idTipo_Pro,Nome_Tipo from tipo_progetto where idTipo_Pro='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		echo "<option value='$i'>$ar[1]</option>";
		}
		?>
		</select>
	
	
	
 		<br><br>
		<select name='anno' id='bott1'  required>
		<option value=''>Anno</option>
		<option value='04'>2004</option>
		<option value='05'>2005</option>
		<option value='06'>2006</option>
		<option value='07'>2007</option>
		<option value='08'>2008</option>
		<option value='09'>2009</option>
		<option value='10'>2010</option>
		<option value='11'>2011</option>
		<option value='12'>2012</option>
		<option value='13'>2013</option>
		<option value='14'>2014</option>
		<option value='15'>2015</option>
		<option value='16'>2016</option>
		<option value='17'>2017</option>
		<option value='18'>2018</option>
		<option value='19'>2019</option>
		<option value='20'>2020</option>
		</select>
		<br><br>
		
		<select name='progetto' id='bott3' required>
			<option value=''>Impiego</option>
			<?php 
				$sql1='select nome from progetto ';
				$result1=mysqli_query($conn,$sql1);
				$n=mysqli_num_rows($result1);
				for($i=2;$i<=$n;$i++){
				$sql="select idProgetto,nome from progetto where idProgetto='$i'";
				$result=mysqli_query($conn,$sql);
				$ar=mysqli_fetch_array($result);
			if($ar[1]!==NULL){
				if(strcmp($ar[1],"Other") !=0 && strcmp($ar[1],"QA") !=0 && strcmp($ar[1],"Ing.Offerta") !=0 && strcmp($ar[1],"Commerc") !=0 && strcmp($ar[1],"Training") !=0 ){
				echo "<option value='$i'>$ar[1]</option>";
				}
			}
				
				
			}
			?>
		</select>
		<br><br>
		<input type='submit' id='logout'  value='Inserisci'>
	</form>
</div>



	
<link rel="stylesheet" type="text/css" href="homepage.css" />
</html>