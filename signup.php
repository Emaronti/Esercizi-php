<?php
$a=0;
$cognome=$_REQUEST["cognome"];

$nome=$_REQUEST["nome"];


$sesso=$_REQUEST["gender"];


$nazionalita=$_REQUEST["nazionalita"];

if(isset($_REQUEST["cat"]) and isset($_REQUEST["cat1"])){
$cat=$_REQUEST["cat"];
$cat1=$_REQUEST["cat1"];
$a=2;
}

else if(isset($_REQUEST["cat"])){
$cat=$_REQUEST["cat"];
$a=1;
}

else if(isset($_REQUEST["cat1"])){
$cat=$_REQUEST["cat1"];
$a=1;
}

$email=$_REQUEST["email"];


?>

<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
   <style>
    body,h1{
      color:white;
    }
     
     .spa{
       text-align:center;
       
     }
  </style>
  
</head>

<body>

  <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:#6C757D"  style="width:900px">
      <div class="panel-heading" style="background-color:#6C757D;width:900px"><h1>Riepilogo dati</h1></div>
      <div class="panel-body" style="width:900px">
        <form action='signup.php' method='post'>
          <div class='spa'>
            <table align="center">
              <tr>
            <td align="right">
              Cognome:<br>
              Nome:<br>
              Sesso:<br>
              Nazionalita:<br>
              <?php if($a!=0){echo "Patente:"; } ?>
              </td> 
                
              <td align="left">
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$cognome ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$nome ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$sesso ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$nazionalita ?></b><br>
                <b><?php if($a==1){echo "&nbsp&nbsp&nbsp&nbsp".$cat; } ?></b><br>
                <b><?php if($a==2){echo "&nbsp&nbsp&nbsp&nbsp".$cat1; } ?></b><br>
                </td>
              </tr>
         
          </div>
    </table>     
          
        

      </div>
        </div>
      <div class="panel-footer" align="center"  style="background-color:#6C757D;width:900px">

        <button type="reset" class="btn"  style="background-color:#6C757D"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Correggi</button>
        <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button>
      </div>
    
  
</form>
</body>
</html>