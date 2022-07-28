<?php
//if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';


$dane = json_decode(file_get_contents('php://input'));


$tabela = $dane->tabela;

class dummy {

}

$where = '';

if(isset($dane->id)){
    @$where = "WHERE ID = $dane->id";
}

//REPLACE
try{
$query_run = $conn->prepare("SELECT * FROM $tabela $where");
}catch(Exception $e){
    echo $e->getMessage();
    return http_response_code(500);
}finally{
    $query_run->execute();
    $rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");
    echo json_encode($rows);

}



 ?>


