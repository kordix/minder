<?php
require_once('db.php');

$dane = json_decode(file_get_contents('php://input'));
$tabela = $dane->tabela;
$kolumny = '';
$values = '';

foreach($dane->dane as $key => $value)
{
  $kolumny .= $key;
  $kolumny .= ',';
  $values .= "'".$value."'";
  $values .= ',';

}

$kolumny = substr($kolumny, 0, -1);
$values = substr($values, 0, -1);
$query = "INSERT INTO $tabela ($kolumny) VALUES  ($values)";
echo $query;
$query_run = $conn->prepare($query);
if ($query_run->execute() == false) {
    echo 'error';
}
?>