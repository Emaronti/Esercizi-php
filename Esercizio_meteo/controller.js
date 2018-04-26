$(document).ready(function(){
  
    $("button").click(function(){
        var results = "";
      $.get("http://api.openweathermap.org/data/2.5/weather?q=Firenze&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
        results = JSON.parse(data);
      });
      console.log(results);
    });
});
