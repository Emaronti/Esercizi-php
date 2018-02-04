<?php 
session_start();
$a=0;
$b=0;


  
if (!isset($_POST["numero"])) {
     $_SESSION["conta"] = 1; //Initialize count
     $_POST["random"] = rand(0,100);
    
} else if ($_POST["numero"] > $_POST["random"]) { //greater than
    $message = $_POST["numero"]." e' troppo alto! Prova un numero piu' piccolo.";
    $_SESSION["conta"]++; //Declare the variable $count to increment by 1.

} else if ($_POST["numero"] < $_POST["random"]) { //less than
    $message = $_POST["numero"]." e' troppo basso! Prova un numero piu' grande.";
    $_SESSION["conta"]++; //Declare the variable $count to increment by 1.

}  else if($_POST["numero"] == $_POST["random"]){ // must be equivalent
    //$_SESSION["conta"]++;
    $message = "Bravo! Hai indovinato in ".$_SESSION["conta"]." tentativi!"; 
    $a=1;
    unset($_SESSION["conta"]);
        //Include the $count variable to the $message to show the user how many tries to took him.
}
  

if(isset($_SESSION["conta"])){
if($_SESSION["conta"]==8){
  $b=1;
  $message="Hai superato il max di 7 tentativi.";
}
}



?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body style="background-color:#dbfedb">
    <div align='center'>
      <h1><?php if(isset($message)){ echo $message; }?></h1>
      <?php if($a==0 and $b==0){ ?>
       <h2>Gioco dell'indovina numero</h2>  <br>
         Tentativo n. <?php if(isset($_SESSION["conta"])){echo $_SESSION["conta"];} ?>  <br>
          <b> Inserisci il numero</b> <br> <br>
          <form action='' method="post">
           <input type='text' name="numero" style="background-color:yellow"><br> 
            <input type="hidden" name="random" value="<?php echo $_POST["random"]; ?>" > <br>
            <input type='submit' value='Conferma' class="btn btn-danger">
      </form>
      <?php } ?>
      <br><br>
      <?php if($b==1 or $a==1) { echo "<form action='' >
          <input type='submit' value='Riprova' class='btn btn-success'>
      </form>"; }?>
    </div>
  </body>
</html>
