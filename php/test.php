<?php
include_once 'db.php';
include_once 'session.php';
$query = "SELECT * FROM clientes WHERE comercial='" . $_SESSION["username"] . "'";

echo $query;