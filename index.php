<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link href="dist/output.css" rel="stylesheet">
</head>

<body class="w-screen h-screen flex items-center justify-center bg-neutral-50">
    <?php
    include_once './partials/nav.php';
    ?>
    <section class="flex flex-col items-center">
        <div class="text-2xl font-bold mb-10">
            Gerenciar suas tarefas...
        </div>
        <div>
            <nav>
                <ul class="flex gap-10">
                    <li>
                        <a href="/login" class="bg-green-800 text-white px-4 py-2 rounded-md no-underline">
                            Entrar
                        </a>
                    </li>
                    <li>
                        <a href="/registrar" class="bg-amber-800 text-white px-4 py-2 rounded-md no-underline">
                            Registrar
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</body>

</html>