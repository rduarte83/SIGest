<?php
include_once 'db.php';

$query = "
            SELECT o.*, c.cliente FROM cobrancas o INNER JOIN clientes c ON o.cliente_id=c.nif
                ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["data"];
    $sub_array['end'] = $row["data_end"];
    if ($row['estado'] == "Resolvido") $sub_array['color'] = "#32cd32";
    if ($row['estado'] == "Pendente") $sub_array['color'] = "#ff0000";
    $data[] = $sub_array;

}
echo json_encode($data);