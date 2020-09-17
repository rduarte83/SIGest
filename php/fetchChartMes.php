<?php
include_once 'db.php';

$query = "
            SELECT comercial, SUM(valor) FROM vendas WHERE mes = :data
                ";

$statement = $conn->prepare($query);
$statement->execute(
    array(
        ':data' => $_POST["data"]
    )
);
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