<?php

session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";
$username = "";
$email = "";
$errors = array();

$connect = mysqli_connect($host,$user,$pass,$db);

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login_action.php');
}
?>