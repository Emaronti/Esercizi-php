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
      <div class="panel-heading" style="background-color:#007BFF;width:900px"><h1>Aggiunta Viaggio</h1></div>
      <div class="panel-body" style="width:900px">
        <form action='aggviaggio1.php' method='post' name='formagg'>
          <br>
          Data<input type="date" name="data" class="form-control" required>
          <br>
          Partenza<input type="text" name="part" class="form-control" required>
          <br>
          Destinazione<input type="text" name="dest" class="form-control" required>
          <br>
          Importo<input type="text" name="imp" class="form-control" required>
          <br>
          Ora partenza<input type="time" name="orapart" class="form-control" required>
          <br>
          Ora arrivo<input type="time" name="oraarr" class="form-control" required>
          <br>
          Durata<input type="text" name="dur" class="form-control" required>
          <br>
          Bagagli<br>Si<input type="radio" name="bag" value="1"> 
          <br>
          No<input type="radio" name="bag" value="0" checked> 
          <br><br>
          Animali<br>Si<input type="radio" name="anim" value="1"> 
          <br>
          No<input type="radio" name="anim" value="0" checked> 
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