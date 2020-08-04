<?php
include_once 'db.php';

if ($_POST['op'] == 'fetchCopia') {
    $output = array();
    $query = "
            SELECT * FROM contratos 
                LEFT JOIN (
	                SELECT c.estado, c.ult_c, c.ult_p, c.ult_data, c.act_c, c.act_p, c.act_data, c.contrato_id, c.facturar 
	                FROM contagens c WHERE id IN (
		                SELECT MAX(id) FROM contagens GROUP BY contrato_id)
	            ) AS c ON contratos.id = c.contrato_id
	            LEFT JOIN (
	                SELECT l.nif, l.cliente
	                FROM clientes l
	            ) AS l ON contratos.cliente_id = l.nif
	            LEFT JOIN (
	                SELECT p.id AS 'produto_id', p.tipo, p.marca, p.modelo
	                FROM produtos p
	            ) AS p ON contratos.produto = produto_id
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $prod = $row["tipo"] ." ". $row["marca"] ." ". $row["modelo"];
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
        $sub_array[] = $prod;
        $sub_array[] = $row["inicio"];
        $sub_array[] = $row["fim"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["inc"];
        $sub_array[] = $row["preco_p"];
        $sub_array[] = $row["preco_c"];
        $sub_array[] = $row["ult_p"];
        $sub_array[] = $row["ult_c"];
        $sub_array[] = $row["ult_data"];
        $sub_array[] = $row["act_p"];;
        $sub_array[] = $row["act_c"];
        $sub_array[] = $row["act_data"];
        $sub_array[] = $row["facturar"];
        $sub_array[] = '
                    <a href="details-copia.php" class="details btn btn-primary btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Detalhes"></i>
                    </a>
                    <a href="editCopia.php" class="edit btn btn-info btn-sm" data-id="' . $row["id"] . '">
                        <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#" class="delete btn btn-danger btn-sm" data-id="' . $row["id"] . '" data-toggle="modal">
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

if ($_POST['op'] == 'fetchContrato') {
    $output = array();
    $query = "
            SELECT c.id, l.cliente, p.* FROM contratos c 
                INNER JOIN clientes l ON c.cliente_id = l.nif
			    INNER JOIN produtos p ON c.produto = p.id
                ORDER BY c.id;
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["cliente"];
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

if ($_POST['op'] == 'addCont') {
    $query = "
                UPDATE contagens 
                    SET act_p=:cont_p, act_c=:cont_c, act_data=:data_cont 
                    WHERE contrato_id=:contrato_id ORDER BY id DESC LIMIT 1;
		";
    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"],
            ':data_cont' => $_POST["data_cont"],
            ':cont_p' => $_POST["cont_p"],
            ':cont_c' => $_POST["cont_c"]
        )
    );
}

if ($_POST['op'] == 'addContFact') {
    $output = array();
    $queryU = "
                UPDATE contagens 
                    SET act_p=:cont_p, act_c=:cont_c, act_data=:data_cont 
                    WHERE contrato_id=:contrato_id ORDER BY id DESC LIMIT 1;
                ";
    $queryS = "
                SELECT c.*, t.valor, t.inc, t.preco_p, t.preco_c FROM contagens c 
                    INNER JOIN contratos t ON c.contrato_id=t.id 
                    WHERE contrato_id=:contrato_id ORDER BY c.id DESC LIMIT 1;
                            
		";
    $queryI = "
                INSERT INTO contagens (contrato_id, estado, ult_p, ult_c, ult_data) 
                    VALUES (:contrato_id,1,:cont_p,:cont_c,:data_cont);
                ";

    //Update
    $statementU = $conn->prepare($queryU);
    $statementU->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"],
            ':data_cont' => $_POST["data_cont"],
            ':cont_p' => $_POST["cont_p"],
            ':cont_c' => $_POST["cont_c"]
        )
    );

    // Select
    $statementS = $conn->prepare($queryS);
    $statementS->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"]
        )
    );

    // Insert
    $statementI = $conn->prepare($queryI);
    $statementI->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"],
            ':data_cont' => $_POST["data_cont"],
            ':cont_p' => $_POST["cont_p"],
            ':cont_c' => $_POST["cont_c"]
        )
    );

    $result = $statementS->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["ult_p"];
        $sub_array[] = $row["ult_c"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["inc"];
        $sub_array[] = $row["preco_p"];
        $sub_array[] = $row["preco_c"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'addTotal') {
    $query = "
                UPDATE contagens SET facturar=:total WHERE contrato_id=:contrato_id ORDER BY id DESC LIMIT 1;
		";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"],
            ':total' => $_POST["total"]
        )
    );
}

