<?php 
session_start();
if(!isset($_SESSION['email'])){
  if(!isset($_REQUEST['email'])){
    
    header('Location:index.php');
  }

  else if(isset($_REQUEST['email'])){
    
    $conn="mysql:host=localhost;dbname=CarPooling";
    $pass="indi1";
    $user="root";
  try{
    $dbh=new PDO($conn,$user,$pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
    $query= $dbh->prepare("select * from Passeggero where password=:password and email=:email");  

    $query->bindValue(":password",md5($_REQUEST['pass']));
    $query->bindValue(":email",$_REQUEST['email']);
    $query->execute();
    if($query->rowCount()>0){
      $_SESSION['msg']="";
      $row=$query->fetch();
      $_SESSION['email']=$row['email'];
      $_SESSION['nome']=$row['nome'];
      $_SESSION['cognome']=$row['cognome'];
			$_SESSION['idPas']=$row['id_passeggero'];
      //$_SESSION['aut']=0;
    }
    else if($query->rowCount()==0){
      $query1= $dbh->prepare("select * from Autista where password=:password and email=:email");  

      $query1->bindValue(":password",md5($_REQUEST['pass']));
      $query1->bindValue(":email",$_REQUEST['email']);
      $query1->execute();
      if($query1->rowCount()>0){
        $_SESSION['msg']="";
        $row1=$query1->fetch();
        $_SESSION['email']=$row1['email'];
        $_SESSION['nome']=$row1['nome'];
        $_SESSION['cognome']=$row1['cognome'];
				$_SESSION['idAut']=$row['id_autista'];
        //$_SESSION['aut']=1;
      }
      else if($query1->rowCount()==0){
      $_SESSION['msg']="<h3>Errore! Email o password sbagliata.</h3>";
      header('Location:index.php');  
    }
    }

  }catch(PDOException $e){
    echo "Connection Failed".$e->getMessage();
  }
  }
}
?>

<html>
  <head>
   <style>
   body{
        font-family: 'Lato', sans-serif;
	      background: #353535;
        margin:0px;
      } 
    a{
        text-decoration:none;
        color:black;
      }
    table{
       width:auto;
       height:auto;
     
     }
     #form1{
       background-color:white;
     }
   </style> 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  
  <body>
   
    <div class="panel-heading" style="background-color:#8FAEE8"> 
      <h1 align="center">
    <a  href="index.php">Benvenuto <?php echo $_SESSION['nome']."&nbsp".$_SESSION['cognome'];?> !</a>  
    </h1>
    </div> 
    <div class="panel-body" style="background-color:#353535">
      <table align="center">
        <tr>
          <td align="left">
            
            <h1 style="color:white">
             <a href="aggauto.php">Aggiunta Macchina</a>          <!-- Fare pagina aggiunta auto -->
            </h1>
            
          </td>
          <td width="20%"></td>
          <td align="center">
            <h1 style="color:white">
              Prenotazione
            </h1>
          </td>
          <td width="20%"></td>
          <td align="right">
            <h1 style="color:white">
              Feedback
            </h1>
          </td>
        </tr>
      </table>
    </div>
   
  </body>
  
  
</html>