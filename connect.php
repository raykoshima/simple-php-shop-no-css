<?php
ob_start();
session_start();

ini_set('display_errors', 1);
error_reporting(~0);
date_default_timezone_set('Asia/Bangkok'); //date time set

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "std";

$con = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con));
mysqli_query($con,"set names utf8 ");

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

if(isset($_SESSION["UserID"])){ // session money update
    $sql="SELECT user_money FROM login WHERE login_id='".$_SESSION["UserID"]."'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    $_SESSION["money"] = $row["user_money"];
}
}
?>