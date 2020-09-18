<?php
include_once 'db.php';
include_once 'session.php';

$query = "SELECT
            (SELECT COUNT(id) FROM cobrancas WHERE motivo='Cobrança' AND estado='Concluido') AS cobrancas,
            (SELECT COUNT(id) FROM cobrancas WHERE motivo='Acompanhamento') AS acompanhamento,
            (SELECT SUM(valor) FROM vendas WHERE comercial=:c) AS vendas
                ";
$statement = $conn->prepare($query);
$statement->execute(
    array(
        ':c' => $_SESSION["username"]
    )
);
$result = $statement->fetchAll();
$data = array();
$total = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["cobrancas"];
    $sub_array[] = $row["acompanhamento"];
    if (is_null($row["vendas"])) $row["vendas"] = 0;
    $sub_array[] = $row["vendas"];
}
$data["total"] = $sub_array;
$data["stats"] = ["Cobranças", "Acompanhamento", "Valor Vendas"];

echo json_encode($data);