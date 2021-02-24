



<!DOCTYPE html>
<html>
<head>
	<title>Picture </title>


	<style type="text/css" media="screen">
		.box{
				margin: 100px;
				padding: 20px;
				height: 170px;
				width: 375px;

				padding-left: 400px;
		}
		
	</style>
</head>
<body>

	<form method="post" action="picture.php" enctype="multipart/form-data">
		<div class="box">
			<fieldset>
				<legend>PROFILE PICTURE</legend>


					<?php  

					 $image=$_FILES["fileToUpload"]["name"];
		              $img="uploads/".$image;
		              echo '<img src= "uploads/.$img">';
					?>

					<br>
				
				 <!-- <img src=" " alt="User Image" style="height:100px; width: 100px;"><br> -->
				   

				<input type="file" name="fileToUpload" accept="image/*" id="fileToUpload">
				<hr>
				<input type="Submit" name="submit" value="Submit">  


			</fieldset>
		</div>
	</form>




	<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>



</body>
</html>