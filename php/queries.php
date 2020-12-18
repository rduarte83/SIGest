<?php
include_once 'db.php';
include_once 'session.php';

if ($_POST['op'] == 'fetchCli') {
    $output = array();
    if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "administrativo" || $_SESSION["role"] == "tecnico" ) {
        $query = "SELECT * FROM clientes";
    } else {
        $query = "SELECT * FROM clientes WHERE comercial='" . $_SESSION["username"] . "'";
    }
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["nif"];
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["morada"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["responsavel"];
        $sub_array[] = $row["contacto"];
        $sub_array[] = $row["email"];
        $sub_array[] = $row["comercial"];
        $sub_array[] = '
                    <a href="#modal-lg" class="obs btn btn-primary btn-sm" data-id="' . $row["nif"] . ' " data-toggle="modal">
                        <i class="fa fa-comment" aria-hidden="true" data-toggle="tooltip" title="Observações"></i>
                    </a>
                    <a href="editCli.php" class="edit btn btn-info btn-sm" data-id="' . $row["nif"] . ' ">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#" class="delete btn btn-danger btn-sm" data-id="' . $row["nif"] . ' " data-toggle="modal">
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
            INSERT INTO clientes (nif,id,cliente,morada,zona,responsavel,contacto,email,comercial) 
                VALUES (:nif,:id,:cliente,:morada,:zona,:responsavel,:contacto,:email,:comercial)
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["nif"],
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':morada' => $_POST["morada"],
            ':zona' => $_POST["zona"],
            ':responsavel' => $_POST["responsavel"],
            ':contacto' => $_POST["contacto"],
            ':email' => $_POST["email"],
            ':comercial' => $_POST["comercial"]
        )
    );
}

if ($_POST['op'] == 'fetchCliS') {
    $output = array();
    $query = "SELECT * FROM clientes WHERE nif=:nif";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':nif' => $_POST["id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["nif"];
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["morada"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["responsavel"];
        $sub_array[] = $row["contacto"];
        $sub_array[] = $row["email"];
        $sub_array[] = $row["comercial"];
        $sub_array[] = $row["obs"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchObs') {
    $output = array();
    $query = "SELECT obs FROM clientes WHERE nif=:nif";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':nif' => $_POST["id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["obs"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'editObs') {
    $query = "
                UPDATE clientes SET obs=:obs WHERE nif=:nif
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["id"],
            ':obs' => $_POST["obs"],
        )
    );
}

if ($_POST['op'] == 'editCli') {
    $query = "
                UPDATE clientes SET nif=:nif, id=:id, cliente=:cliente, morada=:morada, zona=:zona,
                    responsavel=:responsavel, contacto=:contacto, email=:email, comercial=:comercial, 
                    obs=:obs WHERE nif=:oldNif
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':oldNif' => $_POST["oldNif"],
            ':nif' => $_POST["nif"],
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':morada' => $_POST["morada"],
            ':zona' => $_POST["zona"],
            ':responsavel' => $_POST["responsavel"],
            ':contacto' => $_POST["contacto"],
            ':email' => $_POST["email"],
            ':comercial' => $_POST["comercial"],
            ':obs' => $_POST["obs"]
        )
    );
}

if ($_POST['op'] == 'delCli') {
    $query = "
                DELETE FROM clientes WHERE nif = :nif
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["id"],
        )
    );
}

if ($_POST['op'] == 'fetchProd') {
    $output = array();
    $query = "
        SELECT p.*,c.cliente, c.zona FROM produtos p INNER JOIN clientes c ON p.cliente_id=c.nif
            ORDER BY tipo ASC
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
                    <a href="editProd.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchProdS') {
    $output = array();
    $query = "SELECT p.*, c.cliente FROM produtos p 
                INNER JOIN clientes c ON p.cliente_id = c.nif 
                WHERE p.id=:id";

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
        $sub_array[] = $row["id"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["num_serie"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["cliente_id"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'editProd') {
    $query = "
                UPDATE produtos SET tipo=:tipo, marca=:marca, modelo=:modelo, num_serie=:num_serie, cliente_id=:cliente_id
                    WHERE id=:id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["produto_id"],
            ':tipo' => $_POST["tipo"],
            ':marca' => $_POST["marca"],
            ':modelo' => $_POST["modelo"],
            ':num_serie' => $_POST["num_serie"],
            ':cliente_id' => $_POST["cliente_id"]
        )
    );
}

if ($_POST['op'] == 'delProd') {
    $query = "
                DELETE FROM produtos WHERE id = :id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
        )
    );
}

