<?php 
session_start();

if(!isset($_REQUEST['email'])){
  header('Location:index.html');
}

else if(isset($_REQUEST['email'])){
  $conn="mysql:host=localhost;dbname=Signup";
  $pass="indi1";
  $user="root";
try{
  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("select * from Utenti where password=:password and email=:email");
  
  $query->bindValue(":password",$_REQUEST['pass']);
  $query->bindValue(":email",$_REQUEST['email']);
  $query->execute();
  if($query->rowCount()>0){
    $row=$query->fetch();
    $_SESSION['email']=$row['email'];
    $_SESSION['nome']=$row['nome'];
    $_SESSION['cognome']=$row['cognome'];
  }
  else if($query->rowCount()==0){
    header('Location:index.html');  
  }
    
}catch(PDOException $e){
  echo "Connection Failed".$e->getMessage();
}
}
?>

<html>
  <head>
    
  </head>
  
  <body>
    <h1>
      Benvenuto <?php echo $_SESSION['email'];?> !
    </h1>
  </body>
  
  
</html>