<?php
$a=0;
$nome= $_REQUEST["nome"];
$cognome= $_REQUEST["cognome"];
$sesso= $_REQUEST["sesso"];
$nazi= $_REQUEST["nazi"];
$tel=$_REQUEST["tel"];
$data=$_REQUEST["datan"];
$pass1= $_REQUEST["pass"];
$email=$_REQUEST["email"];

if(isset($_REQUEST["npat"]) and isset($_REQUEST["datasc"])){
  $npat=$_REQUEST["npat"];
  $datasc=$_REQUEST["datasc"];
}

$conn="mysql:host=localhost;dbname=CarPooling";
$pass="indi1";
$user="root";

if(isset($_REQUEST["npat"]) and isset($_REQUEST["datasc"])){
  try{
  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("insert into Autista(cognome,nome,email,password,telefono,data_nascita,sesso,nazionalita,numero_patente,scadenza_patente) values(:cognome,:nome,:email,MD5(:password),:telefono,:data_nascita,:sesso,:nazionalita,:npat,:datasc)");
  $query->bindValue(":cognome",$cognome);
  $query->bindValue(":nome",$nome);
  $query->bindValue(":email",$email);
  $query->bindValue(":password",$pass1);
  $query->bindValue(":telefono",$tel);
  $query->bindValue(":data_nascita",$data);                                                                                                                                                                                                    
  $query->bindValue(":sesso",$sesso);
  $query->bindValue(":nazionalita",$nazi);
  $query->bindValue(":npat",$npat);
  $query->bindValue(":datasc",$datasc);
  
  if(!$query->execute())
    $a=1;
  else
    $a=2;
}catch(PDOException $e){
  echo "Connection Failed".$e->getMessage();
}
}
else{
try{
  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("insert into Passeggero(cognome,nome,email,password,telefono,data_nascita,sesso,nazionalita) values(:cognome,:nome,:email,MD5(:password),:telefono,:data_nascita,:sesso,:nazionalita)");
  $query->bindValue(":cognome",$cognome);
  $query->bindValue(":nome",$nome);
  $query->bindValue(":email",$email);
  $query->bindValue(":password",$pass1);
  $query->bindValue(":telefono",$tel);
  $query->bindValue(":data_nascita",$data);                                                                                                                                                                                                    
  $query->bindValue(":sesso",$sesso);
  $query->bindValue(":nazionalita",$nazi);
  
  if(!$query->execute())
    $a=1;
  else
    $a=2;
}catch(PDOException $e){
  echo "Connection Failed".$e->getMessage();
}
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
          echo "<h2 align='center' >Dati non correttamente registrati</h2>";
        
        else if($a==2)
          echo "<h2 align='center' >Dati correttamente registrati</h2>";
        
        ?>
        

      </div>
      
      
       <div class="panel-footer" align="center"  style="background-color:gold;width:900px">
      
       <a href="index.php"> <button type="button" class="btn"  style="background-color:white"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Chiudi</button></a>
         
      </div>
     </div>
     
  
</body>  
</html>