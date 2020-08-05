<?php
$servername = 'localhost';
$username = 'imprima_master';
$password = '&yQ6cxRdabu1';
$dbname = 'imprima_sigest';

// Create connection
$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
$conn->exec("set names utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}