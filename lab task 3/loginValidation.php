<?php 

$_name=$_pass=" ";
$nameErr=$passErr="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST['name']))
	{
		$nameErr="Name cannot be Empty!";
	}

	else
	{
		$_name=$_POST['name'];

		if (!preg_match("/^[a-zA-Z-' .{8,}$]*$/", $_name)) {
      	$nameErr = "Only letters and white space allowed";
      }
	}

	

	if (empty($_POST['pass'])) {
		$passErr="Password cannot be empty !";
	}
	else
	{
		$_pass=$_POST['pass'];

	}

} 

?>


<!DOCTYPE html>
<html>
<head>
	<title > Login Validation</title>

	<style type="text/css" media="screen">

		.box{
			padding:20px;
			/* border: black solid 1px; */
			margin:100px;
			height:170px;
			width: 260px;
			margin-left: 500px;
			padding-top: 10px;
			display: block;
			
		}
		.box2{
				height: 20px;
				width: 210px;

		}

		.body{

			margin: 0px;
			padding: 0px;
		}
		
	</style>
</head>
<body class="body">

	<form method="post"  > 
		

		<div class="box">

			 <fieldset>
			 	<legend><b>Login</b></legend>
		
			<div align="right" >
				<level>Name :</level> 
				<input type="text" name="name" class="box2" value="">  
				<span style="color:red;"> <?php echo $nameErr; ?></span>
				<br><br>
			</div>
			
			<div align="right" >
				<level>Password:</level>
				<input type="password" name="pass" class="box2" value="">
				<span style="color:red"> <?php echo $passErr; ?></span>
				 <br><br>

			</div>
			
			<hr style="width: 300px;">
			<input type="checkbox" name="checkbox1">Remember me.<br><br>

			<input type="submit" name="sumbit"> <a href="forgotpassword.php">Forgate Password?</a>
			
		</div>


 	

		
	 </fieldset>
	</form>

		<hr>
		
		<p>Name :  <b> <?php echo $_POST["name"];  ?>  <span style="color:red"> <?php echo $nameErr; ?></span> </b>    </p> 
		<p>Password :  <b> <?php echo $_POST["pass"];  ?>  <span style="color:red"> <?php echo $passErr; ?></span> </b>    </p> 



	
	

</body>
</html>