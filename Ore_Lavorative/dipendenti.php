<?php
session_start();

	date_default_timezone_set('Europe/Rome');
	$servername = "localhost";
	$username = "root";
	$password = "indi1";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	$username=$_SESSION['username'];
?>
<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height='100' width='433'>
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
		<td style='padding-bottom:1%;border:1px solid black' >
			<form  action ="reg2.php" method="post" align='center'>
				<h3  style='color:#0c4977;background-color:white'>Registrazione utenti</h3>
				<?php
				if(isset($_SESSION['msg'])==true){
					if($_SESSION['msg']!=NULL)
					echo $_SESSION['msg'];
				}
				$_SESSION['msg']=NULL;
				
				if(isset($_SESSION['msg1'])==true){
					if($_SESSION['msg1']!=NULL)
					echo $_SESSION['msg1'];
				}
				$_SESSION['msg1']=NULL;
		?>
				<strong style='background-color:white'>Inserire username: </strong> 
				<br>
				<input id="bott1" type="text" name="user" required> 
				<br><br>
				
				<strong style='background-color:white'>Inserire la password : </strong> 
				<br>
				 <input id="bott1" type="password" name="password" required>
				
				<br><br>
				<strong style='background-color:white'>Confermare password:</strong> 
				<br>
				<input id="bott1" type="password" name="pass1" required>
				
				<br><br>
				<select name='tipoutente' id='bott3' required>
					<option value=''>Scegli</option>
					<option value='Amministratore'>Amministratore</option>
					<option value='Commerciale'>Commerciale</option>
					<option value='Dipendente'>Dipendente</option>
				</select>	
				<br><br>
				<input id="logout" type="submit" value="Registrati" >
			</form>
		</td>
		<td rowspan='3' valign='top'>
			<table  border="black" align="center" >
			 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Dipendenti</caption>

				<tr>
					<th align="left">Username </th>
					<th align="left">Password</th>
				</tr>
				<?php 
				$sql2='select Username,Password from utente inner join uten on uten.idUtente=utente.idUtente';
				$result2=mysqli_query($conn,$sql2);
				$n=mysqli_num_rows($result2);
				for($i=1;$i<=$n;$i++){
					$sql3="select Username,Password from utente inner join uten on uten.idUtente=utente.idUtente where idUten='$i'";
					$result3=mysqli_query($conn,$sql3);
					$array=mysqli_fetch_array($result3);
					if($array[0]!=NULL)
					echo "<tr><td align='left' style='font-size:11px'>$array[0]</td><td align='left' style='font-size:11px'>$array[1]</td></tr>";
					
				}
				?>
				<br><br>
			</table> 
			<br><br>
			<table  border="black" align="center" >
			 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Commerciali</caption>

				<tr>
					<th align="left">Username</th>
					<th align="left">Password</th>
				</tr>
				<?php 
				$sql2='select Username,Password from utente inner join commerc on commerc.idUtente=utente.idUtente';
				$result2=mysqli_query($conn,$sql2);
				$n=mysqli_num_rows($result2);
				for($i=1;$i<=$n;$i++){
					$sql3="select Username,Password from utente inner join commerc on commerc.idUtente=utente.idUtente where idCommerc='$i'";
					$result3=mysqli_query($conn,$sql3);
					$array=mysqli_fetch_array($result3);
					if($array[0]!=NULL)
					echo "<tr><td align='left' style='font-size:11px'>$array[0]</td><td align='left' style='font-size:11px'>$array[1]</td></tr>";
					
				}
				?>
			</table> 
			<br><br>
			<table  border="black" align="center" >
			 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Amministratori</caption>

				<tr>
					<th align="left">Username</th>
					<th align="left">Password</th>
				</tr>
				<?php 
				$sql2='select Username,Password from utente inner join amm on amm.idUtente=utente.idUtente';
				$result2=mysqli_query($conn,$sql2);
				$n=mysqli_num_rows($result2);
				for($i=1;$i<=$n;$i++){
					$sql3="select Username,Password from utente inner join amm on amm.idUtente=utente.idUtente where idAmm='$i'";
					$result3=mysqli_query($conn,$sql3);
					$array=mysqli_fetch_array($result3);
					if($array[0]!=NULL)
					echo "<tr><td align='left' style='font-size:11px'>$array[0]</td><td align='left' style='font-size:11px'>$array[1]</td></tr>";
					
				}
				?>
			</table> 
			
			
		</td>
	</tr>
	<tr>
		<td style='padding-bottom:1%;border:1px solid black'  >
			<form action="eliminautente.php" method="post"  >
			<h3  style='color:#0c4977;background-color:white'>Elimina utenti</h3>
			<select name='utente' id='bott3' required >
					<option value=''>Utente</option>
					<?php 
						$sql1='select Username,Password from utente inner join uten on uten.idUtente=utente.idUtente';
						$result1=mysqli_query($conn,$sql1);
						$n=mysqli_num_rows($result1);
						for($i=1;$i<=$n;$i++){
						$sql="select Username from utente inner join uten on uten.idUtente=utente.idUtente where idUten='$i'";
						$result=mysqli_query($conn,$sql);
						$ar=mysqli_fetch_array($result);
						if($ar[0]!=NULL)
						echo "<option value='$i'>$ar[0]</option>";
					}
					?>
				</select>
				<br><br>
				<input type='submit' id='logout'  value='Elimina'>
			</form>
		</td>
	</tr>
	<tr>
		<td style='padding-bottom:1%;border:1px solid black'>
			<form action="<?php
			if(isset($_REQUEST['utente2'])){
					$utente3=$_REQUEST['utente2'];
					$_SESSION['u3']=$utente3;
					echo "dipendenti.php";
					
			}
			else if(isset($_REQUEST['utente2']) && isset($utente3)){
				echo "modificautente.php";
				
			}		?>" method="post"  >
				<h3  style='color:#0c4977;background-color:white'>Modifica utenti</h3>
				<select name='utente2' id='bott5' required >
					<option value=''>Utenti</option>
					<?php 
						$sql1='select Username,Password from utente inner join uten on uten.idUtente=utente.idUtente';
						$result1=mysqli_query($conn,$sql1);
						$n=mysqli_num_rows($result1);
						for($i=1;$i<=$n;$i++){
						$sql="select Username from utente inner join uten on uten.idUtente=utente.idUtente where idUten='$i'";
						$result=mysqli_query($conn,$sql);
						$ar=mysqli_fetch_array($result);
						if($ar[0]!=NULL)
						echo "<option value='$i'>$ar[0]</option>";
					}
					?>
				</select>
				<input type='submit' id='logout'  value='Invia'></form><form action='modificautente.php' method='post'>
				 <?php
				 if(isset($_REQUEST['utente2'])){
					 if($_REQUEST['utente2']!=NULL){
						$sql2="select Username,Password from utente inner join uten on uten.idUtente=utente.idUtente where idUten='$utente3'";
						$result2=mysqli_query($conn,$sql2);
						$arr=mysqli_fetch_array($result2);
				 echo "<br>
				 <strong style='background-color:white'>Username</strong><br>
				<input type='text' name='utente1'  id='bott1'  placeholder='Utente' value='$arr[0]' required> 
				<br><br>
				<strong style='background-color:white'>Password</strong><br>
				<input type='text' name='pass2'  id='bott1'  placeholder='Password' value='$arr[1]' required> 
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