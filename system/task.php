<?php
require_once 'db_connection.php';


function criarTarefa($titulo, $descricao)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO tarefas (titulo, descricao, usuario_id) VALUES (:titulo, :descricao, :usuario_id)');
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':usuario_id', $_SESSION['usuario_id']);
    $stmt->execute();
    
    return $pdo->lastInsertId();
}

function editarTarefa($id, $titulo, $descricao)
{
    global $pdo;
    $stmt = $pdo->prepare('UPDATE tarefas SET titulo = :titulo, descricao = :descricao WHERE id = :id');
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->rowCount();
}

function excluirTarefa($id)
{
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM tarefas WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->rowCount();
}

function listarTarefas()
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM tarefas WHERE usuario_id = :usuario_id');
    $stmt->bindParam(':usuario_id', $_SESSION['usuario_id']);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTarefa($id)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM tarefas WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
