<?php
include_once 'db.php';
include_once 'session.php';

$query = "SELECT
                (SELECT COUNT(vis) AS apresentacao FROM 
                    (SELECT MIN(ult_vis) AS vis FROM visitas 
                    WHERE motivo_id=1 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes GROUP BY cliente_id) AS X) AS contactos,
                (SELECT COUNT(cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes) AS entregas,
                (SELECT COUNT(DISTINCT cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes)  AS clientes
                ";
$statement = $conn->prepare($query);
$statement->execute(
    array(
        ':v' => $_SESSION["username"],
        ':mes' => $_POST["mes"]
    )
);
$result = $statement->fetchAll();
$data = array();
$total = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["contactos"];
    $sub_array[] = $row["entregas"];
    $sub_array[] = $row["clientes"];
}
$data["total"] = $sub_array;
$data["stats"] = ["Novos Contactos", "Número Vendas", "Novos Clientes"];

echo json_encode($data);