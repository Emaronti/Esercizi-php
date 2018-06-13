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
		<td valign="bottom"><h2 id='h3' style='margin-bottom:33px;'>Riepiloghi</h2>
		</td>
		<td>
		<a href='portale1.php'><img id='home' src='http://4.bp.blogspot.com/--ddYKXz6fpc/Uh1NrRYLtVI/AAAAAAAAAPA/Bd16ChUzC2Q/s1600/home-icon.png' height='50' width='50'></a>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>
	<br><br>
<form action='calcoliamm.php' method='post'>	
	<select name='utenti' id='bott1' >
		<option value=''>Utenti</option>
	<?php
		$sql1='SELECT idUten FROM uten ORDER BY idUten DESC LIMIT 1 ';
		$result1=mysqli_query($conn,$sql1);
		$n=mysqli_fetch_array($result1);
		for($i=1;$i<=$n[0];$i++){
		$sql="select Utenti from uten where idUten='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		if($ar[0]!=NULL)
		echo "<option value='$i'>$ar[0]</option>";
		}
	?>
	</select>
	<br><br>
		<select name='anno' id='bott1'>
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
		<br><br>
	<input type="submit" value="Invia" id='logout' />
</form>	
	<br><br>
	<?php 
		$anno =date('Y');
		if(isset($_REQUEST['anno'])){
			if($_REQUEST['anno']!=NULL){
		
		$anno=$_REQUEST['anno'];
		
			}
		}
		
		$ut=1;
		if(isset($_REQUEST['utenti'])){
			if($_REQUEST['utenti']!=NULL){
		$ut=$_REQUEST['utenti'];
			}
		}
		
		$sql0="select nome from progetto where nome=NULL";
		$sql8="select Utenti from uten  where idUten='$ut'";
		$result8=mysqli_query($conn,$sql8);
		$dati8 = mysqli_fetch_array($result8);
		echo "<h3>$dati8[0]</h3>"
	?>
	<table  border='1px solid black'>
	<caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Ore dipendente <?php echo $dati8[0];  echo " ".$anno?></caption>
	<th></th>
	<?php 
	$somma=0;
	$sql3='select count(nome) from progetto';
	$result3=mysqli_query($conn,$sql3);
	$sql01="select nome from progetto";
	$result01=mysqli_query($conn,$sql01);
	$y=mysqli_num_rows($result01);
	$k=mysqli_fetch_array($result3);
	$z=$y-$k[0];
	for($i=0;$i<=$k[0]+$z;$i++){
		$sql4="select nome from progetto where idProgetto='$i'+1";
		$result4=mysqli_query($conn,$sql4);
		$ar1=mysqli_fetch_array($result4);
		if($ar1[0]!==NULL)
		echo "<th align='left' style='font-size:13px'>$ar1[0]</th>";
	}?>
	<th style='color:red;background-color:blue'>Somma</th>
	<th style='color:red;background-color:blue'>Extra ore</th>
	<tr>
	<td>Gennaio</td>
	<?php  
	$somma=0;
	$somma1=0;
	$extra=0;
	$extra1=0;
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=1 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=1 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	
	
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?>
	
	
	</tr>
	<tr>
	<td>Febbraio</td>
	<?php  
	$somma=0;
	$extra=0;
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=2 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=2 and year(data)=$anno  and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Marzo</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=3 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=3 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Aprile</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=4 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=4 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	

	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Maggio</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=5 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=5 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
		
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Giugno</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=6 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=6 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}	
	}
	
	
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Luglio</td>
	<?php  
	$somma=0;
	
	$extra=0;
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=7 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=7 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Agosto</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=8 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=8 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style=';background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Settembre</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=9 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=9 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Ottobre</td>
	<?php  
	$somma=0;
	
	$extra=0;
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=10 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=10 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}

	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Novembre</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=11 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=11 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}

	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?></tr>
	<tr>
	<td>Dicembre</td>
	<?php  
	$somma=0;
	$extra=0;
	
	for($g=0;$g<=31;$g++){
	$sql100="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=12 and year(data)='$anno' and day(data)='$g'" ;
	$result100=mysqli_query($conn,$sql100);
	$dati100 = mysqli_fetch_array($result100);
	if($dati100[0]!=0){
	$extra=$extra+$dati100[0]-8;
	$extra1=$extra1+$dati100[0]-8;
	}
	}
	
	for($i=0;$i<=$k[0]+$z;$i++){
	$sql9="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and month(data)=12 and year(data)=$anno and idProgetto='$i'+1";
	$result9=mysqli_query($conn,$sql9);
	$dati9 = mysqli_fetch_array($result9);
	$sql10="select nome from progetto where idProgetto='$i'+1 ";
	$result10=mysqli_query($conn,$sql10);
	$dati10 = mysqli_fetch_array($result10);
	
	if($dati10[0]!==NULL){
	$somma=$somma+$dati9[0];
	$somma1=$somma1+$dati9[0];
	echo "<td>$dati9[0]</td>";
	}
	
	}
	echo "<td style='background-color:yellow'>$somma</td>";
	echo "<td style='background-color:yellow'>$extra</td>";
	?>
	</tr>
	
	<tr>
	<td style='color:red;background-color:blue'><strong>Totale</strong></td>
	<?php 
	for($i=0;$i<=$k[0]+$z;$i++){
		$sql2="select sum(ore) from data inner join uten on data.idUtente=uten.idUtente where idUten='$ut' and idProgetto='$i'+2 and year(data)=$anno";	
		$result2=mysqli_query($conn,$sql2);
		$dati9=mysqli_fetch_array($result2);
		$sql10="select nome from progetto where idProgetto='$i'+1 ";
		$result10=mysqli_query($conn,$sql10);
		$dati10 = mysqli_fetch_array($result10);
		$somma=$somma+$dati9[0];
		if($dati10[0]!==NULL)
		echo "<td style='background-color:yellow'>$dati9[0]</td>";
		
	}
	echo "<td style='background-color:skyblue'>$somma1</td>";
	echo "<td style='background-color:skyblue'>$extra1</td>";
	?>
	
	</tr>
	</table>
	

 <br><br><br><br>
 <table  border='1px solid black'>
 <caption style='border:1px solid black;background-color:#afafaf;font-weight: bold;border-radius:.6em'>Ore totali dipendenti</caption>
	<th></th>
	<?php 
	$somma=0;
	$somma2=0;
	$sql3='select count(nome) from progetto';
	$result3=mysqli_query($conn,$sql3);
	$sql01="select nome from progetto";
	$result01=mysqli_query($conn,$sql01);
	$y=mysqli_num_rows($result01);
	$k=mysqli_fetch_array($result3);
	$z=$y-$k[0];
	for($i=0;$i<=$k[0]+$z;$i++){
		$sql4="select nome from progetto where idProgetto='$i'+1";
		$result4=mysqli_query($conn,$sql4);
		$ar1=mysqli_fetch_array($result4);
		if($ar1[0]!==NULL)
		echo "<th align='left' style='font-size:13px'>$ar1[0]</th>";
	}?>
	<th style='color:red;background-color:blue'>Somma</th>
	<th style='color:red;background-color:blue'>Extra ore</th>
	<?php
		
		$sql1='SELECT idUten FROM uten ORDER BY idUten DESC LIMIT 1 ';
		$result1=mysqli_query($conn,$sql1);
		$n=mysqli_fetch_array($result1);
		for($i=1;$i<=$n[0];$i++){
			$somma=0;
		$sql="select Utenti from uten where idUten='$i'";
		$result=mysqli_query($conn,$sql);
		$ar=mysqli_fetch_array($result);
		if($ar[0]!=NULL){
		echo "<tr><td>$ar[0]</td>";
		for($j=0;$j<=$k[0]+$z;$j++){
			
		$sql9="SELECT sum( data.ore )FROM data INNER JOIN utente ON data.idUtente = utente.idUtente INNER JOIN uten ON utente.idUtente = uten.idUtente WHERE idUten ='$i' AND idProgetto ='$j'+1";
      
		$result9=mysqli_query($conn,$sql9);
		$dati9 = mysqli_fetch_array($result9);
		
		$sql10="select nome from progetto where idProgetto='$j'+1 ";
		$result10=mysqli_query($conn,$sql10);
		$dati10 = mysqli_fetch_array($result10);
		
		$sql102="select idUtente from uten where idUten='$i' ";
		$result102=mysqli_query($conn,$sql102);
		$dati102 = mysqli_fetch_array($result102);
		
		$sql101="select Extra_ore from ore_totali where idUtente='$dati102[0]' ";
		$result101=mysqli_query($conn,$sql101);
		$dati101 = mysqli_fetch_array($result101);
		
		
		
		if($dati10[0]!==NULL){
		$somma=$somma+$dati9[0];
		$somma2=$somma2+$dati9[0];
		echo "<td>$dati9[0]</td>";
		}	
		}
		echo "<td style='background-color:yellow'>$somma</td>";
		echo "<td style='background-color:yellow'>$dati101[0]</td>";
		echo "</tr>";
      
		}
		}
	
	?>
		<tr>
	<td style='color:red;background-color:blue'><strong>Totale</strong></td>
	<?php 
	for($i=0;$i<=$k[0]+$z;$i++){
    
		$sql2="select sum(ore)  from data where idProgetto='$i'";	
		$result2=mysqli_query($conn,$sql2);
		$dati9=mysqli_fetch_array($result2);
		$sql10="select nome from progetto where idProgetto='$i' ";
		$result10=mysqli_query($conn,$sql10);
		$dati10 = mysqli_fetch_array($result10);
		
		$sql103="select sum(Extra_ore) from ore_totali";
		$result103=mysqli_query($conn,$sql103);
		$dati103 = mysqli_fetch_array($result103);
		
		$somma=$somma+$dati9[0];
		if($dati10[0]!==NULL)
		echo "<td style='background-color:yellow'>$dati9[0]</td>";
		
	}
	echo "<td style='background-color:skyblue'>$somma2</td>";
	echo "<td style='background-color:skyblue'>$dati103[0]</td>";
	?>
	</table>
<link  rel="stylesheet" type="text/css" href="homepage.css" />