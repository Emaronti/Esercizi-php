<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <style>
    
    body{
      color:white;
      background-color:#353535;
    }
    h1{
      color:white;
    }
  </style>
  
  
  
</head>

<body>

  <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:#007BFF"  style="width:900px">
      <div class="panel-heading" style="background-color:#007BFF;width:900px"><h1>Aggiunta macchina</h1></div>
      <div class="panel-body" style="width:900px">
        <form action='aggauto1.php' method='post' name='formagg'>
          <br>
          Targa<input type="text" name="targa" class="form-control" required>
          <br>
          Marca<input type="text" name="marca" class="form-control" required>
          <br>
          Modello<input type="text" name="modello" class="form-control" required>
          <br>
          Cilindrata<input type="text" name="cilindrata" class="form-control" required>
          <br>
          Potenza<input type="text" name="potenza" class="form-control" required>
          <br>
          
        

      </div>
      <div class="panel-footer" align="center"  style="background-color:#007BFF;width:900px">

        <button type="reset" class="btn"  style="background-color:grey"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Annulla</button>
        <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button> 
        </form>
      </div>
    </div>
  
</form>
</body>

</html>