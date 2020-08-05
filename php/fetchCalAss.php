<?php
include_once 'db.php';

$query = "
            SELECT a.*, u.username, c.cliente FROM assistencias a 
                INNER JOIN clientes c ON a.cliente_id=c.nif
                INNER JOIN users u ON a.tecnico=u.id
         ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$sub_array = array();

foreach ($result as $row) {
    $end = new DateTime($row["data_i"]);
    $end->modify('+1 hour');
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["data_i"];
    $sub_array['end'] = $end;
    $sub_array['resourceId'] = $row["username"];
    array_push($data, $sub_array);
}

$queryV = "
            SELECT v.*,c.cliente,m.motivo,u.username FROM visitas v 
                INNER JOIN clientes c ON v.cliente_id=c.nif 
                INNER JOIN motivos m ON v.motivo_id=m.id
                INNER JOIN users u ON v.tecnico=u.id
         ";

$statementV = $conn->prepare($queryV);
$statementV->execute();
$resultV = $statementV->fetchAll();
foreach ($resultV as $row) {
    $end = new DateTime($row["prox_vis"]);
    $end->modify('+30 minutes');
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["prox_vis"];
    $sub_array['end'] = $end;
    $sub_array['resourceId'] = $row["username"];
    $data[] = $sub_array;
}

echo json_encode($data);