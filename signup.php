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

$pass=$_REQUEST["pass"];

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
     
     a{
       color: inherit;
     }
  </style>
  
</head>

<body>

  <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:#6C757D"  style="width:900px">
      <div class="panel-heading" style="background-color:#6C757D;width:900px"><h1>Riepilogo dati</h1></div>
      <div class="panel-body" style="width:900px">
        
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
                <br>
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

        
        <form method="post" action="esito.php">
          <input type="hidden" name="nome" value="<?php echo $nome ?>">
          <input type="hidden" name="cognome" value="<?php echo $cognome ?>">
          <input type="hidden" name="sesso" value="<?php echo $sesso ?>">
          <input type="hidden" name="nazi" value="<?php echo $nazionalita ?>">
          <input type="hidden" name="cate" value="<?php if($a==1){echo $cat; } if($a==2){echo $cat1; } ?>">
          <input type="hidden" name="pass" value="<?php echo $pass ?>">
          
          <a href="javascript:history.go(-1)"> <button type="button" class="btn"  style="background-color:#6C757D"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Correggi</button></a>
         <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button>
        </form>
       
      </div>
    
  

</body>
</html>