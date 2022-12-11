<?php


$host="localhost";
$username="root";
$password="";
$db="test";


$mysqli = new mysqli($host, $username , $password, $db );


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}





//$mysqli->close();
    

?> 
