<?php
include_once 'db.php';
$output = array();
$query = "
            SELECT * FROM contratos 
                LEFT JOIN (
	                SELECT c.* 
	                FROM contagens c WHERE id IN (
		                SELECT MAX(id) FROM contagens GROUP BY contrato_id)
	            ) AS c ON contratos.id = c.contrato_id
	            LEFT JOIN (
	                SELECT l.nif, l.cliente
	                FROM clientes l
	            ) AS l ON contratos.cliente_id = l.nif
	            LEFT JOIN (
	                SELECT p.id AS 'produto_id', p.tipo, p.marca, p.modelo
	                FROM produtos p
	            ) AS p ON contratos.produto = produto_id
        ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["cliente"];
    $sub_array[] = $row["tipo"] ." ". $row["marca"] ." ". $row["modelo"];
    $sub_array[] = $row["inicio"];
    $sub_array[] = $row["fim"];
    $sub_array[] = $row["tipo"];
    $sub_array[] = $row["valor"];
    $sub_array[] = $row["inc"];
    $sub_array[] = $row["preco_p"];
    $sub_array[] = $row["preco_c"];
    $sub_array[] = $row["ult_p"];
    $sub_array[] = $row["ult_c"];
    $sub_array[] = $row["ult_data"];
    $sub_array[] = $row["act_p"];;
    $sub_array[] = $row["act_c"];
    $sub_array[] = $row["act_data"];
    $sub_array[] = $row["facturar"];
    $sub_array[] = $row["estado"];
    $sub_array[] = '
                    <a href="details-copia.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="editCopia.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . '" data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i>
                    </a>
                    ';
    $data[] = $sub_array;
}
$output = array(
    "data" => $data
);
echo json_encode($output);

echo $query;