if ($_POST['op'] == 'fetchProdCli') {
    $output = array();
    $query = "
        SELECT p.*,c.cliente, c.zona FROM produtos p INNER JOIN clientes c ON p.cliente_id=c.nif WHERE cliente_id = :cliente_id
            ORDER BY tipo ASC
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
        $sub_array[] = $row["num_serie"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = '
                    <a href="editProd.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'addVis') {
    $query = "
			INSERT INTO visitas (cliente_id, ult_vis, ult_vis_end, motivo_id, descricao, vendedor, tecnico, updated) 
			            VALUES (:cliente_id, :ult_vis, DATE_ADD(:ult_vis, INTERVAL 60 MINUTE), :motivo_id, :descricao, :vendedor, :tecnico, now());
            INSERT INTO visitas (cliente_id, ult_vis, ult_vis_end, motivo_id, descricao, vendedor, tecnico, updated) 
			            VALUES (:cliente_id, :prox_vis, DATE_ADD(:prox_vis, INTERVAL 60 MINUTE), :motivo_id_prox, :descricao_prox, :vendedor, :tecnico_prox, now());    
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["c_id"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo_id' => $_POST["motivo_id"],
            ':descricao' => $_POST["descricao"],
            ':vendedor' => $_POST["vendedor"],
            ':tecnico' => $_POST["tecnico"],
            ':prox_vis' => $_POST["prox_vis"],
            ':motivo_id_prox' => $_POST["motivo_id"],
            ':descricao_prox' => $_POST["descricao"],
            ':tecnico_prox' => $_POST["tecnico"]
        )
    );
}

if ($_POST['op'] == 'addVisNC') {
    $query = "
			INSERT INTO clientes(nif, id, cliente, morada, zona, responsavel, contacto, email, comercial) 
			        VALUES (:nif, :id, :cliente, :morada, :zona, :responsavel, :contacto, :email, :comercial);
            INSERT INTO visitas (cliente_id, ult_vis, ult_vis_end, motivo_id, descricao, vendedor, tecnico) 
			            VALUES (:nif, :ult_vis, DATE_ADD(:ult_vis, INTERVAL 60 MINUTE), :motivo_id, :descricao, :vendedor, :tecnico);
            INSERT INTO visitas (cliente_id, ult_vis, ult_vis_end, motivo_id, descricao, vendedor, tecnico) 
			            VALUES (:nif, :prox_vis, DATE_ADD(:prox_vis, INTERVAL 60 MINUTE), :motivo_id_prox, :descricao_prox, :vendedor, :tecnico_prox);    
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["nif"],
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':morada' => $_POST["morada"],
            ':zona' => $_POST["zona"],
            ':responsavel' => $_POST["responsavel"],
            ':contacto' => $_POST["contacto"],
            ':email' => $_POST["email"],
            ':comercial' => $_POST["comercial"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo_id' => $_POST["motivo_id"],
            ':descricao' => $_POST["descricao"],
            ':vendedor' => $_POST["vendedor"],
            ':tecnico' => $_POST["tecnico"],
            ':prox_vis' => $_POST["prox_vis"],
            ':motivo_id_prox' => $_POST["motivo_id"],
            ':descricao_prox' => $_POST["descricao"],
            ':tecnico_prox' => $_POST["tecnico"]
        )
    );
}

if ($_POST['op'] == 'delVis') {
    $query = "
                DELETE FROM visitas WHERE id = :id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["vis_id"],
        )
    );
}

