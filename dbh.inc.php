<!-- database handler -->


<?php

$servername = "localhost";
$dbUsername = "user";
$dbPassword = "password";
$dbName = "phpproject01";

$conn = mysqli_connect($servername , $dbUsername, $dbPassword, $dbName);


if(!$conn){
    die('Connecting failed: ' .mysqli_connect_error());
}