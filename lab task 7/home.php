
<?php
   include('include/nav.php');
  
?>

  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Home</title>
  	
  	<style type="text/css" media="screen">

  		.*{
  			padding: 0px;
  			margin: 0px;

       
  		}
  		.text{
  			font-family: "Montserrat",sans-serif; 
  			text-align: center;
        font-size: 40px;
  		}

      .bg-img{
           background-image:url('assets/img/Nurse.jpeg');
           background-size: 100% 100%;

      }

      .button{
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;

        
      }
      .button1 {
        background-color: #e52028;
         
      }
      .button2{
        background-color: #e52028;
        
      }
     


  		
  	</style>



  </head>
  <body>
  	
    <div class="bg-img">

      <br>
      <br>
      <br>
      <br>
    <br><br>
    <br>
      
      <h1 class="text">  Wellcome to the <span style="color:#e61e28;"> <br> DOCTOR</span>  F I N D E R !</h1>
      <br><br>


      <div align=center>
      <a href="login.php"><button class="button button1" >Login</button></a> <a href="usertype.php"><button class="button button2" >Registration</button></a>
      </div>

        
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
   
    <br>
    <br>
    <br>
    
     <?php  
        include('include/Hfooter.php');
    ?>
    
    


    </div>
    
  	
  

  	
  </body>
  </html>




