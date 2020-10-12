<?php
include_once 'db.php';

if ($_POST['op'] == 'mes') {
    $query = "
            SELECT distinct mes FROM vendas
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row["mes"];
    }
    echo json_encode($data);
}

if ($_POST['op'] == 'data') {
    $query = "
            SELECT valor FROM vendas WHERE comercial = :com
                ";
    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':com' => $_POST['com']
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row["valor"];
    }
    echo json_encode($data);
}

