<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "misterjames";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

if(!$conn){
    die("connection failed " . mysqli_connect_error());
}

?>