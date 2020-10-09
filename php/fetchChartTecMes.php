<?php
include_once 'db.php';
include_once 'session.php';

$query = "SELECT 
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS assHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS assSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Hardware' AND facturado='Sim' AND factura>0 AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS factHW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Assistência de Software' AND facturado='Sim' AND factura>0 AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS factSW,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Manutenção' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS manut,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Impressora a Contrato' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS instImp,
            (SELECT COUNT(id) FROM assistencias WHERE motivo='Instalação de Software' AND tecnico=:t AND EXTRACT(YEAR_MONTH FROM data_i)=:mes) AS instSW 
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
$total = array();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["assHW"];
    $sub_array[] = $row["assSW"];
    $sub_array[] = $row["factHW"];
    $sub_array[] = $row["factSW"];
    $sub_array[] = $row["manut"];
    $sub_array[] = $row["instImp"];
    $sub_array[] = $row["instSW"];
}
$data["total"] = $sub_array;
$data["stats"] = ["Assist HW", "Assist SW", "Assist HW Fact",
    "Assist SW Fact", "Manutenções", "Instalações Imp", "Instalações SW"];

echo json_encode($data);