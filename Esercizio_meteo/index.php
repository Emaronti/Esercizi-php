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
    $("#btn").click(function(){
    
             
      $.getJSON("https://api.openweathermap.org/data/2.5/weather?q="+document.getElementById("citta").value+"&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
        
        
        $("#main").text(data.weather[0].main);
        $("#desc").text(data.weather[0].description);
        $("#temp").text(data.main.temp);
        $("#press").text(data.main.pressure);
        $("#humi").text(data.main.humidity);
        $("#wins").text(data.wind.speed);
        $("#wind").text(data.wind.deg);
        $("#vis").text(data.visibility);
        
        $("#long").text(data.name+", "+data.sys.country+" ("+data.coord.lon+", "+data.coord.lat+")");       
        
      });
      
    });
    
    $("#btn1").click(function(){
      
             
      $.getJSON("https://api.openweathermap.org/data/2.5/forecast?q="+document.getElementById("citta1").value+"&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
        
        
        for(var i in data.list){
          $("#data").append("<option>"+data.list[i].dt_txt+"</option>")
        
        }
      
    });         
    });
    
    $("#data").change(function(){
      $.getJSON("https://api.openweathermap.org/data/2.5/forecast?q="+document.getElementById("citta1").value+"&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
    for(var i in data.list){
     
         if(data.list[i].dt_txt==document.getElementById("data").value){
           
        $("#main1").text(data.list[i].weather[0].main);
        $("#desc1").text(data.list[i].weather[0].description);
        $("#temp1").text(data.list[i].main.temp);
        $("#press1").text(data.list[i].main.pressure);
        $("#humi1").text(data.list[i].main.humidity);
        $("#wins1").text(data.list[i].wind.speed);
        $("#wind1").text(data.list[i].wind.deg);
        
        $("#long1").text(data.city.name+", "+data.city.country+" ("+data.city.coord.lon+", "+data.city.coord.lat+")");   
         }
        
        }    
      });
    });
    
  });

  </script>
  
 

<body style="background-color:#193441">
  <h1 style="color:white" align="center">
    Weather/Forecast
  </h1>
  <br><br>
  
  <input type="text" id="citta" class="input-medium search-query" style="width:300px;margin-left:20px;border-radius:5px">
  <button class="btn btn-small" style="margin-left:20px;padding-top:3px;padding-bottom:2px"  id="btn">Search</button>

        
        
            
   
  

  <br><br><br>
  
<div class="panel panel-primary" style="width:600px;margin:0 auto">
      <div class="panel-heading" id="testa">Weather<br></div>
      <div class="panel-body" id="corpo" style="background-color:#81CEBF;">
        <div id="long"> </div> <br>
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
  <br><br><br><br>
  
  <hr>
  
  
  
  
  <input type="text" id="citta1" class="input-medium search-query" style="width:300px;margin-left:20px;border-radius:5px"> 
  <button id="btn1" class="btn btn-small" style="margin-left:20px;padding-top:3px;padding-bottom:2px;margin-right:2em">Search</button><br><br>
  <b style="color:white;margin-right:2em;margin-left:20px">Seleziona una data</b> <select id="data" class="input-medium search-query" style="border-radius:5px;padding-bottom:2px" >
    
  </select>  
  <br><br><br>
  
<div class="panel panel-primary" style="width:600px;margin:0 auto">
      <div class="panel-heading" id="testa1">Forecast<br></div>
      <div class="panel-body" id="corpo1" style="background-color:#81CEBF;">
        <div id="long1"> </div> <br>
        <table id="tabe1"  class="table table-hover" align="center"   >
          <tr><td>Main</td><td id="main1"></td></tr>
          <tr><td>Description</td><td id="desc1"></td></tr>
          <tr><td>Temp</td><td id="temp1"></td></tr>
          <tr><td>Pressure</td><td id="press1"></td></tr>
          <tr><td>Humidity</td><td id="humi1"></td></tr>
          <tr><td>Wind speed</td><td id="wins1"></td></tr>
          <tr><td>Wind deg</td><td id="wind1"></td></tr>
          
        </table>  
      </div>
    </div>
  

</body>
</html>
