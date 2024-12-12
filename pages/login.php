<?php
require('system/main.php');

$layout = new HTML(title: 'Tarefas');
?>
<?php include('partials/nav.php'); ?>

<section>
    <form action="/system/auth.php" method="post">
        <div>
            <h1 class="text-3xl font-bold">
                Credenciais
            </h1>
        </div>
        <div class="flex flex-col gap-6 mt-10">
            <div class="flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="border border-double border-gray-400 rounded shadow-inner p-1">
            </div>
            <div class="flex flex-col">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="border border-double border-gray-400 rounded shadow-inner p-1">
            </div>
            <button class="bg-green-400 rounded-md py-2 hover:bg-green-500 transition-all duration-300">Enviar</button>
        </div>
    </form>
</section>