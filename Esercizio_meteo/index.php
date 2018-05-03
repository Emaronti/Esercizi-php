<!DOCTYPE html>
<html>
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
    $("button").click(function(){
        
      $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Firenze&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
         $("#testa").append(da);
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
  
 

<body>

<button>Get JSON data</button>

  
<div class="panel panel-primary">
      <div class="panel-heading" id="testa">Weather<br></div>
      <div class="panel-body" id="corpo">
        <table id="tabe"  class="table table-striped">
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
