<?php 
if(isset($random)){
  echo $random;
}

if(!isset($random))
$random=rand(0,5);

if(isset($_POST["numero"])){
  $numero=$_POST["numero"];
  }

if(isset($numero)){
  if($numero==$random)
    echo "<h1>LOLOLOL</h1>";
}



?>
<html>
  <body>
    <div align='center'>
       <h2>Gioco dell'indovina numero</h2>  <br>
         Tentativo n. <?php echo $random ?>  <br>
          <form action='' method="post">
           <input type='text' name="numero"><br> 
            <input type='submit' value='Conferma'>
           
            
      </form>
    </div>
  </body>
</html>
