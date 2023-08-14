<?php
$server = 'localhost';
$db = 'dbProjetoMovie';
$user = 'postgres';
$pass = 'postgres';

try {
    $pdo = new PDO("pgsql:host=$server;dbname=$db;", $user, $pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $err) {
    $msg = $err->getMessage();
    echo "Erro ao conectar no banco de dados: $msg";
}
?>