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
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["data_i"];
    $sub_array['end'] = $row["data_i_end"];
    $sub_array['resourceId'] = $row["username"];
    if ($row['prioridade'] == "Alta") $sub_array['color'] = "#007bff";
    else $sub_array['color'] = "#17a2b8";
    if ($row['estado'] == "Resolvido") $sub_array['color'] = "#6c757d";
    elseif ($row['estado'] == "Não Resolvido") $sub_array['color'] = "#dc3545";
    elseif ($row['estado'] == "Aguarda Peças") $sub_array['color'] = "#ffc107";

    $data[] = $sub_array;
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
    $sub_array['id'] = $row["id"];
    $sub_array['title'] = $row["cliente"] . " - " . $row["motivo"];
    $sub_array['start'] = $row["ult_vis"];
    $sub_array['end'] = $row["ult_vis_end"];
    $sub_array['resourceId'] = $row["username"];
    $sub_array['vis'] = "vis";
    $data[] = $sub_array;
}
echo json_encode($data);