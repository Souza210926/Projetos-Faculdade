<?php

$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('falha na conexão: ' . $conn->connect_error);
}
?>