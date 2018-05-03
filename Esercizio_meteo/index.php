<!DOCTYPE html>
<html >
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 
  
<script>
  $(document).ready(function(){
  var da=new Date();
    da.toUTCString();
    $("#testa").append(da);
    $("button").click(function(){
        
      $.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+document.getElementById("citta").value+"&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
        
        $("#main").append(data.weather[0].main);
        $("#desc").append(data.weather[0].description);
        $("#temp").append(data.main.temp);
        $("#press").append(data.main.pressure);
        $("#humi").append(data.main.humidity);
        $("#wins").append(data.wind.speed);
        $("#wind").append(data.wind.deg);
        $("#vis").append(data.visibility);
        
      });
      
    });
});

  </script>
  
 

<body style="background-color:#193441">
  

  <input type="text" id="citta" class="input-medium search-query" style="width:300px;margin-left:20px">
  <button class="btn btn-small" style="margin-left:20px;padding-top:3px;padding-bottom:2px">Search</button>

        
        
            
   
  

  <br><br><br>
  
<div class="panel panel-primary" style="width:600px;margin:0 auto">
      <div class="panel-heading" id="testa">Weather<br></div>
      <div class="panel-body" id="corpo" style="background-color:#81CEBF;">
        <table id="tabe"  class="table table-hover" align="center"   >
          <tr><td>Main</td><td id="main"></td></tr>
          <tr><td>Description</td><td id="desc"></td></tr>
          <tr><td>Temp</td><td id="temp"></td></tr>
          <tr><td>Pressure</td><td id="press"></td></tr>
          <tr><td>Humidity</td><td id="humi"></td></tr>
          <tr><td>Wind speed</td><td id="wins"></td></tr>
          <tr><td>Wind deg</td><td id="wind"></td></tr>
          <tr><td>Visibility</td><td id="vis"></td></tr>
        </table>  
      </div>
    </div>

</body>
</html>
