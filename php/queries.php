<?php
include_once 'db.php';

if ($_POST['op'] == 'fetchCli') {
    $output = array();
    $query = "SELECT * FROM clientes ORDER BY cliente ASC";

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
            INSERT INTO clientes (nif,id,cliente,morada,zona,responsavel,contacto,email) 
                VALUES (:nif,:id,:cliente,:morada,:zona,:responsavel,:contacto,:email)
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
            ':email' => $_POST["email"]
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

if ($_POST['op'] == 'addVis') {
    $query = "
			INSERT INTO visitas (cliente_id, ult_vis, motivo_id, descricao, vendedor, prox_vis, produto_id) 
			VALUES (:cliente_id, :ult_vis, :motivo, :descricao, :vendedor, :prox_vis, :produto_id);
		";

    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"],
            ':ult_vis' => $_POST["ult_vis"],
            ':motivo' => $_POST["motivo"],
            ':descricao' => $_POST["descricao"],
            ':vendedor' => $_POST["vendedor"],
            ':prox_vis' => $_POST["prox_vis"],
            ':produto_id' => $_POST["produto_id"]
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
    $query = "
        SELECT v.*, c.cliente, p.tipo, p.marca, p.modelo, m.motivo FROM visitas v 
            INNER JOIN produtos p ON v.produto_id=p.id 
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
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
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $prod;
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["prox_vis"];
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

if ($_POST['op'] == 'fetchVisCli') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, p.tipo, p.marca, p.modelo, m.motivo FROM visitas v 
            INNER JOIN produtos p ON v.produto_id=p.id 
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            WHERE v.cliente_id = :cliente_id
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
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $prod;
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["prox_vis"];
        $sub_array[] = '
                    <a href="details.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
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

if ($_POST['op'] == 'fetchPen') {
    $output = array();
    $query = "
        SELECT v.*, c.cliente, p.tipo, p.marca, p.modelo, m.motivo FROM visitas v 
            INNER JOIN produtos p ON v.produto_id=p.id 
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            HAVING v.prox_vis < CURDATE() ORDER BY v.ult_vis
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
        $sub_array[] = $row["ult_vis"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $prod;
        $sub_array[] = $row["vendedor"];
        $sub_array[] = $row["descricao"];
        $sub_array[] = $row["prox_vis"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'countVisPen') {
    $output = array();
    $query = "
        SELECT COUNT(id) AS count FROM visitas WHERE prox_vis < CURDATE()
        ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["count"];
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
        SELECT a.*, c.cliente, p.tipo, p.marca, p.modelo FROM assistencias a
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
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
        $sub_array[] = $row["tecnico"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["resolucao"];
        $sub_array[] = $row["material"];
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

if ($_POST['op'] == 'fetchAssCli') {
    $output = array();
    $query = "
        SELECT a.*, c.cliente, p.tipo, p.marca, p.modelo FROM assistencias a 
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
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
        $sub_array[] = $row["tecnico"];
        $sub_array[] = $row["problema"];
        $sub_array[] = $row["data_i"];
        $sub_array[] = $row["resolucao"];
        $sub_array[] = $row["material"];
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

if ($_POST['op'] == 'fetchAssS') {
    $output = array();
    $query = "
        SELECT a.*, c.cliente, c.morada, c.zona, c.responsavel, c.contacto, p.tipo, p.marca, p.modelo FROM assistencias a
            INNER JOIN produtos p ON a.produto_id=p.id 
            INNER JOIN clientes c ON a.cliente_id=c.nif
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
        $prod = $row["tipo"] . " " . $row["marca"] . " " . $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $prod;
        $sub_array[] = $row["data_p"];
        $sub_array[] = $row["motivo"];
        $sub_array[] = $row["local"];
        $sub_array[] = $row["tecnico"];
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

if ($_POST['op'] == 'addAss') {
    $output = array();
    $query = "
			INSERT INTO assistencias(cliente_id, produto_id, data_p, motivo, local, tecnico, entregue, problema, data_i) 
			    VALUES (:cliente_id, :produto_id, :data_p, :motivo, :local, :tecnico, :entregue, :problema, :data_i)
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id' => $_POST["cliente_id"],
            ':produto_id' => $_POST["produto_id"],
            ':data_p' => $_POST["data_p"],
            ':motivo' => $_POST["motivo"],
            ':local' => $_POST["local"],
            ':tecnico' => $_POST["tecnico"],
            ':entregue' => $_POST["entregue"],
            ':problema' => $_POST["problema"],
            ':data_i' => $_POST["data_i"]
        )
    );
}

if ($_POST['op'] == 'addFact') {
    $query = "
            UPDATE assistencias SET facturado = 'sim', factura = :numFact WHERE id = :ass_id
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':numFact' => $_POST["numFact"],
            ':ass_id' => $_POST["ass_id"]
        )
    );
}