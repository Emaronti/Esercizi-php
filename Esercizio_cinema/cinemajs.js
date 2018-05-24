$(document).ready(function(){
  
  $("#btn").click(function(){
    $.getJSON("elencoc.php",function(data){
      for(var i in data){
     $("#tabe").append("<tr><td>"+data[i].Nome+"</td><td>"+data[i].Posti+"</td><td>"+data[i].Citta+"</td>");
     
      }
    });
  });
});