

<?php
session_start();
//connect to DB
require_once('include/conn.php');

//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){
$stmt = $dbh->prepare("INSERT INTO `users`(`name`,`email`,`mobile`,`password`,`image`) VALUES (:name, :email, :mobile, :password, :image)");
//bindParam
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mobile', $mobile);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':image', $image);

//insert File
$target_dir = "assets/img/user/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//Fatch data user form
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$passwordtest = $_POST['password'];
$image = $target_file;
$confirmpassword = $_POST['confirmpassword'];

//check name 

//checkpassword
if($passwordtest == $confirmpassword){
  $password = ($passwordtest);
  if($stmt->execute()){
       $message="Insert Row Scuccess";
      header("Location:login.php");
    }
    else{
      $message="Insert Row Fail";
    }
  
}
else{
  $message="confirm password Not match!";
  header("Location:register.php");
}
}
else{
  $message="You file is not an image!";
  header("Location:register.php");
}
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login -  Admin</title>
  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        
      </div>
      <div class="login-box2">
        <!-- <form action="" method="post" enctype="multipart/form-data"> -->
          
       
        <form action="register.php"name="myform" method="post" class="login-form" enctype="multipart/form-data" onsubmit="validateform()">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i> Patient Register</h3>
           <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div> 
          <div class="form-group">
            <label class="control-label text-dark"">USERNAME <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" autocomplete="off" onkeyup="checkName()" onblur="checkName()"> 
            <span id="nameErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label text-dark"">USER EMAIL <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" onkeyup="checkEmail()" onblur="checkEmail()">
              <span id="emailErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label text-dark"">MOBILE <span class="text-danger">*</span></label>
            <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile no" autocomplete="off" onkeyup="checkMobile()" onblur="checkMobile()">
            <span id="mobileErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label text-dark"">PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" id="password" onkeyup="checkPass()" onblur="checkPass()">
            <span id="passErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label text-dark"" >RE-TYPE PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="RE-type Password" autocomplete="off">
            <span id='message'></span>
          </div>
          <div class="form-group">
            <label class="control-label text-dark">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="" class="form-control">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>

            <!-- <button class="btn btn-primary btn-block" type="reset" <i class="fa fa-sign-in fa-lg fa-fw"></i>Reset</button> -->
          </div>

        </form>
        
      </div>
      <a href="login.php">Already have an account?</a>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#password, #confirmpassword').on('keyup', function () {
          if ($('#password').val() == $('#confirmpassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
      });
    </script>

    <!-- JS Validation Start -->

    <script>  

    function validateform(){  
    var name=document.myform.name.value;  
    var email=document.myform.email.value;
    var mobile=document.myform.mobile.value;
    var password=document.myform.password.value;  
      
    if (name==null || name==""){  
      alert("Name can't be Empty");  
      return false;  
    }else if (email==null || email=="") {
      alert("Email can't be Empty");
      return false;  
    }else if (mobile==null || mobile=="") {
      alert("mobile Number can't be Empty");
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }  
    }
    function checkEmpty() {
        if (document.myform.name.value = "") {
          alert("Name can't be Empty");
            return false;  
        }
      }  
    function checkName() {
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("nameErr").style.color = "red";
          document.getElementById("name").style.borderColor = "red";
      }else{
          document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "green";
      }
      
        }

          function checkEmail() {
      if (document.getElementById("email").value == "") {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
      }else{
          document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "green";
      }
      
        }

         function checkMobile() {
      if (document.getElementById("mobile").value == "") {
          document.getElementById("mobileErr").innerHTML = "Mobile number can't be blank";
          document.getElementById("mobileErr").style.color = "red";
          document.getElementById("mobile").style.borderColor = "red";
      }else if(document.getElementById("mobile").value.length < 11){
          document.getElementById("mobileErr").style.color = "red";
          document.getElementById("mobile").style.borderColor = "red";
        document.getElementById("mobileErr").innerHTML = "Mobile number is not valid";
      }
      else{
          document.getElementById("mobileErr").style.color = "red";
        document.getElementById("mobileErr").innerHTML = "";
        document.getElementById("mobile").style.borderColor = "green";
      }
      
        }


        function checkPass(){
          if (document.getElementById("password").value == "") {
          document.getElementById("passErr").innerHTML = "Password can't be blank";
          document.getElementById("passErr").style.color = "red";
          document.getElementById("password").style.borderColor = "red";
      }else if(document.getElementById("password").value.length<6){
          document.getElementById("password").style.borderColor = "red";
          document.getElementById("passErr").style.color = "red";
        document.getElementById("passErr").innerHTML = "Password must be at least 6 characters long.";
      }
      else{
        document.getElementById("passErr").innerHTML = "";
          document.getElementById("passErr").style.color = "red";
        document.getElementById("password").style.borderColor = "green";
      }
        }

        
</script>  
    <!-- JS Validation End -->


    
  </body>
</html>