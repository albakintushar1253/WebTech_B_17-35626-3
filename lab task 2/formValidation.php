<?php

  $fName = $pwd = $email = $dob = $age = $gender = $bldGrp = $addr = $ssc = $hsc = $bsc = "";

  $fNameErr = $pwdErr = $emailErr = $dobErr = $ageErr = $genderErr = $bldGrpErr = $addrErr = $sscErr = $hscErr = $bscErr = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
   

    if(empty($_POST['f_name'])){
      $fNameErr = "First Name cannot be empty!";
    }
    
    else{
      $fName = $_POST['f_name'];
    }


    if(empty($_POST['u_email'])){
      $emailErr = "Email cannot be empty!";
    }
    else{
      $email = $_POST['u_email'];
    }

    if(empty($_POST['u_dob'])){
      echo "default";
    }
    else{
      $dob = $_POST['u_dob'];
    }

    if(empty($_POST['gender'])){
      $genderErr = "What is ur gender?";
    }
    else{
      $gender = $_POST['gender'];
    }

    if(empty($_POST['blood_group'])){
      $bldGrpErr = "Please give blood group";
    }
    else{
      $bldGrp = $_POST['blood_group'];
    }

    if(!empty($_POST['ssc']))
      $ssc = $_POST['ssc'];

    if(!empty($_POST['hsc']))
      $hsc = $_POST['hsc'];

    if(!empty($_POST['bsc']))
      $bsc = $_POST['bsc'];


  }

?>

<html>
  <head>
    <title>Registration Form</title>
  </head>
  <body>
    <form action="formValidation.php" method="post">
      <fieldset>
        <legend >Registration Form</legend>
        <label for="f_name">Name: <span style="color:red;">*</span> </label>
        <input type="text" name="f_name" value="">
        <span style="color:red;"> <?php echo $fNameErr; ?> </span>
        <br>
               
        <label for="">Email: <span style="color:red;">*</span> </label>
        <input type="email" name="u_email" value="">
        <span style="color:red;"> <?php echo $emailErr; ?> </span>
        <br>
       
        <label for="">Date Of Birth: </label>
        <input type="date" name="u_dob" value=""> <br>

        <label for="">Gender: <span style="color:red;">*</span> </label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        <span style="color:red;"> <?php echo $genderErr; ?> </span>
        <br>

        <label for="">Blood Group: <span style="color:red;">*</span> </label>
        <select name="blood_group">
          <option value="" disabled selected>Select Blood Group</option>
          <option value="a+">A+</option>
          <option value="b+">B+</option>
          <option value="o+">O+</option>
        </select>
        <span style="color:red;"> <?php echo $bldGrpErr; ?> </span>
        <br>

        <label for="">Gegree: </label>
        <input type="checkbox" name="hsc" value="hsc"> HSC
        <input type="checkbox" name="ssc" value="ssc"> SSC
        <input type="checkbox" name="bsc" value="bsc"> BSC
        <br>


        <input type="reset" name="btn_reset" value="Reset">
        <input type="submit" name="btn_submit" value="Register">
        <br>
      </fieldset>
    </form>

    <h1>User Details</h1>
    <?php

      echo $fName . "<br>";
      echo $email . "<br>";
      echo $dob . "<br>";
      echo $gender . "<br>";
      echo $bldGrp . "<br>";
      echo $ssc . "<br>";
      echo $hsc . "<br>";
      echo $bsc . "<br>";
	  

    ?>


  </body>




</html>
