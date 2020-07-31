<?php
include_once 'db.php';
$output = array();
$query = "SELECT * FROM clientes ORDER BY cliente ASC";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["nif"];
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["morada"];
    $sub_array[] = $row["zona"];
    $sub_array[] = $row["responsavel"];
    $sub_array[] = $row["contacto"];
    $sub_array[] = $row["email"];
    $sub_array[] = '
                    <a href="#editModal" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . ' " data-toggle="modal">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . ' " data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';
    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);