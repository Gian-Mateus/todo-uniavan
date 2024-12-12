<?php
require_once 'db_connection.php';

function criarUsuario($nome, $email, $senha)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));
    $stmt->execute();

    $id = $pdo->lastInsertId();

    // Iniciar sessão e guardar dados do usuário
    session_start();
    $_SESSION['usuario_id'] = $id;
    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_email'] = $email;

    // Redirecionar para a página de tarefas
    header("Location: /$id/tarefas");
    exit();

    return $id;
}

function editarUsuario($id, $nome, $email, $senha) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id');
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->rowCount();
}

function excluirUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->rowCount();
}

function listarUsuarios() {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM usuarios');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>