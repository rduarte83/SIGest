<?php
include_once 'db.php';

$query = "
            SELECT comercial, SUM(valor) as valor FROM vendas WHERE mes=:mes GROUP BY comercial
                ";

$statement = $conn->prepare($query);
$statement->execute(
    array(
        ':mes' => $_POST["mes"]
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