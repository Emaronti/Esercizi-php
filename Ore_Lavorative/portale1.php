<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "indi1";
$conn=mysqli_connect($servername,$username,$password) or die ("could not connect to mysql");
$db=mysqli_select_db($conn,'orelavorative') or die ("no database");
$username=$_SESSION['username'];
$id=$_SESSION['idU'];
$_SESSION['a']=null;	
?>
<html>

	<table id='table1' align='center' >
	<tr align='center'>
		<td><img   id='bott' src='http://www.tecnau.it/wp-content/uploads/2016/07/Logo_definitivo_trasparente_HD.png'  height='100' width='433'>
		</td>
		<td valign="bottom"><h2 id='h3' style='margin-bottom:33px;'>Portale ore lavorative</h2>
		</td>
		<td>
		<span id='spa1'><strong><?php echo "&nbsp Utente: $username &nbsp" ?></strong></span><br><br>
		<a  href='logout.php'><button id='logout'>Logout</button></a>	</td>	
	</tr></table>	
<br> 


<?php  
$sql="select Amministratori from amm where idUtente=$id";
$result=mysqli_query($conn,$sql);
$sql1="select Commerciale from commerc where idUtente=$id";
$result1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){?>
	<table id='table1'>
	<tr >
		<td><strong style='color:black; font-size:30;background-color:white'>Progetti</strong></td>
		<td><strong style='color:black; font-size:30;background-color:white'>Riepilogo ore</strong> </td>
		<td><strong style='color:black; font-size:30;background-color:white'>Dipendenti</strong></td>
	</tr>
	
	<tr >
		<td style='padding-bottom:5%'> <a href='inserimento2.php'><img id='img4' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmnf7Etbbb7WSIATzKmuWu-8JQ7DNWQxKGw7YGLdsPucC85f_Ksw' width='270' height='170'></a>  </td>
		<td style='padding-bottom:5%'> <a href='calcoli.php'><img id='img2' src='http://www.uni.bsu.by/arrangements/iolimp/iolimp_img.jpg' width='270' height='170'></a>  </td>	
		<td style='padding-bottom:5%'><a href='dipendenti.php'><img id='img5' src='http://www.datamanager.it/wp-content/uploads/2015/05/risorse-umane-800x500_c.jpg' width='270' height='170'></a></td>
	</tr>
	
	<tr>
		<td> <strong style='color:black; font-size:30;background-color:white'>Calendario</strong> </td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Commesse</strong> </td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Ore lavoro</strong></td>
	</tr>
	
	<tr style='padding-bottom:5%'>
		<td style='padding-bottom:1%'> <a href='calendario.php'><img id='img3' src='http://www.fidalparma.it/wp-content/uploads/2009/05/calendario.jpg?w=640' width='270' height='170' style='cursor:pointer;background-color: #0c4977;border-radius: .9em ;padding: 15px 25px 15px 25px;'></a>  </td>
		<td style='padding-bottom:1%'> <a href='calendario2.php'><img id='img5' src='http://planconsulting.it/blog/wp-content/uploads/2015/09/project-control-controllo-di-gestione-controllo-progetti-earned-value_e1-e1442139079637.jpg' width='270' height='170' style=' cursor:pointer;background-color: #0c4977;border-radius: .9em ;padding: 15px 25px 15px 25px;'></a></td>
		<td style='padding-bottom:1%'> <a href='orelavoro.php'><img id='img6' src='http://www.sanita24.ilsole24ore.com/images2014/Editrice/ILSOLE24ORE/QUOTIDIANO_SANITA/2015/11/14/Quotidiano%20Sanita/ImmaginiWeb/Ritagli/orario-lavoro-kFPG--258x258@Quotidiano_Sanita-Web.jpg' width='270' height='170'></a></td>
	</tr>
	

	</table>
<?php  } 


	else if(mysqli_num_rows($result1)>0){?>
	<br><br><br><br><br><br><br><br><br><br>
	<table id='table1'>
	<tr>
		<td> <strong style='color:black; font-size:30;background-color:white'>Calendario</strong> </td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Commesse</strong> </td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Riepilogo</strong></td>
	</tr>
	
	<tr>
		<td style='padding-bottom:1%'> <a href='calendario.php'><img id='img3' src='http://www.fidalparma.it/wp-content/uploads/2009/05/calendario.jpg?w=640' width='270' height='170' style='cursor:pointer;background-color: #0c4977;border-radius: .9em ;padding: 15px 25px 15px 25px;'></a>  </td>
		<td style='padding-bottom:1%'> <a href='calendario2.php'><img id='img5' src='http://planconsulting.it/blog/wp-content/uploads/2015/09/project-control-controllo-di-gestione-controllo-progetti-earned-value_e1-e1442139079637.jpg' width='270' height='170' style=' cursor:pointer;background-color: #0c4977;border-radius: .9em ;padding: 15px 25px 15px 25px;'></a></td>
		<td style='padding-bottom:1%'> <a href='calcoli.php'><img id='img2' src='http://www.uni.bsu.by/arrangements/iolimp/iolimp_img.jpg' width='270' height='170'></a></td>
	</tr>
	

	</table>
<?php 
}


else{?>
<table id='table1'>
<br><br><br>
	<tr>
		<td> <strong style='color:black; font-size:30;background-color:white'>Inserimento</strong></td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Calendario</strong>   </td>
		<td> <strong style='color:black; font-size:30;background-color:white'>Riepilogo</strong></td>
	</tr>
	
	<tr>
		<td style='padding-bottom:1%'> 	<a href='inserimento.php'><img id='img4' src='http://www.portalimoto.it/wp-content/uploads/portalimoto/2010/12/annunci.png' width='270' height='170'></a>  </td>
		<td style='padding-bottom:1%'> 	<a href='calendario.php'><img id='img1' src='http://www.fidalparma.it/wp-content/uploads/2009/05/calendario.jpg?w=640' width='270' height='170'></a></td>
		<td style='padding-bottom:1%'>  <a href='calcoli.php'><img id='img2' src='http://www.uni.bsu.by/arrangements/iolimp/iolimp_img.jpg' width='270' height='170'></a></td>
	</tr>
</table>
<?php }
?>



<link rel="stylesheet" type="text/css" href="homepage.css" />
</html>











