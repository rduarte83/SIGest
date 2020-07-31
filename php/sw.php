<?php
include_once 'db.php';

if ($_POST['op'] == 'fetchSw') {
    $output = array();
    $query = "
            SELECT * FROM software
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["sw"];
        $sub_array[] = $row["contrato"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["period"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["modulos"];
        $sub_array[] = $row["postos"];
        $sub_array[] = $row["estado"];
        $sub_array[] = '
                    <a href="editSw.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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
}

if ($_POST['op'] == 'addSw') {
    $query = "
                INSERT INTO software(cliente, sw, contrato, valor, period, data, modulos, postos, estado)  
                    VALUES (:cliente, :sw, :contrato, :valor, :period, :data, :modulos, :postos, 'Activo');
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente' => $_POST["cliente"],
            ':sw' => $_POST["sw"],
            ':contrato' => $_POST["contrato"],
            ':valor' => $_POST["valor"],
            ':period' => $_POST["period"],
            ':data' => $_POST["data"],
            ':modulos' => $_POST["modulos"],
            ':postos' => $_POST["postos"],
        )
    );
}

if ($_POST['op'] == 'delSw') {
    $query = "
               DELETE FROM software WHERE id = :id
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );
}

if ($_POST['op'] == 'fetchSwS') {
    $output = array();
    $query = "
            SELECT * FROM software WHERE id=:id
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["sw"];
        $sub_array[] = $row["contrato"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["period"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["modulos"];
        $sub_array[] = $row["postos"];
        $sub_array[] = $row["estado"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'editSw') {
    $query = "
               UPDATE software SET cliente=:cli, sw=:sw, contrato=:contrato, valor=:valor, period=:period,
                    data=:data, modulos=:modulos, postos=:postos, estado=:estado WHERE id=:id
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cli' => $_POST["cli"],
            ':sw' => $_POST["sw"],
            ':contrato' => $_POST["contrato"],
            ':valor' => $_POST["valor"],
            ':period' => $_POST["period"],
            ':data' => $_POST["data"],
            ':modulos' => $_POST["modulos"],
            ':postos' => $_POST["postos"],
            ':estado' => $_POST["estado"]
        )
    );
}