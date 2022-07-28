<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once('db.php');

$dane = json_decode(file_get_contents('php://input'));

$login = "'".$dane->login."'";
$password = md5($dane->password);

$query = "INSERT INTO users (login,password) VALUES ($login,'$password');";
$query_run = $conn->prepare($query);
$query_run->execute();

$query = "INSERT INTO userdata (login) VALUES ($login);  ";
$query_run = $conn->prepare($query);
$query_run->execute();
    
?>