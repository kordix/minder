<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';

// $conn = null;

$dane = json_decode(file_get_contents('php://input'));

$id = $dane->id;

//REPLACE
$query = "SELECT * FROM images where user_id = $id";
//  echo $query;
$query_run = $conn->prepare($query);
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");


$results=[];

echo json_encode($rows);
