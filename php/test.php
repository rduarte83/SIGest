<?php
include_once 'db.php';
$query = "
        SELECT c.cliente, v1.vendedor, (v1.ult_vis) AS data FROM visitas v1 
                INNER JOIN clientes c ON v1.cliente_id=c.nif 
                LEFT JOIN visitas v2 ON v1.cliente_id = v2.cliente_id AND v1.id < v2.id
                WHERE v2.id IS NULL AND v1.motivo_id=8 AND DATEDIFF(CURDATE(), DATE(v1.ult_vis))>=60 
                  AND v1.vendedor=" . "'" . '$user' . "'
            ";

echo $query;