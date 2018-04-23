<?php
session_start();

$targa=$_REQUEST["targa"];
$marca=$_REQUEST["marca"];
$modello=$_REQUEST["modello"];
$cilindrata=$_REQUEST["cilindrata"];
$potenza=$_REQUEST["potenza"];
$idaut=$_SESSION["idAut"];



$conn="mysql:host=localhost;dbname=CarPooling";
$pass="indi1";
$user="root";

  $dbh=new PDO($conn,$user,$pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query= $dbh->prepare("insert into Auto(targa,marca,modello,cilindrata,potenza,id_autista) values(:targa,:marca,:modello,:cilindrata,:potenza,:idaut)");
  $query->bindValue(":targa",$targa);
  $query->bindValue(":marca",$marca);
  $query->bindValue(":modello",$modello);
  $query->bindValue(":cilindrata",$cilindrata);
  $query->bindValue(":potenza",$potenza);
  $query->bindValue(":idaut",$idaut);                                                                                                                                                                                                    
  $query->execute();  

  header("location:dashb.php");

?>