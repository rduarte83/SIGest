<?php
function tecnica($mail)
{
    require '../php/db.php';
    $query = "SELECT a.data_i, c.cliente, a.motivo, a.local, a.problema, u.username FROM assistencias a INNER JOIN 
                clientes c ON a.cliente_id=c.nif INNER JOIN users u ON a.tecnico=u.id 
                WHERE DATE(data_i) <= DATE(NOW()) AND a.estado='Pendente' 
                ORDER BY a.data_i
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Motivo</th><th>Local</th><th>Problema</th><th>Técnico</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data_i"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["motivo"] . '</td>';
        $table .= '<td>' . $row["local"] . '</td>';
        $table .= '<td>' . $row["problema"] . '</td>';
        $table .= '<td>' . $row["username"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Assistências Pendentes', $table, $table);
}

function tecnicaU($mail, $user)
{
    require '../php/db.php';
    $query = "SELECT a.data_i, c.cliente, a.motivo, a.local, a.problema, u.username FROM assistencias a INNER JOIN 
                clientes c ON a.cliente_id=c.nif INNER JOIN users u ON a.tecnico=u.id 
                WHERE DATE(data_i) <= DATE(NOW()) AND a.estado='Pendente' AND u.username=" . "'" . $user . "'
                ORDER BY a.data_i";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Motivo</th><th>Local</th><th>Problema</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data_i"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["motivo"] . '</td>';
        $table .= '<td>' . $row["local"] . '</td>';
        $table .= '<td>' . $row["problema"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';

    sendMail($mail, 'Assistências Pendentes', $table, $table);
}
