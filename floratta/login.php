<?php
if(!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Floratta</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>

    <div class="logo">
        Floratta
    </div>

    <nav>
        <a href="index.php">Início</a>
        <a href="cadastro1.php">Cadastro</a>
    </nav>

</header>

<section class="destaques">

    <h2>Entrar</h2>

    <?php
    if(isset($_SESSION['ErroLogin'])){
        echo "<p class='erro'>".$_SESSION['ErroLogin']."</p>";
        unset($_SESSION['ErroLogin']);
    }
    ?>

    <form action="banco.php" method="POST" class="formulario">

        <input type="text" name="login" placeholder="Digite seu login" required>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <input type="submit" name="B3" value="Entrar" class="botao-form">

    </form>

    <br>

<p class="link-cadastro">
    <a href="cadastro1.php">
        Cadastrar novo usuário
    </a>
</p>

</section>
</body>
</html>
