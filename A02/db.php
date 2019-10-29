<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$pass="dbpass";
$dbname="Library";

$link = mysqli_connect($host, $user, $pass, $dbname);
if(!$link){
    die("Error ".mysqli_connect_error());
}

