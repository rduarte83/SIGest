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

function compras($mail)
{
    require '../php/db.php';
    $query = "
        SELECT c.cliente, v1.vendedor, (v1.ult_vis) AS data FROM visitas v1 
                INNER JOIN clientes c ON v1.cliente_id=c.nif 
                LEFT JOIN visitas v2 ON v1.cliente_id = v2.cliente_id AND v1.id < v2.id
                WHERE v2.id IS NULL AND v1.motivo_id=8 AND DATEDIFF(CURDATE(), DATE(v1.ult_vis))>=60
            ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
                <tr><th>Última Compra</th><th>Cliente</th><th>Comercial</th></tr>
                </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["vendedor"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Clientes sem Compras à mais de 2 meses', $table, $table);
}

function comprasU($mail, $user)
{
    require '../php/db.php';
    $query = "
        SELECT c.cliente, v1.vendedor, (v1.ult_vis) AS data FROM visitas v1 
                INNER JOIN clientes c ON v1.cliente_id=c.nif 
                LEFT JOIN visitas v2 ON v1.cliente_id = v2.cliente_id AND v1.id < v2.id
                WHERE v2.id IS NULL AND v1.motivo_id=8 AND DATEDIFF(CURDATE(), DATE(v1.ult_vis))>=60 
                  AND v1.vendedor=" . "'" . $user . "'
            ";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
                <tr><th>Última Compra</th><th>Cliente</th><th>Comercial</th></tr>
                </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["vendedor"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Clientes sem Compras à mais de 2 meses', $table, $table);
}
