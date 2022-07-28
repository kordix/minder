<?php
require_once 'db.php';

class dummy {

}

try{
$query_run = $conn->prepare("SELECT * FROM questions q order by id desc");
}catch(Exception $e){
    echo $e->getMessage();
    return http_response_code(500);
}finally{
    $query_run->execute();
    $rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");
    echo json_encode($rows);

}



 ?>


