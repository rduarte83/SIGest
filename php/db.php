<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "visitas";

// Create connection
$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
$conn->exec("set names utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}