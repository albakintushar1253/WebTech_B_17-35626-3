



<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="text/css" media="screen">
		.box{
				margin: 100px;
				padding: 20px;
				height: 170px;
				width: 375px;

				padding-left: 400px;


		}

		.box2{
				height: 20px;
				width: 210px;

		}

		
	</style>
</head>
<body style="margin:0px;padding:0px;">

	<form method="post">

		<div class="box">
		<fieldset>
			<legend><b>Change Password</b></legend>

				<div align="right">
					<level>Current Pasword :</level>
					<input type="text" name="cpass" class="box2"><br><br>
				</div>

				<div align="right">
					<level style="color:green;">New Pasword :</level>
					<input type="text" name="npass" class="box2"><br><br>
				</div>

				<div align="right">
					<level style="color:red;">Retype Pasword :</level>
					<input type="text" name="rpass" class="box2"><br><br>
				</div>

				<hr>

				<input type="submit" name="submit" >
				


		</fieldset>
		</div>
	</form>

</body>
</html>