 $(document).ready(function(){
  var da=new Date();
    da.toUTCString();
    $("button").click(function(){
        
      $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Firenze&APPID=c4eb728ef70a26766e6d8f34677a6105",function(data){
         $("#testa").append(da);
        $("#corpo").append("<tr><td>"+data.wind.deg + "</td></tr> <br>  ");
      });
      
    });
});
