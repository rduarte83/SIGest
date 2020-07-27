<?php
include_once 'db.php';

$query = "
            SELECT v.*, c.cliente, m.motivo FROM visitas v 
                INNER JOIN clientes c ON v.cliente_id=c.nif 
                INNER JOIN motivos m ON v.motivo_id=m.id
                ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $end = new DateTime($row["ult_vis"]);
    $end->modify('+30 minutes');
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["ult_vis"];
    $sub_array['end'] = $end;
    $data[] = $sub_array;
}
echo json_encode($data);