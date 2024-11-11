<?php
// backend/db.php

$host = 'localhost';
$db = 'trabalhoweb';
$user = 'root'; // Usuário do MySQL
$pass = '';     // Senha do MySQL

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
