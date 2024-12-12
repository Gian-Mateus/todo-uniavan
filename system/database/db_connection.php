<?php
$host = 'localhost';
$dbname = 'nome_do_banco';
$user = 'nome_do_usuario';
$pass = 'senha_do_usuario';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}
