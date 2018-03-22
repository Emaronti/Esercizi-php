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
    
    $query= $dbh->prepare("select * from Passeggero where password=MD5(:password) and email=:email");  //NON FA MD5

    $query->bindValue(":password",$_REQUEST['pass']);
    $query->bindValue(":email",$_REQUEST['email']);
    $query->execute();
    if($query->rowCount()>0){
      $_SESSION['msg']="";
      $row=$query->fetch();
      $_SESSION['email']=$row['email'];
      $_SESSION['nome']=$row['nome'];
      $_SESSION['cognome']=$row['cognome'];
    }
    else if($query->rowCount()==0){
      $_SESSION['msg']="<h3>Errore! Email o password sbagliata.</h3>";
      header('Location:index.php');  
    }

  }catch(PDOException $e){
    echo "Connection Failed".$e->getMessage();
  }
  }
}
?>

<html>
  <head>
    
  </head>
  
  <body>
    <h1>
    <a href="index.php">Benvenuto <?php echo $_SESSION['email'];?> !</a>  
    </h1>
  </body>
  
  
</html>