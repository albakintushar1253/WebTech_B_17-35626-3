
<?php 
    include('include/nav.php');
 ?>

<?php
session_start();
//connect to DB
require_once('include/conn.php');
//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){
$stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email and password = :password");
//bindParam
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
//Fatch data user form
$email = $_POST['email'];
$password = ($_POST['password']);
//Facth data form Database
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check Valid User
if($row != null) {
foreach ($row as $value) {
$_SESSION["id"] = $value['id'];
$_SESSION["alogin"] = $value['email'];
$_SESSION["image"] = $value['image'];
$_SESSION["name"] = $value['name'];
$_SESSION["mobile"] = $value['mobile'];

}
}
else {
$message = "Invalid Username or Password!";
}
}
}
if(isset($_SESSION["id"])) {
header("Location:dashboard.php");
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
     <!--  -->
      <div class="login-box">
        <form action="login.php" method="post" class="login-form">

          <h3 class="login-head">  <img src="assets/img/mlogo.png"  style="height: 80px;width: 80px;" alt=""> <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div>
          <div class="form-group">
            <label class="control-label">USER EMAIL</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Email" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Password" autocomplete="off">
          </div>
          <div class="form-group btn-container">
            
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
       
      </div>
       <a href="usertype.php">Register</a>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>

    
  </body>
</html>