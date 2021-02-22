<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Picture </title>


	<style type="text/css" media="screen">
		.box{
				margin: 100px;
				padding: 10px;
				height: 170px;
				width: 375px;
				padding-left: 380px;
		}

		.box2{
				height: 20px;
				width: 180px;

		}
		
		
		
	</style>
</head>
<body>

	<form method="post">
		<div class="box" >
			<fieldset>
				<legend>REGISTRATION</legend>
			<div align="right" >
				<label> Name :</label>
				<input type="text" name="name" class="box2" >
				<hr>
				<label> Email :</label>
				<input type="email" name="email" class="box2" >
				<hr>

				<label> User Name :</label>
				<input type="text" name="uname" class="box2" >
				<hr>

				<label> Password :</label>
				<input type="password" name="pass" class="box2" >
				<hr>

				<label> Confirme Password :</label>
				<input type="password" name="cpass" class="box2" >
				<hr>

		     </div> 

				<fieldset>
					<legend>Gender</legend>
					<input type="radio" name="Male">Male
					<input type="radio" name="Female">Female
					<input type="radio" name="Male">Others
					
				</fieldset> <hr>

				<fieldset>
					<legend>Date of Birth</legend>
					<input type="date" name="dob">
					
				</fieldset><hr>




		




				<input type="Submit" name="submit">


			</fieldset>
		</div>
	</form>

</body>
</html>