if ($_POST['op'] == 'editVis') {
    $query = "
                UPDATE visitas SET ult_vis=:ult_vis, motivo_id=:motivo_id, descricao=:descricao, updated=now() 
                    WHERE id=:id;
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo_id' => $_POST["motivo_id"],
            ':descricao' => $_POST["descricao"]
        )
    );

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

if ($_POST['op'] == 'fetchVis') {
    $output = array();
    if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "administrativo") {
        $query = "SELECT v.*, c.cliente, m.motivo, u.username FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            INNER JOIN users u ON v.tecnico=u.id
            ";
    } else {
        $query = "SELECT v.*, c.cliente, m.motivo, u.username FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            INNER JOIN users u ON v.tecnico=u.id
            WHERE v.vendedor='" . $_SESSION["username"] . "'";
    }

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = '
                    <a href="editVis.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchVisS') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, m.motivo, u.username FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            INNER JOIN users u ON v.tecnico=u.id
            WHERE v.id = :id
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["vis_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["cliente_id"];
        $sub_array[] = $row["motivo_id"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchVisSN') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, m.motivo, u.username FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            INNER JOIN users u ON v.tecnico=u.id
            WHERE v.cliente_id = :cliente_id AND v.id > :id LIMIT 1
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cliente_id' => $_POST["cliente_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["descricao"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchVisCli') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, m.motivo FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            WHERE v.cliente_id = :cliente_id
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
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["tecnico"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = '
                    <a href="editVis.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchVisPen') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, m.motivo FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            WHERE v.ult_vis_end >= v.updated AND vendedor='" . $_SESSION["username"] . "'"
        ;
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchVisPenToday') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, m.motivo FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            HAVING DATE(ult_vis) = CURDATE()
        ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchAss') {
    $output = array();
    $query = "
        SELECT a.*, u.username, c.cliente, p.tipo, p.marca, p.modelo FROM assistencias a
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
            INNER JOIN users u ON a.tecnico=u.id
            ORDER BY data_i DESC
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $prod = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $prod;
        $sub_array[] = $row["data_p"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["local"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["obs"];
        $sub_array[] = $row["tempo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["estado"];
        $sub_array[] = $row["facturado"];
        $sub_array[] = $row["factura"];
        $sub_array[] = '
                    <a href="details-ass.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="#" class="fact btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eur" aria-hidden="true" data-toggle="tooltip" title="Facturar"></i>
                    </a>
                    <a href="editAss.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchAssCli') {
    $output = array();
    $query = "
        SELECT a.*, u.username, c.cliente, p.tipo, p.marca, p.modelo FROM assistencias a 
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
            INNER JOIN users u ON a.tecnico=u.id
            WHERE a.cliente_id = :cliente_id
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        $data = array(
            ':cliente_id' => $_POST["cliente_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $prod = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $prod;
        $sub_array[] = $row["data_p"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["local"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["obs"];
        $sub_array[] = $row["tempo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["estado"];
        $sub_array[] = $row["facturado"];
        $sub_array[] = $row["factura"];
        $sub_array[] = '
                    <a href="details-ass.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="#" class="fact btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eur" aria-hidden="true" data-toggle="tooltip" title="Facturar"></i>
                    </a>
                    <a href="editAss.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchAssS') {
    $output = array();
    $query = "
        SELECT a.*, u.username, c.cliente, c.morada, c.zona, c.responsavel, c.contacto, p.tipo, p.marca, p.modelo FROM assistencias a
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
            INNER JOIN users u ON a.tecnico=u.id
            WHERE a.id = :ass_id
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        $data = array(
            ':ass_id' => $_POST["ass_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array[] = $row["data_p"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["local"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["entregue"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["resolucao"];
        $sub_array[] = $row["obs"];
        $sub_array[] = $row["material"];
        $sub_array[] = $row["tempo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["estado"];
        $sub_array[] = $row["facturado"];
        $sub_array[] = $row["factura"];
        $sub_array[] = $row["morada"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["responsavel"];
        $sub_array[] = $row["contacto"];
        $sub_array[] = $row["cliente_id"];
        $sub_array[] = $row["produto_id"];
        $sub_array[] = $row["tecnico"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'addAss') {
    $query = "
			INSERT INTO assistencias(cliente_id, produto_id, data_p, motivo, local, 
			                         tecnico, entregue, problema, data_i, data_i_end, obs, prioridade) 
			    VALUES (:cliente_id, :produto_id, :data_p, :motivo, :local, 
			            :tecnico, :entregue, :problema, :data_i, DATE_ADD(:data_i, INTERVAL 60 MINUTE), :obs, :prio)
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["c_id"],
            ':produto_id' => $_POST["produto_id"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"],
            ':obs' => $_POST["obs"],
            ':prio' => $_POST["prio"]
        )
    );
}

if ($_POST['op'] == 'addAssNC') {
    $query = "
			    INSERT INTO clientes(nif, id, cliente, morada, zona, responsavel, contacto, email, comercial) 
			        VALUES (:nif, :id, :cliente, :morada, :zona, :responsavel, :contacto, :email, :comercial);
                INSERT INTO produtos(tipo, marca, modelo, num_serie, cliente_id) 
                    VALUES (:tipo, :marca, :modelo, :num_serie, :nif);
                INSERT INTO assistencias(cliente_id, produto_id, data_p, motivo, local, 
                            tecnico, entregue, problema, data_i, data_i_end, obs, prioridade)
                    VALUES(:nif, (SELECT id FROM produtos WHERE cliente_id = :nif ORDER BY id DESC LIMIT 1), :data_p, 
                           :motivo, :local, :tecnico, :entregue, :problema, :data_i, 
                           DATE_ADD(:data_i, INTERVAL 60 MINUTE), :obs, :prio);
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':nif' => $_POST["nif"],
            ':id' => $_POST["id"],
            ':cliente' => $_POST["cliente"],
            ':morada' => $_POST["morada"],
            ':zona' => $_POST["zona"],
            ':responsavel' => $_POST["responsavel"],
            ':contacto' => $_POST["contacto"],
            ':email' => $_POST["email"],
            ':comercial' => $_POST["comercial"],
            ':tipo' => $_POST["tipo"],
            ':marca' => $_POST["marca"],
            ':modelo' => $_POST["modelo"],
            ':num_serie' => $_POST["num_serie"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"],
            ':obs' => $_POST["obs"],
            ':prio' => $_POST["prio"]
        )
    );
}

if ($_POST['op'] == 'addAssNP') {
    $query = "
                INSERT INTO produtos(tipo, marca, modelo, num_serie, cliente_id) 
                    VALUES (:tipo, :marca, :modelo, :num_serie, :c_id);
                INSERT INTO assistencias(cliente_id, produto_id, data_p, motivo, local, 
                            tecnico, entregue, problema, data_i, data_i_end, obs, prioridade)
                    VALUES(:c_id, (SELECT id FROM produtos WHERE cliente_id = :c_id ORDER BY id DESC LIMIT 1), :data_p, 
                           :motivo, :local, :tecnico, :entregue, :problema, :data_i, 
                           DATE_ADD(:data_i, INTERVAL 60 MINUTE), :obs, :prio);
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':c_id' => $_POST["c_id"],
            ':tipo' => $_POST["tipo"],
            ':marca' => $_POST["marca"],
            ':modelo' => $_POST["modelo"],
            ':num_serie' => $_POST["num_serie"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"],
            ':obs' => $_POST["obs"],
            ':prio' => $_POST["prio"]
        )
    );
}

if ($_POST['op'] == 'addFact') {
    $query = "
            UPDATE assistencias SET valor = :valor, facturado = 'Sim', factura = :numFact WHERE id = :ass_id
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':valor' => $_POST["valor"],
            ':numFact' => $_POST["numFact"],
            ':ass_id' => $_POST["ass_id"]
        )
    );
}

if ($_POST['op'] == 'delAss') {
    $query = "
                DELETE FROM assistencias WHERE id = :ass_id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':ass_id' => $_POST["ass_id"],
        )
    );
}

if ($_POST['op'] == 'editAss') {
    $query = "
                UPDATE assistencias SET cliente_id=:cliente_id, produto_id=:produto_id ,data_p=:data_p, motivo=:motivo, 
                        local=:local, tecnico=:tecnico, entregue=:entregue, problema=:problema, data_i=:data_i, 
                        resolucao=:resolucao, obs=:obs, material=:material, tempo=:tempo, valor=:valor, estado=:estado, 
                        facturado=:facturado, factura=:factura WHERE id=:id               
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cliente_id' => $_POST["cliente_id"],
            ':produto_id' => $_POST["produto"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"],
            ':resolucao' => $_POST["resolucao"],
            ':obs' => $_POST["obs"],
            ':material' => $_POST["material"],
            ':tempo' => $_POST["tempo"],
            ':valor' => $_POST["valor"],
            ':estado' => $_POST["estado"],
            ':facturado' => $_POST["facturado"],
            ':factura' => $_POST["factura"]
        )
    );
}

if ($_POST['op'] == 'fetchLastProd') {
    $output = array();
    $query = "
        SELECT * FROM produtos WHERE cliente_id = :cliente_id ORDER BY id DESC LIMIT 1
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        $data = array(
            ':cliente_id' => $_POST["cliente_id"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchTec') {
    $output = array();
    $query = "
        SELECT * FROM users WHERE role='tecnico'
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["username"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchCom') {
    $output = array();
    $query = "SELECT * FROM users WHERE role!='admin'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["role"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchComVis') {
    $output = array();
    $query = "SELECT * FROM users WHERE role='comercial'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["username"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchLastAss') {
    $output = array();
    $query = "
        SELECT a.*, u.username,c.cliente, c.morada, c.zona, c.responsavel, c.contacto, p.tipo, p.marca, p.modelo FROM assistencias a
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
            INNER JOIN users u ON a.tecnico=u.id
            ORDER BY id DESC LIMIT 1;
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        $data = array()
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $prod = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $prod;
        $sub_array[] = $row["data_p"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["local"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["entregue"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["resolucao"];
        $sub_array[] = $row["obs"];
        $sub_array[] = $row["material"];
        $sub_array[] = $row["tempo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["estado"];
        $sub_array[] = $row["facturado"];
        $sub_array[] = $row["factura"];
        $sub_array[] = $row["morada"];
        $sub_array[] = $row["zona"];
        $sub_array[] = $row["responsavel"];
        $sub_array[] = $row["contacto"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchCliAuto') {
    $query = "SELECT * FROM clientes ORDER BY cliente ASC";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array['id'] = $row["nif"];
        $sub_array['value'] = $row["cliente"];
        $data[] = $sub_array;
    }
    echo json_encode($data);
}

if ($_POST['op'] == 'fetchCob') {
    $output = array();
    $query = "    
        SELECT o.*, c.cliente FROM cobrancas o INNER JOIN clientes c ON o.cliente_id=c.nif
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["estado"];
        $sub_array[] = '
                    <a href="editCob.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'fetchCobS') {
    $output = array();
    $query = "
        SELECT o.*, c.cliente FROM cobrancas o INNER JOIN clientes c ON o.cliente_id=c.nif
            WHERE o.id=:id;
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["cob_id"],
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["estado"];
        $sub_array[] = $row["cliente_id"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchCobCli') {
    $output = array();
    $query = "
       SELECT o.*, c.cliente FROM cobrancas o INNER JOIN clientes c ON o.cliente_id=c.nif WHERE cliente_id=:cliente_id
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
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["estado"];
        $sub_array[] = '
                    <a href="editCob.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'addCob') {
    if (isset($_POST["dataNew"])) {
        $query = "
			INSERT INTO cobrancas (cliente_id, data, motivo, descricao, estado, data_end) 
			    VALUES (:cliente_id, :data, :motivo, :descricao, :estado, DATE_ADD(:data, INTERVAL 60 MINUTE));
			INSERT INTO cobrancas (cliente_id, data, motivo, descricao, estado, data_end) 
			    VALUES (:cliente_id, :dataNew, :motivo, :descricao, :estado, DATE_ADD(:data, INTERVAL 60 MINUTE));
		";
        $statement = $conn->prepare($query);
        $result = $statement->execute(
            array(
                ':cliente_id' => $_POST["c_id"],
                ':data' => $_POST["data"],
                ':motivo' => $_POST["motivo"],
                ':descricao' => $_POST["descricao"],
                ':estado' => $_POST["estado"],
                ':dataNew' => $_POST["dataNew"]
            )
        );
    } else {
        $query = "
			INSERT INTO cobrancas (cliente_id, data, motivo, descricao, data_end) 
			    VALUES (:cliente_id, :data, :motivo, :descricao, DATE_ADD(:data, INTERVAL 60 MINUTE));
		";
        $statement = $conn->prepare($query);
        $result = $statement->execute(
            array(
                ':cliente_id' => $_POST["c_id"],
                ':data' => $_POST["data"],
                ':motivo' => $_POST["motivo"],
                ':descricao' => $_POST["descricao"]
            )
        );
    }
}

if ($_POST['op'] == 'delCob') {
    $query = "
                DELETE FROM cobrancas WHERE id = :cob_id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cob_id' => $_POST["cob_id"],
        )
    );
}

if ($_POST['op'] == 'editCob') {
    $query = "
                UPDATE cobrancas SET cliente_id=:cliente_id, data=:data, motivo=:motivo, descricao=:descricao, estado=:estado 
                    WHERE id=:id               
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cliente_id' => $_POST["cliente_id"],
            ':data' => $_POST["data"],
            ':motivo' => $_POST["motivo"],
            ':descricao' => $_POST["descricao"],
            ':estado' => $_POST["estado"]
        )
    );
}

if ($_POST['op'] == 'fetchUsers') {
    $output = array();
    $query = "
        SELECT * FROM users; 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["role"];
        $sub_array[] = $row["approved"];
        $sub_array[] = '
                    <a href="#" class="confirm btn btn-success btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" title="Aprovar Registo"></i>
                    </a>
                    <a href="editUser.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    ';

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchUser') {
    $output = array();
    $query = "
        SELECT * FROM users WHERE id=:id; 
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
        $sub_array[] = $row["id"];
        $sub_array[] = $row["username"];
        $sub_array[] = $row["role"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'userAp') {
    $query = "
			UPDATE users SET approved = 'sim';
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"]
        )
    );
}

if ($_POST['op'] == 'fetchHoras') {
    $output = array();
    $query = "
        SELECT h.*, SUM(a.tempo)/60 AS gasto, c.cliente FROM horas h INNER JOIN assistencias a ON a.cliente_id = h.cliente_id INNER JOIN clientes c ON c.nif = a.cliente_id GROUP BY a.cliente_id; 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["total"];
        $sub_array[] = $row["total"] - $row["gasto"];

        $sub_array[] = '
                    <a href="editHoras.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'addHoras') {
    $query = "
			INSERT INTO horas(cliente_id, data, total) 
			    VALUES (:cliente_id, :data, :total)
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"],
            ':data' => $_POST["data"],
            ':total' => $_POST["horas"]
        )
    );
}

if ($_POST['op'] == 'delHoras') {
    $query = "
                DELETE FROM horas WHERE id = :id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
        )
    );
}

if ($_POST['op'] == 'fetchHorasS') {
    $output = array();
    $query = "
        SELECT * FROM horas WHERE id=:id ; 
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["id"],
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente_id"];
        $sub_array[] = $row["data"];
        $sub_array[] = $row["total"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'editHoras') {
    $query = "
                 UPDATE horas SET cliente_id=:cliente_id, data=:data, total=:total WHERE id=:id              
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id' => $_POST["id"],
            ':cliente_id' => $_POST["cliente_id"],
            ':data' => $_POST["data"],
            ':total' => $_POST["horas"],
        )
    );
}

if ($_POST['op'] == 'addVendas') {
    $query = "
			INSERT INTO vendas(comercial, valor, mes) VALUES (:comercial, :valor, :mes)
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':comercial' => $_POST["comercial"],
            ':valor' => $_POST["valor"],
            ':mes' => $_POST["mes"]
        )
    );
}

if ($_POST['op'] == 'fetchMes') {
    $output = array();
    $query = "
        SELECT DISTINCT mes FROM vendas ORDER BY mes ASC 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["mes"];
        $data[] = $sub_array;
    }

    echo json_encode($data);
}

if ($_POST['op'] == 'addQAss') {
    $query = "
			INSERT INTO assistencias(cliente_id, produto_id, data_p, motivo, local, 
			                         tecnico, entregue, problema, data_i, data_i_end, obs, prioridade) 
			    VALUES (:cliente_id, :produto_id, :data_p, :motivo, :local, 
			            :tecnico, :entregue, :problema, :data_i, DATE_ADD(:data_i, INTERVAL 60 MINUTE), :obs, :prio)
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["c_id"],
            ':produto_id' => $_POST["produto_id"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"],
            ':obs' => $_POST["obs"],
            ':prio' => $_POST["prio"]
        )
    );
}

