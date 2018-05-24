<?php 
$conn="mysql:host=localhost;dbname=CinemaDB";
$pass="indi1";
$user="root";

  $dbh=new PDO($conn,$user,$pass);
$query=$dbh->prepare("select Nome,Posti,Citta from Cinema");
$query->execute();
if($query->rowCount()>0){
    $row[]=$query->fetch();
    }
echo json_encode($row);
?>