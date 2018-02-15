<?php
$a=0;
$nome= $_REQUEST["nome"];
$cognome= $_REQUEST["cognome"];
$sesso= $_REQUEST["sesso"];
$nazi= $_REQUEST["nazi"];
$cate= $_REQUEST["cate"];
$pass1= $_REQUEST["pass"];

$conn="mysql:host=localhost;dbname=Signup";
$pass="indi1";
$user="root";
try{
  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("insert into Utenti(nome,cognome,sesso,nazionalita,categoria,password) values(:nome,:cognome,:sesso,:nazionalita,:categoria,:password)");
  $query->bindValue(":nome",$nome);
  $query->bindValue(":cognome",$cognome);
  $query->bindValue(":sesso",$sesso);
  $query->bindValue(":nazionalita",$nazi);
  $query->bindValue(":categoria",$cate);
  $query->bindValue(":password",$pass1);
  
  if(!$query->execute())
    $a=1;
  else
    $a=2;
}catch(PDOException $e){
  echo "Connection Failed".$e->getMessage();
}
?>

<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  
  
 <body>
   
  
 <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:gold"  style="width:900px">
      <div class="panel-heading" style="background-color:gold;width:900px"><h1>Esito Registrazione</h1></div>
      <div class="panel-body" style="width:900px">
        
              
          <?php
        
        if($a==1)
          echo "Non Riuscito";
        
        else if($a==2)
          echo "Riuscito";
        
        ?>
        

      </div>
        </div>
      <div class="panel-footer" align="center"  style="background-color:gold;width:900px">

        
       
        </form>
       
      </div>
  
</body>  
</html>