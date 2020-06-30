<?php
include('db.php');
$output = array();
$query = "
        SELECT * FROM visitas v INNER JOIN produtos p ON v.produto_id=p.id INNER JOIN clientes c ON v.cliente_id=c.id
        ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["tipo"];
    $sub_array[] = $row["marca"];
    $sub_array[] = $row["modelo"];
    $sub_array[] = $row["num_serie"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = '
                    <a href="#editModal" class="edit" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';

    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);
