<?php
$a=0;
$cognome=$_REQUEST["cognome"];

$nome=$_REQUEST["nome"];

if(isset($_REQUEST["npat"]) and ($_REQUEST["datasc"])){
  $npat=$_REQUEST["npat"];
  $datasc=$_REQUEST["datasc"];
}

$sesso=$_REQUEST["gender"];


$nazionalita=$_REQUEST["nazionalita"];

$tel=$_REQUEST["tel"]

$datan=$_REQUEST["datan"];

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
              Telefono:<br>
              Data Nascita:<br>
              Email:<br>
              </td> 
                
              <td align="left">
                
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$cognome ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$nome ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$sesso ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$nazionalita ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$tel ?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$datan ?></b><br>
                <b><?php if(isset($_REQUEST["npat"])){ echo "&nbsp&nbsp&nbsp&nbsp".$npat }?></b><br>
                <b><?php if(isset($_REQUEST["datasc"])){ echo "&nbsp&nbsp&nbsp&nbsp".$datasc }?></b><br>
                <b><?php echo "&nbsp&nbsp&nbsp&nbsp".$email ?></b><br>
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
          
          <input type="hidden" name="tel" value="<?php echo $tel ?>">          
          <input type="hidden" name="datan" value="<?php echo $datan ?>">
          <input type="hidden" name="npat" value="<?php if(isset($_REQUEST["npat"])){ echo $npat } ?>">
          <input type="hidden" name="npat" value="<?php if(isset($_REQUEST["datasc"])){ echo $datasc } ?>">
          
          <input type="hidden" name="pass" value="<?php echo $pass ?>">
          <input type="hidden" name="email" value="<?php echo $email ?>">
          
          <a href="javascript:history.go(-1)"> <button type="button" class="btn"  style="background-color:#6C757D"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Correggi</button></a>
         <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button>
        </form>
       
      </div>
    
  

</body>
</html>