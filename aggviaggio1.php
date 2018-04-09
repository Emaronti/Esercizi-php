<?php
session_start();

$data=$_REQUEST["data"];
$partenza=$_REQUEST["part"];
$destinazione=$_REQUEST["dest"];
$importo=$_REQUEST["imp"];
$orapartenza=$_REQUEST["orapart"];
$oraarrivo=$_REQUEST["oraarr"];
$durata=$_REQUEST["dur"];
$bagagli=$_REQUEST["bag"];
$animali=$_REQUEST["anim"];




$conn="mysql:host=localhost;dbname=CarPooling";
$pass="indi1";
$user="root";

  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("insert into Viaggio(data,partenza,destinazione,importo,ora_partenza,ora_arrivo,durata,bagagli,animali) values(:data,:partenza,:destinazione,:importo,:orapartenza,:oraarrivo,:durata,:bagagli,:animali)");
  $query->bindValue(":data",$data);
  $query->bindValue(":partenza",$partenza);
  $query->bindValue(":destinazione",$destinazione);
  $query->bindValue(":importo",$importo);
  $query->bindValue(":orapartenza",$orapartenza);
  $query->bindValue(":oraarrivo",$oraarrivo); 
  $query->bindValue(":durata",$durata);
  $query->bindValue(":bagagli",$bagagli);
  $query->bindValue(":animali",$animali);  
  $query->execute();  

  header("location:dashb.php");

?>