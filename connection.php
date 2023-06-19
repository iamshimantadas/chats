<?php

$host="localhost";
$user="root";
$pass="";
$db="chatbot";

$conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

if($conn)
{
 // echo "database connected!";
}else{
    echo "database error!";
}

?>