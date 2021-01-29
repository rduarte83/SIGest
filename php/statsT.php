<?php
include_once 'db.php';
$output = array();
$query = "
            SELECT v.vendedor, v.ult_vis, c.cliente, m.motivo FROM visitas v 
                INNER JOIN clientes c ON v.cliente_id=c.nif INNER JOIN motivos m ON v.motivo_id=m.id 
                WHERE v.descricao='' ORDER BY ult_vis
                ";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["vendedor"];
    $sub_array[] = $row["ult_vis"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["motivo"];
    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);