<?php
include 'db.php';

if ($_POST['op'] == 'fetchCli') {
    $output = array();
    $query = "SELECT * FROM clientes";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["nif"];
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["contacto"];
        $sub_array[] = $row["email"];
        $sub_array[] = '
                    <a href="#editModal" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . ' " data-toggle="modal">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#deleteModal" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . ' " data-toggle="modal">
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

if ($_POST['op'] == 'addCli') {
    $query = "
            INSERT INTO clientes (nif,id,cliente,zona,contacto,email) VALUES (:nif,:id,:cliente,:zona,:contacto,:email)
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["nif"],
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':zona' => $_POST["zona"],
            ':contacto' => $_POST["contacto"],
            ':email' => $_POST["email"]


        )
    );
}

if ($_POST['op'] == 'fetchProd') {
    $output = array();
    $query = "
        SELECT p.*,c.cliente, c.zona FROM produtos p INNER JOIN clientes c ON p.cliente_id=c.nif
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["num_serie"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = '
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
}

if ($_POST['op'] == 'addProd') {
    $query = "
			INSERT INTO produtos (tipo, marca, modelo, num_serie, cliente_id) 
			VALUES (:tipo, :marca, :modelo, :num_serie, :cliente_id)
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"],
            ':tipo' => $_POST["tipo"],
            ':marca' => $_POST["marca"],
            ':modelo' => $_POST["modelo"],
            ':num_serie' => $_POST["num_serie"],
        )
    );
}

if ($_POST['op'] == 'fetchProdCli') {
    $output = array();
    $query = "
        SELECT * FROM produtos WHERE cliente_id = :cliente_id
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'addVis') {
    $query = "
			INSERT INTO visitas (cliente_id, ult_vis, motivo, descricao, tecnico, prox_vis, produto_id) 
			VALUES (:cliente_id, :ult_vis, :motivo, :descricao, :tecnico, :prox_vis, :produto_id);
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo' => $_POST["motivo"],
            ':descricao' => $_POST["descricao"],
            ':tecnico' => $_POST["tecnico"],
            ':prox_vis' => $_POST["prox_vis"],
            ':produto_id' => $_POST["produto_id"]
        )
    );
}

if ($_POST['op'] == 'fetchVisS') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, p.tipo, p.marca, p.modelo, m.motivo FROM visitas v 
            INNER JOIN produtos p ON v.produto_id=p.id 
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            WHERE v.id = :visita_id
        ";
    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':visita_id' => $_POST["visita_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $prod = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $prod;
        $sub_array[] = $row["tecnico"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["prox_vis"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchMot') {
    $output = array();
    $query = "
        SELECT * FROM motivos
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["motivo"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}