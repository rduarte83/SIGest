<?php
include_once 'db.php';

$query = "
            SELECT comercial, SUM(valor) AS total FROM vendas GROUP BY comercial
                ";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$total = array();
$mes = array();
foreach ($result as $row) {
    $total[] = $row["total"];
    $mes[] = $row["comercial"];
}
$data["total"] = $total;
$data["comercial"] = $mes;

echo json_encode($data);