<?php
require_once 'db_connection.php';

function autenticar($pdo, $email, $senha)
{
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    }

    return false;
}