if ($_POST['op'] == 'addQVis') {
    $query = "
			INSERT INTO visitas (ult_vis, ult_vis_end, descricao, vendedor) 
			            VALUES (:ult_vis, :ult_vis_end, :desc, :vendedor); 
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':ult_vis' => $_POST["start"],
            ':ult_vis_end' => $_POST["end"],
            ':desc' => $_POST["event"],
            ':vendedor' => $_SESSION["username"]
        )
    );
}

if ($_POST['op'] == 'checkQVis') {
    $output = array();
    $query = "
        SELECT * FROM visitas WHERE id=:id ; 
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST["id"],
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["cliente_id"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchRMA') {
    $output = array();
    $query = "    
        SELECT r.*, c.cliente FROM rmas r INNER JOIN clientes c ON r.cliente_id=c.nif
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["data_e"];
        $sub_array[] = $row["cliente_id"];
        $sub_array[] = $row["produto"];
        $sub_array[] = $row["fornecedor"];
        $sub_array[] = $row["num_serie"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["num_factura"];
        $sub_array[] = $row["data_f"];
        $sub_array[] = $row["resolucao"];
        $sub_array[] = $row["obs"];
        $sub_array[] = '
                    <a href="editRMA.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
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

if ($_POST['op'] == 'addRMA') {
    if (isset($_POST["dataNew"])) {
        $query = "
			INSERT INTO rmas (data_e, cliente_id, produto, fornecedor, num_serie, motivo, num_factura, data_f, resolucao, obs) 
			    VALUES (:data_e, :cliente_id, :produto, :fornecedor, :num_serie, :motivo, :num_factura, :data_f, :resolucao, :obs)
		";
        $statement = $conn->prepare($query);
        $result = $statement->execute(
            array(
                ':data_e' => $_POST["data_e"],
                ':cliente_id' => $_POST["c_id"],
                ':produto' => $_POST["produto"],
                ':fornecedor' => $_POST["fornecedor"],
                ':num_serie' => $_POST["num_serie"],
                ':motivo' => $_POST["motivo"],
                ':num_factura' => $_POST["num_factura"],
                ':data_f' => $_POST["data_f"],
                ':resolucao' => $_POST["resolucao"],
                ':obs' => $_POST["obs"],
            )
        );
    } else {
        $query = "
			INSERT INTO cobrancas (cliente_id, data, motivo, descricao, data_end) 
			    VALUES (:cliente_id, :data, :motivo, :descricao, DATE_ADD(:data, INTERVAL 60 MINUTE));
		";
        $statement = $conn->prepare($query);
        $result = $statement->execute(
            array(
                ':cliente_id' => $_POST["c_id"],
                ':data' => $_POST["data"],
                ':motivo' => $_POST["motivo"],
                ':descricao' => $_POST["descricao"]
            )
        );
    }
}

if ($_POST['op'] == 'delRMA') {
    $query = "
                DELETE FROM rmas WHERE id = :rma_id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':rma_id' => $_POST["rma_id"],
        )
    );
}