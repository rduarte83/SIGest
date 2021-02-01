<?php
function copia($mail)
{
    require '../php/db.php';
    $query = "
                SELECT c.cliente, p.*, co.* FROM contratos co 
                    INNER JOIN clientes c ON co.cliente_id=c.nif
                    INNER JOIN produtos p ON co.produto=p.id 							
                    WHERE DATEDIFF(CURDATE(), fim)>=180
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Início</th><th>Fim</th><th>Cliente</th><th>Produto</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["inicio"] . '</td>';
        $table .= '<td>' . $row["fim"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["tipo"] . ' ' . $row["marca"] . ' ' . $row["modelo"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Contratos de Cópia a expirar em menos de 6 meses', $table, $table);
}

function sw($mail)
{
    require '../php/db.php';
    $query = "
                SELECT * FROM software WHERE DATEDIFF(CURDATE(), data)>=180
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Software</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["sw"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Contratos de SW a expirar em menos de 6 meses', $table, $table);
}