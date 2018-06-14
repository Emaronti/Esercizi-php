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
<html>
<head>
<link rel="stylesheet" type="text/css" href="homepage.css" />
  <meta charset="utf-8">
</head>
<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height='100' width='433'>
		</td>
		<td valign="top"><h2 id='h3' style='margin-top:20px;margin-bottom:0px'>Calendario</h2> 
		</td>
		<td valign="middle">
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
<br>
  	 <form action='calendario.php'  method='post'>
		 <?php 	$sql="select Amministratori from amm where idUtente=$id";
				$result=mysqli_query($conn,$sql);
				$sql1="select Commerciale from commerc where idUtente=$id";
				$result1=mysqli_query($conn,$sql1);
				if(mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0){
       ?>
		 <strong>Inserisci utente</strong>
		 

	<select name='utente' id='bott3' style="margin-right:50px;" required>
					<option value=''>Utente</option>
					<?php 
						$sql1='SELECT idUten FROM uten ORDER BY idUten DESC LIMIT 1';
						$result1=mysqli_query($conn,$sql1);
						$n=mysqli_fetch_array($result1);
						for($i=0;$i<=$n[0];$i++){
						$sql="select Username from utente inner join uten on uten.idUtente=utente.idUtente where idUten='$i'";
						$result=mysqli_query($conn,$sql);
						$ar=mysqli_fetch_array($result);
						if($ar[0]!=NULL)
						echo "<option value='$i'>$ar[0]</option>";
					}
		}
					?>
					
	</select>
       
	<strong>Inserisci il mese:</strong>

	<select name='mese' id='bott1' style="margin-right:50px;" >
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
    
	</select>


<strong>Inserisci l'anno:</strong>

	<select name='anno' id='bott1' style="margin-right:50px;" >
		<option value=''>Anno</option>
		<option value='2004'>2004</option>
		<option value='2005'>2005</option>
		<option value='2006'>2006</option>
		<option value='2007'>2007</option>
		<option value='2008'>2008</option>
		<option value='2009'>2009</option>
		<option value='2010'>2010</option>
		<option value='2011'>2011</option>
		<option value='2012'>2012</option>
		<option value='2013'>2013</option>
		<option value='2014'>2014</option>
		<option value='2015'>2015</option>
		<option value='2016'>2016</option>
		<option value='2017'>2017</option>
		<option value='2018'>2018</option>
		<option value='2019'>2019</option>
		<option value='2020'>2020</option>
		<option value='2021'>2021</option>
		<option value='2022'>2022</option>
		<option value='2023'>2023</option>
		<option value='2024'>2024</option>
		<option value='2025'>2025</option>
		<option value='2026'>2026</option>
		<option value='2027'>2027</option>
		<option value='2028'>2028</option>
		<option value='2029'>2029</option>
		<option value='2030'>2030</option>
		<option value='2031'>2031</option>
		<option value='2032'>2032</option>
		<option value='2033'>2033</option>
		<option value='2034'>2034</option>
		<option value='2035'>2035</option>
		<option value='2036'>2036</option>
		<option value='2037'>2037</option>
		<option value='2038'>2038</option>
		<option value='2039'>2039</option>
		<option value='2040'>2040</option>
		<option value='2041'>2041</option>
		<option value='2042'>2042</option>
		<option value='2043'>2043</option>
		<option value='2044'>2044</option>
		<option value='2045'>2045</option>
		<option value='2046'>2046</option>
		<option value='2047'>2047</option>
		<option value='2048'>2048</option>
		<option value='2049'>2049</option>
		<option value='2050'>2050</option>
		</select>
       
<input type='submit' id='logout' value='Cerca'>
  </form>
<fieldset style='background-color:white'>
	<legend>Tipo di giornata</legend>
&nbsp&nbsp&nbsp&nbsp	Giornata lavorativa: <strong style='background-color:white;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFerie: <strong style='background-color:green;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Festivo: <strong style='background-color:#fcfc6b;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Malattia: <strong style='background-color:#c868fc;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong>Permesso: <strong style='background-color:#c8975F;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong>Trasferta: <strong style='background-color:#a6fea6;border:1px solid black'>&nbsp&nbsp&nbsp&nbsp</strong>                            
</fieldset>
 
<?php
	date_default_timezone_set('Europe/Rome');

	if(empty($_SESSION['a'])){
		$_SESSION['a']=null;
	}
	  
	if(!isset($_REQUEST['mese'])){
		$date=date('n');
		$date1=date('Y');
	$_REQUEST['mese']=	$date;
	$_REQUEST['anno']=	$date1;
	include 'calendario1.php';
		$_SESSION['a']=true;
	} 
		
	else if(isset($_SESSION['a'])){
	include 'calendario1.php';
	}
   ?>
   </html> 
