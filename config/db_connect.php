<?php 
// connect to database MySQLi(host,username,password,database)
$conn = mysqli_connect('localhost','mj','password','burger');

if(!$conn){
echo 'Connection error: ' . mysqli_connect_error();
}

?>