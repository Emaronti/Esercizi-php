<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <style>
    body,h1{
      color:white;
    }
  </style>
  
  <script language="Javascript" type="text/javascript">
<!-- 
function testpass(form1){
  
  
  // Verifico che le due password siano uguali, in caso contrario avverto
  // dell'errore con un Alert
  if (form1.pass.value !=  form1.pass1.value) {
    alert("La password inserita non coincide con la prima!")
    form1.pass.focus()
    form1.pass.select()
    return false
  }
  return true
}
-->
</script>
  
</head>

<body>

  <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:#007BFF"  style="width:900px">
      <div class="panel-heading" style="background-color:#007BFF;width:900px"><h1>Modulo di iscrizione</h1></div>
      <div class="panel-body" style="width:900px">
        <form action='signup.php' method='post' name='form1' onsubmit="return testpass(this)">
          
          Cognome: <input type="text"  class="form-control"  name="cognome" required> 
          <br> 
          Nome: <input type="text" class="form-control"  name="nome" required> <br> 
          
          <br>
          Sesso:
          <div class="radio">
            <label><input type="radio" name="gender" value="Maschile" required>Maschile</label>

            <label><input type="radio" name="gender" value="Femminile" required>Femminile</label>
                      
          </div>
          <br> Nazionalita <select class="form-control" id="sel1" name="nazionalita" required>
             <option value="Italiana">Italiana</option>
            <option value="Inglese">Inglese</option>
            <option value="Statunitense">Statunitense</option>
            <option value="Spagnola">Spagnola</option>
         </select> <br>

          <div class="checkbox">
            <label><input type="checkbox" name="cat" value="categ. A">Cat. A</label>
            <label><input type="checkbox" name="cat1" value="categ. B">Cat. B</label>
          </div> <br>

          e-mail: <input type="email" class="form-control" size="35" name="email" required> <br>
          
          Password: <input type="password" class="form-control" size="35" name="pass"  required><br>
          Conferma password: <input type="password" class="form-control" size="35" name="pass1"  required>
        

      </div>
      <div class="panel-footer" align="center"  style="background-color:#007BFF;width:900px">

        <button type="reset" class="btn"  style="background-color:grey"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Annulla</button>
        <button type="submit" class="btn btn-danger" value="Submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Conferma</button>
      </div>
    </div>
  
</form>
</body>

</html>