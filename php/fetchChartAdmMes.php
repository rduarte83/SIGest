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
        ':v' => $_SESSION["username"],
        ':mes' => $_POST["mes"]
    )
);
$result = $statement->fetchAll();
$data = array();
$total = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["contactos"];
    $sub_array[] = $row["entregas"];
    $sub_array[] = $row["clientes"];
    if (is_null($row["valor"])) $row["valor"] = 0;
    $sub_array[] = $row["valor"];
}
$data["total"] = $sub_array;
$data["stats"] = ["Novos Contactos", "Número Vendas", "Novos Clientes", "Valor Vendas"];

echo json_encode($data);