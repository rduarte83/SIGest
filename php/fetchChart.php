<?php
include_once 'db.php';

$query = "
            SELECT a.tecnico, u.username, COUNT(a.id) AS total FROM assistencias a 
                INNER JOIN users u ON a.tecnico=u.id GROUP BY tecnico;
                ";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array = $row["total"];
    $data[] = $sub_array;
}
echo json_encode($data);