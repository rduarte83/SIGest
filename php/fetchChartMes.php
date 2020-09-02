<?php
include_once 'db.php';

$query = "
            SELECT comercial, valor FROM vendas WHERE mes = '2020-09'
                ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$total = array();
$mes = array();
foreach ($result as $row) {
    $total[] = $row["valor"];
    $mes[] = $row["comercial"];
}
$data["total"] = $total;
$data["comercial"] = $mes;

echo json_encode($data);