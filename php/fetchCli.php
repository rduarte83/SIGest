<?php
include('db.php');
$output = array();
$query = "SELECT * FROM clientes";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["zona"];
    $sub_array[] = '
                    <a href="#editModal" class="edit" data-id="' . $row["id"] . ' " data-toggle="modal">
                        <i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete" data-id="' . $row["id"] . ' " data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';
    $data[] = $sub_array;
}
$output = array(
    "data"	=>	$data
);
echo json_encode($output);
