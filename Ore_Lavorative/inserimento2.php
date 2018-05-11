<?php
session_start();

	date_default_timezone_set('Europe/Rome');
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	$username=$_SESSION['username'];
?>
<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://192.168.55.9/Stage/Logo Tecnau/LOGO_Tecnau_Definitivo.png'  height='100' width='433'>
		</td>
		<td valign="bottom"><h2 id='h3' style='margin-bottom:33px'>Gestione dipendenti</h2>
		</td>
		<td>
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
	<br>

		
	
		
<table id='table1'>	
	<tr>
		<td style='border:1px solid black' >
			<form action='insprog.php' method='post' >  
				<h3   style='color:#0c4977'>Inserimento progetti</h3>
					<?php
					if(isset($_SESSION['msg'])==true){
					if($_SESSION['msg']!=NULL)
					echo $_SESSION['msg'];
				
					}
					$_SESSION['msg']=NULL;
					?>
					<input type='text' name='nomeprogetto'  id='bott1'  placeholder='Nome del progetto' required> 
					<br><br> 
					<textarea rows='7' cols='35' name='desc'  id='bott1'  placeholder='Descrizione del progetto..' required></textarea> 
					<br><br>
					<input type='submit' id='logout'  value='Inserisci' required> 
			</form> 
		</td>
		<td rowspan='3' valign='top'>
			<table  border="black" align="center" style='float:right;margin-right:12%'>
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
					if($ar[0]!==NULL)
					echo "<tr><td align='left' style='font-size:11px'>$ar[0]</td><td align='left' style='font-size:11px'>$ar[1]</td><td align='center' style='font-size:11px'>$ar[2]</td><td align='center' style='font-size:11px'>$ar[3]</td><td align='center' style='font-size:11px'>$ar[4]</td>";
					
				}
				?>
			</table> 
		</td>
	</tr>
	<tr>
		<td style='border:1px solid black'  >
			<form action="eliminaprog.php" method="post"  >
				<h3  style='color:#0c4977'>Elimina progetti</h3>
				<select name='progetto1' id='bott3' required >
						<option value=''>Impiego</option>
						<?php 
							$sql1='select nome from progetto ';
							$result1=mysqli_query($conn,$sql1);
							$n=mysqli_num_rows($result1);
							for($i=2;$i<=$n;$i++){
							$sql="select idProgetto,nome from progetto where idProgetto='$i'";
							$result=mysqli_query($conn,$sql);
							$ar=mysqli_fetch_array($result);
							if($ar[1]!==NULL)
							echo "<option value='$i'>$ar[1]</option>";
						}
						?>
					</select>
					<br><br>
					<input type='submit' id='logout'  value='Elimina'>
			</form>
		</td>
	</tr>
	<tr>
		<td style='border:1px solid black'>
			<form action="<?php
			if(isset($_REQUEST['progetto2'])){
					$progetto3=$_REQUEST['progetto2'];
					$_SESSION['p3']=$progetto3;
					echo "inserimento2.php";
					
			}
			?>" method="post"  >
			
				<h3  style='color:#0c4977'>Modifica progetti</h3>
				<select name='progetto2' id='bott5' required >
						<option value=''>Impiego</option>
						<?php 
							$sql1='select nome from progetto ';
							$result1=mysqli_query($conn,$sql1);
							$n=mysqli_num_rows($result1);
							for($i=2;$i<=$n;$i++){
							$sql="select idProgetto,nome from progetto where idProgetto='$i'";
							$result=mysqli_query($conn,$sql);
							$ar=mysqli_fetch_array($result);
							if($ar[1]!==NULL)
							echo "<option value='$i'>$ar[1]</option>";
						}
						?>
					</select> <input type='submit' id='logout'  value='Invia'></form><form action='modificaprog.php' method='post'>
					<?php
				 if(isset($_REQUEST['progetto2'])){
					 if($_REQUEST['progetto2']!=NULL){
						$sql2="select nome,descrizione from progetto where idProgetto='$progetto3'";
						$result2=mysqli_query($conn,$sql2);
						$arr=mysqli_fetch_array($result2);
				 echo "<br>
				 <strong style='background-color:white'>Nome del progetto</strong><br>
				<input type='text' name='nomeprogetto1'  id='bott1'   value='$arr[0]' required> 
				<br><br>
				<strong style='background-color:white'>Descrizione</strong><br>
				<textarea rows='7' cols='35' name='desc1'  id='bott1' >$arr[1]</textarea> 
				<br><br>
				<input type='submit' id='logout'  value='Modifica'>
				";
					 }
				 }?>
					
			</form>
		</td>	
	</tr>
</table>	
	
	<link  rel="stylesheet" type="text/css" href="homepage.css" />
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	