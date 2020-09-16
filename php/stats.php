<?php
include_once 'db.php';
include_once 'session.php';

if ($_POST['op'] == 'fetchStats') {
    $output = array();
    $query = "SELECT
                (SELECT COUNT(vis) AS apresentacao FROM 
                    (SELECT MIN(ult_vis) AS vis FROM visitas 
                    WHERE motivo_id=1 AND vendedor=:v GROUP BY cliente_id) AS X) AS contactos,
                (SELECT COUNT(cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v) AS entregas,
                (SELECT COUNT(DISTINCT cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v)  AS clientes,
                (SELECT SUM(valor) FROM VENDAS WHERE comercial=:c) AS valor
                ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':v' => $_SESSION["id"],
            ':c' => $_SESSION["username"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["contactos"];
        $sub_array[] = $row["entregas"];
        $sub_array[] = $row["clientes"];
        $sub_array[] = $row["valor"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchStatsS') {
    $output = array();
    $query = "SELECT
                (SELECT COUNT(vis) AS apresentacao FROM 
                    (SELECT MIN(ult_vis) AS vis FROM visitas 
                    WHERE motivo_id=1 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes GROUP BY cliente_id) AS X) AS contactos,
                (SELECT COUNT(cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes) AS entregas,
                (SELECT COUNT(DISTINCT cliente_id) FROM visitas 
                    WHERE motivo_id=8 AND vendedor=:v AND EXTRACT(YEAR_MONTH FROM ult_vis)=:mes)  AS clientes,
                (SELECT SUM(valor) FROM VENDAS WHERE comercial=:c AND mes=:mes) AS valor
                ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':v' => $_SESSION["id"],
            ':c' => $_SESSION["username"],
            ':mes' => substr_replace($_POST["mes"], "-", 4 , 0)
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["contactos"];
        $sub_array[] = $row["entregas"];
        $sub_array[] = $row["clientes"];
        $sub_array[] = $row["valor"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchMes') {
    $output = array();
    $query = "
        SELECT DISTINCT(EXTRACT(YEAR_MONTH FROM ult_vis)) AS YM FROM visitas ORDER BY YM 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["YM"];
        $data[] = $sub_array;
    }
    echo json_encode($data);
}

if ($_POST['op'] == 'fetchVendas') {
    $output = array();
    $query = "
        SELECT * FROM VENDAS WHERE comercial=:comercial ORDER BY mes ASC 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["valor"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchVendasMes') {
    $output = array();
    $query = "
        SELECT * FROM VENDAS WHERE mes=:mes
        ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':mes' => $_POST["mes"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["id"];
        $sub_array[] = $row["comercial"];
        $sub_array[] = $row["mes"];
        $sub_array[] = $row["valor"];

        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchTec') {
    $output = array();
    $query = "SELECT 
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND tecnico=:t) AS assHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND tecnico=:t) AS assSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND facturado='Sim' AND factura>0 AND tecnico=:t) AS factHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND facturado='Sim' AND factura>0 AND tecnico=:t) AS factSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Manutenção' AND tecnico=:t) AS manut,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Impressora a Contrato' AND tecnico=:t) AS instImp,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Software' AND tecnico=:t) AS instSW,
            (SELECT SUM(valor) FROM vendas WHERE comercial=:c ) AS valor 
                ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':t' => $_SESSION["id"],
            ':c' => $_SESSION["username"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["assHW"];
        $sub_array[] = $row["assSW"];
        $sub_array[] = $row["factHW"];
        $sub_array[] = $row["factSW"];
        $sub_array[] = $row["factSW"];
        $sub_array[] = $row["manut"];
        $sub_array[] = $row["instImp"];
        $sub_array[] = $row["instSW"];
        $sub_array[] = $row["valor"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchTecS') {
    $output = array();
    $query = "SELECT 
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS assHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS assSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND facturado='Sim' AND factura>0 AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS factHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND facturado='Sim' AND factura>0 AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS factSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Manutenção' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS manut,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Impressora a Contrato' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS instImp,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Software' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS instSW,
            (SELECT SUM(valor) FROM VENDAS WHERE comercial=:c AND mes=:mes) AS valor 
                ";

    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            ':t' => $_SESSION["id"],
            ':c' => $_SESSION["username"],
            ':mes' => $_POST["mes"]
        )
    );
    $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["assHW"];
        $sub_array[] = $row["assSW"];
        $sub_array[] = $row["factHW"];
        $sub_array[] = $row["factSW"];
        $sub_array[] = $row["factSW"];
        $sub_array[] = $row["manut"];
        $sub_array[] = $row["instImp"];
        $sub_array[] = $row["instSW"];
        $sub_array[] = $row["valor"];
        $data[] = $sub_array;
    }
    $output = array(
        "data" => $data
    );
    echo json_encode($output);
}

if ($_POST['op'] == 'fetchMesT') {
    $output = array();
    $query = "
        SELECT DISTINCT(EXTRACT(YEAR_MONTH FROM data_i)) AS YM FROM assistencias ORDER BY YM 
        ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["YM"];
        $data[] = $sub_array;
    }
    echo json_encode($data);
}