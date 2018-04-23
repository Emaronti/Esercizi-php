<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Firenze&APPID=c4eb728ef70a26766e6d8f34677a6105", function(result){
            $.each(result, function(field){
                $("div").append(field+" ");
              
            });
        });
    });
});
</script>
</head>
<body>

<button>Get JSON data</button>

<div></div>

</body>
</html>
