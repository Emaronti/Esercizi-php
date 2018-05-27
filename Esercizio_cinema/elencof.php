<?php 
$conn="mysql:host=localhost;dbname=CinemaDB";
$pass="indi1";
$user="root";
$row=array();
  $dbh=new PDO($conn,$user,$pass);
$query=$dbh->prepare("select Titolo,AnnoProduzione,Genere from Film");
$query->execute();
if($query->rowCount()>0){
    $row[]=$query->fetchAll();
    }

echo json_encode($row);
?>