if ($_POST['op'] == 'fetchContS') {
    $output = array();
    $query = "
            SELECT c.*, l.cliente, p.tipo, p.marca, p.modelo FROM contratos c 
                INNER JOIN clientes l ON c.cliente_id = l.nif 
                INNER JOIN produtos p ON c.produto = p.id
                WHERE c.id = :contrato_id;
        ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':contrato_id' => $_POST["contrato_id"],
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["cliente"];
        $sub_array[] = $row["inicio"];
        $sub_array[] = $row["fim"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["valor"];
        $sub_array[] = $row["inc"];
        $sub_array[] = $row["preco_p"];
        $sub_array[] = $row["preco_c"];
        $sub_array[] = $row["tipo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["cliente_id"];
        $sub_array[] = $row["produto"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchCli') {
    $output = array();
    $query = "
            SELECT * FROM clientes ORDER BY cliente ASC;
        ";
    $statement = $conn->prepare($query);
    $result = $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["nif"];
        $sub_array[] = $row["cliente"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchProdCli') {
    $output = array();
    $query = "
        SELECT * FROM produtos WHERE cliente_id = :cliente_id 
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
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'addCopia') {
    $query = "
                INSERT INTO contratos(cliente_id, produto, inicio, fim, tipo, valor, inc, preco_p, preco_c)
                    VALUES (:cliente_id, :produto, :inicio, :fim, :tipo, :valor, :inc, :preco_p, :preco_c);
                INSERT INTO contagens(contrato_id, ult_p, ult_c, ult_data) 
	                VALUES ((SELECT id FROM contratos WHERE cliente_id = :cliente_id ORDER BY ID DESC LIMIT 1), 
	                        :ult_p, :ult_c, CURDATE());
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':cliente_id'   => $_POST["cliente_id"],
            ':produto'  => $_POST["produto"],
            ':inicio'       => $_POST["inicio"],
            ':fim'          => $_POST["fim"],
            ':tipo'         => $_POST["tipo"],
            ':valor'        => $_POST["valor"],
            ':inc'          => $_POST["inc"],
            ':preco_p'      => $_POST["preco_p"],
            ':preco_c'      => $_POST["preco_c"],
            ':ult_p'      => $_POST["cont_p"],
            ':ult_c'      => $_POST["cont_c"]
        )
    );
}

if ($_POST['op'] == 'delCopia') {
    $query = "
                DELETE FROM contratos WHERE id = :contrato_id
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':contrato_id'   => $_POST["contrato_id"],
        )
    );
}

if ($_POST['op'] == 'editCopia') {
    $query = "UPDATE contratos SET cliente_id=:cliente_id, produto=:produto, 
                     inicio=:inicio, fim=:fim, tipo=:tipo, valor=:valor, inc=:inc, 
                     preco_p=:preco_p, preco_c=:preco_c WHERE id=:id                
    ";
    $statement = $conn->prepare($query);
    $result = $statement->execute(
        array(
            ':id'   => $_POST["id"],
            ':cliente_id'   => $_POST["cliente_id"],
            ':produto'   => $_POST["produto"],
            ':inicio'   => $_POST["inicio"],
            ':fim'   => $_POST["fim"],
            ':tipo'   => $_POST["tipo"],
            ':valor'   => $_POST["valor"],
            ':inc'   => $_POST["inc"],
            ':preco_p'   => $_POST["preco_p"],
            ':preco_c'   => $_POST["preco_c"]
        )
    );
}