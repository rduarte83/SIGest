<?php
include('db.php');
$output = array();
$query = "
        SELECT v.id, c.cliente, v.ult_vis, v.motivo, v.prox_vis, v.descricao, v.tecnico, p.tipo
        FROM produtos p RIGHT JOIN visitas v ON p.id = v.produto_id INNER JOIN clientes c ON c.id = v.cliente_id
        WHERE v.cliente_id = :cliente_id 
        ORDER BY v.id DESC
        ";

$statement = $conn->prepare($query);
$statement->execute(
    array(
        ':cliente_id' => $_POST["cliente_id"]
    )
);
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["ult_vis"];
    $sub_array[] = $row["motivo"];
    $sub_array[] = $row["descricao"];
    $sub_array[] = $row["tecnico"];
    $sub_array[] = $row["prox_vis"];
    $sub_array[] = $row["tipo"];
    $sub_array[] = '<a href="#viewModal" class="details" data-id="' . $row["id"] . '" data-toggle="modal">
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
