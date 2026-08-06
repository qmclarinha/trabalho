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

    <form action="processa_login.php" method="POST" class="formulario">

        <input type="text" name="login" placeholder="Digite seu login" required>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <input type="submit" value="Entrar" name="b2" class="botao-form">

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