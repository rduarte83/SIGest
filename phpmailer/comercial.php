<?php
function comercial($mail)
{
    require '../php/db.php';
    $query = "
        SELECT v.*, c.cliente, m.motivo FROM visitas v  
            INNER JOIN clientes c ON v.cliente_id=c.nif
            INNER JOIN motivos m ON v.motivo_id=m.id
            WHERE v.ult_vis_end >= v.updated ORDER BY ult_vis
            ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Motivo</th><th>Vendedor</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["ult_vis"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["motivo"] . '</td>';
        $table .= '<td>' . $row["vendedor"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Eventos Pendentes', $table, $table);
}

function comercialU($mail, $user)
{
    require '../php/db.php';
    $query = "
                SELECT v.*, c.cliente, m.motivo FROM visitas v  
                    INNER JOIN clientes c ON v.cliente_id=c.nif
                    INNER JOIN motivos m ON v.motivo_id=m.id
                    WHERE v.ult_vis_end >= v.updated AND vendedor=" . "'" . $user . "' 
                    ORDER BY ult_vis
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Motivo</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["ult_vis"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["motivo"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';

    sendMail($mail, 'Eventos Pendentes', $table, $table);
}


