<?php
include('db.php');

if ($_POST['op'] == 'ins') {
    $query = "
            INSERT INTO clientes (cliente,zona) VALUES (:cliente, :zona);
            INSERT INTO visitas (cliente_id,ult_vis,motivo,prox_vis,descricao,tecnico) 
            VALUES ((SELECT id FROM clientes WHERE cliente = :cliente),:ult_vis,:motivo,:prox_vis,:descricao,:tecnico);
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente' => $_POST["cliente"],
            ':zona' => $_POST["zona"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo' => $_POST["motivo"],
            ':descricao' => $_POST["descricao"],
            ':prox_vis' => $_POST["prox_vis"],
            ':tecnico' => $_POST["tecnico"]
        )
    );
}


if ($_POST['op'] == 'del') {
    $statement = $conn->prepare(
        "DELETE FROM clientes WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );

    if (!empty($result)) {
        echo 'Data Deleted';
    }
}

if ($_POST['op'] == 'edtCli') {
    $output = array();
    $query = "
        SELECT * FROM clientes where id = :id
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["zona"];
    }
}

if ($_POST['op'] == 'edtVis') {
    $output = array();
    $query = "
        SELECT c.*,v.ult_vis,v.motivo,v.prox_vis,v.tecnico 
        FROM clientes c INNER JOIN visitas v ON c.id = v.cliente_id
        WHERE v.id IN (SELECT MAX(v.id) FROM visitas v GROUP BY v.cliente_id)
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["prox_vis"];
        $sub_array[] = $row["tecnico"];
    }
}

if ($_POST['op'] == 'upd') {
    $query = "UPDATE clientes SET cliente=:cliente, zona=:zona WHERE id=:id";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':zona' => $_POST["zona"]
        )
    );
}


if ($_POST['op'] == 'insDet') {
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


if ($_POST['op'] == 'delDet') {
    $statement = $conn->prepare(
        "DELETE FROM visitas WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );
}


if ($_POST['op'] == 'updDet') {
    $query = "
                UPDATE visitas SET ult_vis=:ult_vis, motivo=:motivo, prox_vis=:prox_vis, 
                descricao=:descricao, tecnico=:tecnico WHERE id=:id
                ";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo' => $_POST["motivo"],
            ':prox_vis' => $_POST["prox_vis"],
            ':descricao' => $_POST["descricao"],
            ':tecnico' => $_POST["tecnico"]
        )
    );
}


if ($_POST['op'] == 'insProdDet') {
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

if ($_POST['op'] == 'fetchProd') {
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
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'viewDet') {
    $output = array();
    $query = "
        SELECT v.id, c.cliente, v.ult_vis, v.motivo, v.prox_vis, v.descricao, v.tecnico, p.tipo, p.marca, p.modelo, p.num_serie
        FROM produtos p INNER JOIN visitas v ON p.id = v.produto_id INNER JOIN clientes c ON c.id = v.cliente_id
        WHERE v.id = :id
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
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["tecnico"];
        $sub_array[] = $row["prox_vis"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["num_serie"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}
