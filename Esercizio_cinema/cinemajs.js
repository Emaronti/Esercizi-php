$(document).ready(function(){
  
  
  
  $("#btn").click(function(){
    $.getJSON("elencoc.php",function(data){
           
      for(var i=0;i<=data.length+1;i++){
     $("#tabe").append("<tr><td>"+data[0][i].Nome+"</td><td>"+data[0][i].Posti+"</td><td>"+data[0][i].Citta+"</td>");
     
      }
    });
  });
  
  
  
  $("#btn1").click(function(){
    $.getJSON("elencof.php",function(data){
           
      for(var i=0;i<=data.length+1;i++){
     $("#tabe1").append("<tr><td>"+data[0][i].Titolo+"</td><td>"+data[0][i].AnnoProduzione+"</td><td>"+data[0][i].Genere+"</td>");
     
      }
    });
  });
  
  
});