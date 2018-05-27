$(document).ready(function(){
  
  $("#sel").on("change",function(){
    var lung=$("#tabe tr").length;
    var t = document.getElementById("table");
    var trs = t.getElementsByTagName("tr");
     var tds = trs[0].getElementsByTagName("td");
      alert(tds[2].html());
    for(var i=0;i<lung;i++){
    
      if(r.html()==$("#sel").value()){
        alert("Come ci sei arrivato qua?");
      }
      
    }
  })
  
  
  $("#btn").click(function(){
    $.getJSON("elencoc.php",function(data){
           
      for(var i=0;i<=data.length+1;i++){
     $("#tabe").append("<tr value='"+i+"'><td>"+data[0][i].Nome+"</td><td>"+data[0][i].Posti+"</td><td>"+data[0][i].Citta+"</td>");
     $("#sel").append("<option value='"+data[0][i].Citta+"'>"+data[0][i].Citta+"</option>")
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