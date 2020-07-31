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
foreach ($result as $row) {
    $end = new DateTime($row["data_i"]);
    $end->modify('+1 hour');
    $sub_array = array();
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["data_i"];
    $sub_array['end'] = $end;
    $sub_array['resourceId'] = $row["username"];
    $data[] = $sub_array;
}
echo json_encode($data);