<?php
	
	
	if(isset($_REQUEST['a'])){
		$mn=$_SESSION['m'];
		$yn=$_SESSION['y'];	
	}
	if(isset($_SESSION['a']) && isset($_REQUEST['mese'])){
		if($_REQUEST['anno']==null){
		$yn=$_SESSION['y'];
		$mn=$_REQUEST['mese'];
		}
		else{
		$mn=$_REQUEST['mese'];
		$yn=$_REQUEST['anno'];
		}
	}
	else if(isset($_REQUEST['mese']) && isset($_REQUEST['anno'])){
	$mn=$_REQUEST['mese'];$yn=$_REQUEST['anno'];	}
	if(isset($_GET['prm'])){$mn=strip_tags($_GET['prm'])+strip_tags($_GET['chm']);$yn=$_SESSION['y'];}
	
	
    $adj="";
		
	if($mn==0){$mn=1;}
	if($mn==13){$mn=12;}
    $nd=date('t',mktime(0,0,0,$mn,1,(int) $yn));
    
    $j= date('w',mktime(0,0,0,$mn,1,(int) $yn))-1;
	
    if($j=="-1"){$j="6";}
    $MONTHS=array(1=>'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
    for($k=1;$k<=$j;$k++){$adj.="<td> </td>";}
	
	
	
	$sql="select Amministratori from amm where idUtente=$id";
			$result=mysqli_query($conn,$sql);
			$sql1="select Commerciale from commerc where idUtente=$id";
			$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0){
				
$utente=1;


	 if(isset($_REQUEST['utente'])==true){
		if($_REQUEST['utente']!=null){
		$utente=$_REQUEST['utente'];
		$_SESSION['uten']=$utente;
		
		}
		
	}
	
	else if(isset($_REQUEST['utente'])==false){
		if($_SESSION['uten']!=null){
		$utente=$_SESSION['uten'];
		}
		else{
		$utente=1;
		$_SESSION['uten']=null;
		}
		
		
		$_REQUEST['utente']=null;
		
	}
	else{
		$utente=$_SESSION['uten'];
	}
	
	
	
	
			}
			
	
	?>
	
   <html>
   <br>
 
      <table id='table4' cellspacing="0"  align="center" width="98%"  >
       <tr>
        <td align="center">
         <a href="?prm=<?php echo $mn ?>&chm=-1" style='color:black'><</a> 
        </td>
        <td colspan="5" style='border:1px solid black' align="center">
         <?php echo $MONTHS[$mn]." ".$yn ?>
        </td>
        <td align="center">
         <a href="?prm=<?php echo $mn ?>&chm=1" style='color:black'>></a> 
        </td> 
       </tr>
       <tr>
        <td><strong>Lun</strong></td>
        <td><strong>Mar</strong></td>
        <td><strong>Mer</strong></td>
        <td><strong>Gio</strong></td>
        <td><strong>Ven</strong></td>
        <td><strong>Sab</strong></td>
        <td><strong>Dom</strong></td>
       </tr>
       <tr>
    <?php
	$servername = "192.168.55.9";
	$username = "root";
	$password = "root";
	
	$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
	
	$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
	
	$username=$_SESSION['username'];
	
		for($i=1;$i<=$nd;$i++){
			$sql="select Amministratori from amm where idUtente=$id";
			$result=mysqli_query($conn,$sql);
			$sql1="select Commerciale from commerc where idUtente=$id";
			$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0){
			
			$sql="select  utente.Username, progetto.nome,data.data,data.ore,data.luogo,tipogiornata.Tipo,data.descrizione from data inner join tipogiornata on data.idTipo=tipogiornata.idTipo inner join progetto on data.idProgetto=progetto.idProgetto inner join utente on data.idUtente=utente.idUtente inner join uten on data.idUtente=uten.idUtente where data.data='$yn-$mn-$i' and uten.idUten='$utente';";
			$result=mysqli_query($conn,$sql);
			
			}
			
			else{
				
			$sql="select  utente.Username, progetto.nome,data.data,data.ore,data.luogo,tipogiornata.Tipo,data.descrizione from data inner join tipogiornata on data.idTipo=tipogiornata.idTipo inner join progetto on data.idProgetto=progetto.idProgetto inner join utente on data.idUtente=utente.idUtente inner join uten on data.idUtente=uten.idUtente where data.data='$yn-$mn-$i' and utente.Username='$username';";
			$result=mysqli_query($conn,$sql);
			}
			
			while($ar=mysqli_fetch_array($result)){
			$arr[]=$ar;
			}
			
			
			
			if(($i==01 && $mn==01 )||( $i==06 && $mn==01)  || ($i==25 && $mn==04) || ($i==01 && $mn==05) ||($i==02 && $mn==06)||($i==15 && $mn==8) || ($i==01 && $mn==11)|| ($i==08 && $mn==12)|| ($i==25 && $mn==12)|| ($i==26 && $mn==12) || ($i==11 && $mn==04 && $yn==2004) || ($i==12 && $mn==04 && $yn==2004) || ($i==27 && $mn==03 && $yn==2005) || ($i==28 && $mn==03 && $yn==2005) || ($i==16 && $mn==04 && $yn==2006) || ($i==17 && $mn==04 && $yn==2006)
				|| ($i==8 && $mn==04 && $yn==2007) || ($i==9 && $mn==04 && $yn==2007) || ($i==23 && $mn==03 && $yn==2008) || ($i==24 && $mn==04 && $yn==2008) || ($i==12 && $mn==04 && $yn==2009) || ($i==13 && $mn==04 && $yn==2009) || ($i==4 && $mn==04 && $yn==2010) || ($i==5 && $mn==04 && $yn==2010) || ($i==24 && $mn==04 && $yn==2011) || ($i==8 && $mn==04 && $yn==2012) || ($i==9 && $mn==04 && $yn==2012) || ($i==31 && $mn==03 && $yn==2013) || ($i==1 && $mn==04 && $yn==2013) 
			|| ($i==20 && $mn==04 && $yn===2014) || ($i==21 && $mn==04 && $yn===2014) || ($i==5 && $mn==04 && $yn==2015) || ($i==6 && $mn==04 && $yn==2015) || ($i==27 && $mn==03 && $yn==2016) || ($i==28 && $mn==03 && $yn==2016)
				|| ($i==16 && $mn==04 && $yn==2017) || ($i==17 && $mn==04 && $yn==2017) || ($i==1 && $mn==04 && $yn==2017) || ($i==2 && $mn==04 && $yn==2018) || ($i==21 && $mn==04 &&  $yn==2019) || ($i==22 && $mn==04 && $yn==2019) || ($i==12 && $mn==04 && $yn==2020) || ($i==13 && $mn==04 && $yn==2020) ||  ($i==4 && $mn==04 && $yn==2021) || ($i==5 && $mn==04 && $yn==2021) ||  ($i==17 && $mn==04 && $yn==2022) || ($i==18 && $mn==04 && $yn==2022) ||
				 ($i==9 && $mn==04 && $yn==2023) || ($i==10 && $mn==04 && $yn==2023) ||  ($i==31 && $mn==03 && $yn==2024) || ($i==1 && $mn==04 && $yn==2024) ||  ($i==20 && $mn==04 && $yn==2025) || ($i==21 && $mn==04 && $yn==2025) ||  ($i==5 && $mn==04 && $yn==2026) || ($i==6 && $mn==04 && $yn==2026) ||
				  ($i==28 && $mn==03 && $yn==2027) || ($i==29 && $mn==03 && $yn==2027) ||  ($i==16 && $mn==04 && $yn==2028) || ($i==17 && $mn==04 && $yn==2028) ||  ($i==1 && $mn==04 &&  $yn==2029) || ($i==2 && $mn==04 && $yn==2029) ||  ($i==21 && $mn==04 && $yn==2030) || ($i==22 && $mn==04 && $yn==2030) ||  ($i==13 && $mn==04 && $yn==2031) || ($i==14 && $mn==04 && $yn==2031) || ($i==28 && $mn==03 && $yn==2032) || ($i==29 && $mn==03 && $yn==2032) ||
				   ($i==17 && $mn==04 && $yn==2033) || ($i==18 && $mn==04 && $yn==2033) ||  ($i==9 && $mn==04 && $yn==2034) || ($i==10 && $mn==04 && $yn==2034) ||  ($i==25 && $mn==03 && $yn==2035) || ($i==26 && $mn==03 && $yn==2035) ||  ($i==13 && $mn==04 && $yn==2036) || ($i==14 && $mn==04 && $yn==2036) ||  ($i==15 && $mn==04 && $yn==2037) || ($i==16 && $mn==04 && $yn==2037) || ($i==26 && $mn==04 && $yn==2038) || 
				   ($i==10 && $mn==04 && $yn==2039) || ($i==11 && $mn==04 && $yn==2039) || ($i==1 && $mn==04 && $yn==2040) || ($i==2 && $mn==04 && $yn==2040) || ($i==21 && $mn==04 && $yn==2041) || ($i==22 && $mn==04 && $yn==2041) ||($i==6 && $mn==04 && $yn==2042) || ($i==7 && $mn==04 && $yn==2042) || ($i==29 && $mn==03 && $yn==2043) || ($i==30 && $mn==03 && $yn==2043) || 
				   ($i==17 && $mn==04 && $yn==2044) || ($i==18 && $mn==04 && $yn==2044) || ($i==9 && $mn==04 && $yn==2045) || ($i==10 && $mn==04 && $yn==2045) || ($i==25 && $mn==03 && $yn==2046) || ($i==26 && $mn==03 && $yn==2046) || ($i==14 && $mn==04 && $yn==2047) || ($i==15 && $mn==04 && $yn==2047) || ($i==5 && $mn==04 && $yn==2048) || ($i==6 && $mn==04 && $yn==2048) || ($i==18 && $mn==04 && $yn==2049) || ($i==19 && $mn==04 && $yn==2049) ||
				   ($i==10 && $mn==04 && $yn==2050) || ($i==11 && $mn==04 && $yn==2050))
			{
				echo $adj."<td align='center' height='100' width='157' style='background-color:#fcfc6b;border:1px solid black'>".$i."</td>";
			}
			else{
				
			
		    	if(mysqli_num_rows($result)==0){
				
				if($j==5||$j==6){
					echo $adj."<td align='center' height='100' width='50' style='background-color:#fcfc6b;border:1px solid black'>".$i."</td>";
				}
				else
			echo $adj."<td align='center' height='100' width='157' style='border:1px solid black'>".$i."</td>";
			}
			else if(mysqli_num_rows($result)>0){
			echo $adj."<td align='center' class='hoverlink' data-toggle='tooltip' title='".$arr[0][2]." &#13 ";
			$var='';
			for($r=0;$r<mysqli_num_rows($result);$r++){
			if($arr[$r][1]!='Non significativo')	
			$var=$var."    ".$arr[$r][1];
			}
			echo $var;
			
			echo "&#13 Descrizione: ";
			$var1='';
			for($r1=0;$r1<mysqli_num_rows($result);$r1++){
				if($arr[$r1][6]!='Non significativa')
			$var1=$var1." &#13 &#13  ".$arr[$r1][6];
			}
			echo $var1;
			
			echo  "' width='157'  style='background-color:";
			
			for($v=0;$v<mysqli_num_rows($result);$v++){	
				if($arr[$v][5]=='Gnl'){
					$art=1;
				}
				else if($arr[$v][5]=='Gl'){
					$art1=1;
				}
				else if($arr[$v][5]=='Permesso'){
					$art2=1;
				}
				else if($arr[$v][5]=='Trasferta'){
					$art3=1;
				}
				else if($arr[$v][5]=='Ferie'){
					$art4=1;
				}
				else if($arr[$v][5]=='Malattia'){
					$art5=1;
				}
			}
			
				if($art==1 && $art1==0 && $art2==0 && $art3==0 && $art4==0 && $art5==0)// NON LAV
				{
					echo "#fcfc6b";
					
				}
				else if($art==0 && $art1==1 && $art2==0 && $art3==0 && $art4==0 && $art5==0) //LAV
				{
					echo "white";
					
				}
				else if($art==0 && $art1==0 && $art2==1 && $art3==0 && $art4==0 && $art5==0)//PERMESSI
				{
					echo "#c8975f";
					
				}
				else if($art==0 && $art1==0 && $art2==0 && $art3==1 && $art4==0 && $art5==0)//TRASFERTA
				{
					echo "#a6fea6";
					
				}
				else if($art==0 && $art1==0 && $art2==0 && $art3==0 && $art4==1 && $art5==0)//FERIE
				{
					echo "green";
					
				}
				else if($art==0 && $art1==0 && $art2==0 && $art3==0 && $art4==0 && $art5==1)//MALATTIA
				{
					echo "#c868fc";
					
				}
				else if($art==0 && $art1==1 && $art2==1 && $art3==0 && $art4==0 && $art5==0)//LAV + PERM
				{
					echo "#c8975f";
					
				}
				else if($art==0 && $art1==1 && $art2==0 && $art3=1 && $art4==0 && $art5==0)//LAV + TRASF
				{
					echo "#a6fea6";
					
				}
				else if($art==0 && $art1==1 && $art2==1 && $art3==1 && $art4==0 && $art5==0)//LAV + PERM + TRASF
				{
					echo "#a6fea6";
					
				}
				
			
			echo  ";border:1px solid black'>".$i."<p>";for($u=0;$u<mysqli_num_rows($result);$u++){
				
				if($arr[$u][5]=='Trasferta' || $arr[$u][5]=='Gl'){
				echo $arr[$u][1]."<br>Ore:".$arr[$u][3]."<br>".$arr[$u][4]."<hr width='100px'>"; 
				}
			
				else if($arr[$u][5]=='Permesso'){
				echo "Permesso<br>Ore:".$arr[$u][3]."<hr width='100px'>";
				}
				}
				$extra=0;
				for($f=0;$f<mysqli_num_rows($result);$f++){
					$extra=$extra+$arr[$f][3];
				}
				if($art5 != 1 && $art4 != 1 )
				{				
					if($extra>8 || $extra<8){
						$extra=$extra-8;
					echo "Ore extra: ".$extra;
					}
				}
				echo "</p></td>";
				
			
			}
			}
			$adj='';
			$j++;
			if($j==7){
				echo"</tr><tr>";$j=0;
			}
			$arr=array();
			$art=0;
			$art1=0;
			$art2=0;
			$art3=0;
			$art4=0;
			$art5=0;
		}

	$_SESSION['m']=$mn;
	$_SESSION['y']=$yn;
	$_REQUEST['anno']=null;
	
	?>
       </tr>
      </table>

 
<link rel="stylesheet" type="text/css" href="homepage.css" />

 <script type='text/javascript'>
 
	
	
	$(document).ready(function(){	
		$('[data-toggle="tooltip"]').tooltip();		
	});
	
	

	
 </script>
 </html>
 