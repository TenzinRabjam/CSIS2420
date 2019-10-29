<?php
session_start();
require_once '../db.php';//check conn file
$date = date("format", $timestamp);
$_SESSION['LoginDate']= $date;

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($link, $myusername);
$mypassword = mysqli_real_escape_string($link, $mypassword);
$Hashed = hash("ripemd128", $mypassword);


$sql = "SELECT * FROM users WHERE username ='".$myusername."' and password ='".$Hashed."'";
$loginresult = $link->query($sql);

if(!$loginresult){
    $message = "Whole query". $sql;
    echo $message;
    die('Invalid query' . mysqli_error());
}

$count = $loginresult->num_rows;

if($count ==1){
    header("Location:catalogue.php");
    $_SESSION['user']=$myusername;
    $_SESSION['password']=$mypassword;
}else{
    header("Location:login.php");
    $_SESSION['badPass']=1;
}
mysqli_close($link);