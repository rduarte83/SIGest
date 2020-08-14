<?php
include_once 'php/session.php';
echo $_SESSION["username"];
echo "<br>";
echo $_SESSION["role"];
echo "<br>";
$query = "SELECT * FROM users WHERE username=" . $_SESSION["username"];
echo $query;