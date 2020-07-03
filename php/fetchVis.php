<?php
include('db.php');
$output = array();
$query = "
        SELECT v.*, c.cliente, p.tipo, p.marca, p.modelo, m.motivo FROM visitas v 
            INNER JOIN produtos p ON v.produto_id=p.id 
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
        ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach ($result as $row) {
    $prod = $row["tipo"]." ".$row["marca"]." ".$row["modelo"];
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["ult_vis"];
    $sub_array[] = $row["motivo"];
    $sub_array[] = $prod;
    $sub_array[] = $row["tecnico"];
    $sub_array[] = $row["descricao"];
    $sub_array[] = $row["prox_vis"];
    $sub_array[] = '
                    <a href="details.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="#editModal" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';

    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);
