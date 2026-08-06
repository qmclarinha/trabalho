<?php
if(!isset($_SESSION)) SESSION_START();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>

    <div class="logo">
        Floratta
    </div>

    <nav>
        <a href="index.php">Início</a>
        <a href="login.php">Login</a>
    </nav>

</header>

<section class="destaques">

    <h2>Crie seu Login</h2>

    <form action="salvar_login.php" method="POST" class="formulario">

        <input type="text" name="login" placeholder="Crie um login" required>
        <input type="password" name="senha" placeholder="Crie uma senha" required>
        <input type="submit" value="Finalizar Cadastro" class="botao-form">

    </form>

</section>

</body>
</html>