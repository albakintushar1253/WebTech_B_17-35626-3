<?php
session_start();
include('../include/conn.php');
if(isset($dbh)){
//connection check
if(isset($_GET['id'])){
//
$sql = "UPDATE `users` SET `is_delete`= :val, delete_at = :naw  where id = :id";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':val', $value);
$stmt->bindParam(':naw', $date);
date_default_timezone_set("Asia/Dhaka");
$date = date('Y-m-d h:i:s');
$value = 1;
// echo $date;
//Fatch data user form
$id = $_GET['id'];

//checkpassword
if($stmt->execute()){
$message="profile Course Scuccess";
header("Location:../view-profile.php");
}
else{
$message="profile Delete Fail!";
}
}
}