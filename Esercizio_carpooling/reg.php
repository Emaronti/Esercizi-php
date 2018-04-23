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
  
  <script language="Javascript" type="text/javascript">

function testpass(form1){
  // Verifico che le due password siano uguali, in caso contrario avverto
  // dell'errore con un Alert
  if (form1.pass.value !=  form1.pass1.value) {
    alert("La password inserita non coincide con la prima!");
    form1.pass.focus();
    form1.pass.select();
    return false;
  }
  return true;
}

    function PassOAut(){
      if(document.getElementById('yesCheck').checked){
         document.getElementById('npat').style.display = 'none';
        document.getElementById('datasc').style.display = 'none';
      }
      else{
        document.getElementById('npat').style.display = 'block';
        document.getElementById('datasc').style.display = 'block';
      }
    }
    
    
</script>
  
</head>

<body>

  <div class="container" style="width:940px">

    <div class="panel panel-default" style="background-color:#007BFF"  style="width:900px">
      <div class="panel-heading" style="background-color:#007BFF;width:900px"><h1>Modulo di iscrizione</h1></div>
      <div class="panel-body" style="width:900px">
        
        Tipo Persona
        <div>
          <label style="color:white"><input type="radio" onclick="javascript:PassOAut();" name="contr" id="yesCheck"  /> Passeggero</label>
          <label style="color:white"> <input type="radio" onclick="javascript:PassOAut();" name="contr" id="noCheck"  />Autista </label>
        </div>
        
        
        
        
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

          Telefono: <input type="text" class="form-control" size="35" name="tel" required>  <br>
          
          Data Nascita: <input type="date" class="form-control" name="datan" required> 

         <div id="npat"><br> Numero Patente <input type="text" class="form-control" size="35" name="npat" ></div>  <br>
          
          <div id="datasc"> Scadenza Patente <input type="date" class="form-control" name="datasc"> <br></div> 
          
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