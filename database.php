<?php
$db_host = 'MySQL-5.7';
$db_username = 'root';
$db_password = '';
$db_name = 'nsball';


$conn=new mysqli($db_host,$db_username,$db_password,$db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>