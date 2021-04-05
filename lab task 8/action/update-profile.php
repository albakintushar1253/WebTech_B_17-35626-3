<?php
session_start();
include('../include/conn.php');
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){
//
$newimage = $_FILES["image"]["name"];
//file check
if($newimage != null){
	$oldfile = $_POST['oldfile'];
	unlink($oldfile);
	$sql = "UPDATE `users` SET `name`= :name,`email`= :email,`mobile`= :mobile, `password`= :password, `image`= :image ";
	//fatch image
	$target_dir = "../assets/img/user/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$cimage = $target_file;
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
else{
	$sql = "UPDATE `course` SET `name`= :name,`email`= :email,`mobile`= :mobile, `password`= :password,";
}
$stmt = $dbh->prepare($sql);
//insert File
//bindParam
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mobile', $mobile);
$stmt->bindParam(':password', $password);
if($newimage != null){
	$stmt->bindParam(':image', $image);
}

//Fatch data user form

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

//checkpassword
if($stmt->execute()){
$message="Update Course Scuccess";
header("Location:../viewcourse.php");
}
else{
$message="Course Update Fail!";
// header("Location:../editcourse.php");
}
}
}