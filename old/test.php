<?php
include('db.php');

$query = "
            INSERT INTO visitas (cliente_id,ult_vis,motivo,prox_vis,descricao,tecnico) 
            VALUES ((SELECT id FROM clientes WHERE cliente = :cliente),:ult_vis,:motivo,:prox_vis,:descricao,:tecnico);
		";

$statement = $conn->prepare($query);
$result = $statement->execute(
    array(
        ':cliente' => 'Cliente',
        ':ult_vis' => "2000-01-01",
        ':motivo' => "motivo",
        ':descricao' => "descricao",
        ':prox_vis' => "2000-01-01",
        ':tecnico' => "tecnico"
    )
);