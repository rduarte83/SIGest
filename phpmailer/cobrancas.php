<?php
function cobrancas($mail)
{
    require '../php/db.php';
    $query = "
                SELECT c.cliente, co.* FROM cobrancas co INNER JOIN clientes c ON co.cliente_id=c.nif 
                    WHERE estado = 'Pendente'
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Descrição</th><</tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["descricao"] . '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'Cobranças Pendentes', $table, $table);
}

function rmas($mail)
{
    require '../php/db.php';
    $query = "
                SELECT c.cliente, r.* FROM rmas r INNER JOIN clientes c ON r.cliente_id=c.nif 
                    WHERE estado = 'Pendente'
                ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $table = '<table border="1"><thead>
            <tr><th>Data</th><th>Cliente</th><th>Produto</th><th>Fornecedor</th><th>Motivo</th></tr>
            </thead><tbody>';
    foreach ($result as $row) {
        $table .= '<tr>';
        $table .= '<td>' . $row["data_e"] . '</td>';
        $table .= '<td>' . $row["cliente"] . '</td>';
        $table .= '<td>' . $row["produto"] .   '</td>';
        $table .= '<td>' . $row["fornecedor"] .   '</td>';
        $table .= '<td>' . $row["motivo"] .   '</td>';
        $table .= '</tr>';
    }
    $table .= '</tbody></table>';
    sendMail($mail, 'RMAs Pendentes', $table, $table);
}
