<?php
include_once 'db.php';

$query = "
        SELECT * FROM users WHERE role='comercial'
        ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $query = "SELECT
					 (SELECT '" . $row["username"] . "') AS comercial,
                (SELECT COUNT(vis) AS apresentacao FROM 
                    (SELECT MIN(ult_vis) AS vis FROM visitas 
                    WHERE motivo_id=1 AND vendedor='" . $row["username"] . "' GROUP BY cliente_id) AS X) AS contactos,
                (SELECT COUNT(cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor='" . $row["username"] . "') AS entregas,
                (SELECT COUNT(DISTINCT cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor='" . $row["username"] . "')  AS clientes,
                (SELECT COUNT(v.id) FROM visitas v 
                    INNER JOIN clientes c ON v.cliente_id=c.nif
                    INNER JOIN motivos m ON v.motivo_id=m.id
                    WHERE v.ult_vis_end >= v.updated AND vendedor='" . $row["username"] . "') AS eventos
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $sub_array[] = $row["comercial"];
        $sub_array[] = $row["contactos"];
        $sub_array[] = $row["entregas"];
        $sub_array[] = $row["clientes"];
        $sub_array[] = $row["eventos"];
        $data[] = $sub_array;
    }
}
$output = array(
    "data" => $data
);
echo json_encode($output);