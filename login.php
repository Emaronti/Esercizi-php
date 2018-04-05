<?php
session_start();
if(isset($_SESSION['email']))
  header('Location:index.php');



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
     
    <div class="panel panel-default" style="background-color:#007BFF"  style="width:900px">
      <div class="panel-heading" style="background-color:#007BFF;width:900px"><h1>Login</h1></div>
      <div class="panel-body" style="width:900px">
        <form action='dashb.php' method='post' name='form1' >
          
         e-mail: <input type="text" class="form-control" size="35" name="email" required> <br>
          
         Password: <input type="password" class="form-control" size="35" name="pass"  required><br>
      </div>
      <div class="panel-footer" align="center"  style="background-color:#007BFF;width:900px">

        <button type="reset" class="btn"  style="background-color:grey"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Annulla</button>
        <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button>
        
      </div>
    </div>
  
</form>

</body>
</html>