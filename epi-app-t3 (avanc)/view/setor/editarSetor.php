<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Setor</title>
</head>
<body>
    <h1>Editar Setor</h1>

    <?php
        // Pré-preenchimento simples: pega id e nome via GET (se fornecidos)
        $id = isset($_GET['idSetor']) ? intval($_GET['idSetor']) : '';
        $nome = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : '';
    ?>

    <form action="/epi-app-t3/setor/editar" method="POST">
        <input type="hidden" name="idSetor" value="<?php echo $id; ?>">

        <label for="nomeSetor">Nome do Setor:</label>
        <input type="text" id="nomeSetor" name="nomeSetor" value="<?php echo $nome; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <a href="/epi-app-t3/setor/lista">Voltar para a lista</a>
</body>
</html>
