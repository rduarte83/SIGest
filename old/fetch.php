<?php

include('db.php');
$output = array();
$query = "
        SELECT c.*,v.ult_vis,v.motivo,v.prox_vis,v.tecnico 
        FROM clientes c INNER JOIN visitas v ON c.id = v.cliente_id
        WHERE v.id IN (SELECT MAX(v.id) FROM visitas v GROUP BY v.cliente_id)
        ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["zona"];
    $sub_array[] = $row["ult_vis"];
    $sub_array[] = $row["motivo"];
    $sub_array[] = $row["prox_vis"];
    $sub_array[] = $row["tecnico"];
    $sub_array[] = '<a href="details.html" class="details" data-id="' . $row["id"] . '">
                        <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="#editModal" class="edit" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>';

    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);
