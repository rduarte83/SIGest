<?php
include_once 'php/session.php';
echo 'id:' . $_SESSION["id"];
echo '<br>';
echo 'username:' . $_SESSION["username"];
echo '<br>';
echo 'role:' . $_SESSION["role"];