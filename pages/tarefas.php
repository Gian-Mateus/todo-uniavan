<?php
require('system/main.php');
require('system/task.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login');
    exit();
}

$tarefas = listarTarefas();
$layout = new HTML(title: 'Minhas Tarefas');
?>

<?php include('partials/nav.php'); ?>

<section class="container mx-auto px-4 mt-20">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Minhas Tarefas</h1>
        <button class="bg-green-500 text-white px-4 py-2 rounded-md">Nova Tarefa</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($tarefas as $tarefa): ?>
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($tarefa['titulo']) ?></h2>
                <p class="text-gray-600 mb-4"><?= htmlspecialchars($tarefa['descricao']) ?></p>
                <div class="flex justify-end gap-2">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Editar</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Excluir</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>