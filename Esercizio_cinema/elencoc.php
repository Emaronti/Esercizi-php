<?php 
$conn="mysql:host=localhost;dbname=CinemaDB";
$pass="indi1";
$user="root";
$row=array();
  $dbh=new PDO($conn,$user,$pass);
$query=$dbh->prepare("select Nome,Posti,Citta from Cinema");
$query->execute();
if($query->rowCount()>0){
    $row[]=$query->fetchAll();
    }

echo json_encode($row);
?>