<?php 
session_start();
$a=0;
$b=0;

if(isset($_SESSION["conta"])){
if($_SESSION["conta"]==7){
  $b=1;
}
}
  
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
    $message = "Bravoh! Hai indovinato in ".$_SESSION["conta"]." tentativi!"; 
    $a=1;
    unset($_SESSION["conta"]);
        //Include the $count variable to the $message to show the user how many tries to took him.
}
  





?>
<html>
  <body>
    <div align='center'>
      <h1><?php if(isset($message)){ echo $message; }?></h1>
      <?php if($a==0 and $b==0){ ?>
       <h2>Gioco dell'indovina numero <?php echo $_POST["random"] ?></h2>  <br>
         Tentativo n. <?php if(isset($_SESSION["conta"])){echo $_SESSION["conta"];} ?>  <br>
          <form action='' method="post">
           <input type='text' name="numero"><br> 
            <input type="hidden" name="random" value="<?php echo $_POST["random"]; ?>" >
            <input type='submit' value='Conferma'>
      </form>
      <?php } ?>
      <br><br>
      <?php if($b==1 or $a==1) { echo "<form action='' >
          <input type='submit' value='Riprova'>
      </form>"; }?>
    </div>
  </body>
</html>
