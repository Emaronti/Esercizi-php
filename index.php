<html>
  <head>
    <style>
      .titolo{
        color:#FF857C;
      }
      .login,.registra,.dashboard,.logout{
        position:relative;
        left:44%
      }
      a{
        text-decoration:none;
        color:black;
      }
      h3{
        position:relative;
        top:50%;
        left:43%;
        color:red;
      }
    </style>
    
  </head>
  
  <body>
    <div class="titolo">
      <h1 align="center">
        Menu Principale
      </h1>
    </div>
    
    <div class="bottoni">
    <a href="login.php"><button class="login">Login</button></a>   
    <a href="reg.php"> <button class="registra"> Register</button></a> 
     <a href="dashb.php"><button class="dashboard">Dashboard</button></a> 
      
      <?php 
      
      session_start();

      if(isset($_SESSION['email'])){
      echo "<a href='logout.php'><button class='logout'>Logout</button></a>";
      }

       if(isset($_SESSION['msg'])){
         echo $_SESSION['msg'];
       }
         
         
      ?>
  </div>
  
  
  
  
</div>
    
    
    
    
    
  </body>
  
</html>