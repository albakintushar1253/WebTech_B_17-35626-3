

<?php
session_start();
//connect to DB
require_once('include/conn.php');

    require_once('include/sql.php');

if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}
else{

  include_once('include/header.php');
include_once('include/sidebar.php');
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
      header("Location:view-profile.php");
    }
    else{
      $message="Insert Row Fail";
    }
  
}
else{
  $message="confirm password Not match!";
  header("Location:add-admin.php");
}
}
else{
  $message="Something is Wrong,Register Again!";
  header("Location:add-admin.php");
}
}
}



?>

<body>
  

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Admin Panel</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="">Admin profile / Add Admin</a></li>
        </ul>
      </div>
     
    <div class="row">
    
    <div class="col-md-6 m-auto">
      <div class="tile">
     
        <div class="tile-body">
         

            
           <form action="add-admin.php" name="myform"  method="post" class="login-form" enctype="multipart/form-data" onsubmit="validateform()">
       
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i> Add Admin</h3>
           <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div> 
          <div class="form-group">
            <label class="control-label">USERNAME <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" autocomplete="off" onkeyup="checkName()" onblur="checkName()">
            <span id="nameErr"></span>

          </div>
          <div class="form-group">
            <label class="control-label">USER EMAIL <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off"  onkeyup="checkEmail()" onblur="checkEmail()">
            <span id="emailErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label">MOBILE <span class="text-danger">*</span></label>
            <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile no" autocomplete="off"  onkeyup="checkMobile()" onblur="checkMobile()">
             <span id="mobileErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" id="password" onkeyup="checkPass()" onblur="checkPass()">
                   <span id="passErr"></span>
          </div>
          <div class="form-group">
            <label class="control-label">RE-TYPE PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="RE-type Password" autocomplete="off">
            <span id='message'></span>
          </div>
          <div class="form-group">
            <label class="control-label">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="" class="form-control">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Add</button>

            <button class="btn btn-primary btn-block" type="reset" <i class="fa fa-sign-in fa-lg fa-fw"></i>Reset</button>
          </div>

        </form>
        
      </div>
     
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


<?php 
    }
 ?>

 </body>
