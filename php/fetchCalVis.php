<?php
include_once 'db.php';
include_once 'session.php';

$query = "
            SELECT v.*, c.cliente, m.motivo FROM visitas v 
                INNER JOIN clientes c ON v.cliente_id=c.nif 
                INNER JOIN motivos m ON v.motivo_id=m.id
                ";

if( $_SESSION["role"] == "comercial") {
    $query .= " WHERE vendedor=" . "'" .$_SESSION["username"] . "'";
}

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["ult_vis"];
    $sub_array['end'] = $row["ult_vis_end"];
    $data[] = $sub_array;
}
echo json_encode($data);