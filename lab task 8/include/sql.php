<?php

$host='localhost';
$username='root';
$password='';
$dbname = "doctor_finder";
$conn=mysqli_connect($host,$username,$password,"$dbname");
if(!$conn)
    {
      die('Could not Connect MySql Server:' .mysql_error());
    }


?>