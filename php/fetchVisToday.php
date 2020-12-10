<?php
include_once 'db.php';
include_once 'session.php';

$output = array();
$query = "
    SELECT v.*, c.cliente, m.motivo FROM visitas v
        INNER JOIN clientes c ON v.cliente_id=c.nif
        INNER JOIN motivos m ON v.motivo_id=m.id
        HAVING DATE(ult_vis) = CURDATE()
";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["ult_vis"];
    $sub_array[] = $row["motivo"];
    $sub_array[] = $row["vendedor"];
    $sub_array[] = $row["descricao"];
    $sub_array[] = '
                    <a href="editVis.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';
    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);