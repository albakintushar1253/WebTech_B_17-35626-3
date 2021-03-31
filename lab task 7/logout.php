<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["alogin"]);
header("Location:login.php");
?>