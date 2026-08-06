<?php
if(!isset($_SESSION)) SESSION_START();

if($_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

unset($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>

    <div class="logo">
        Floratta
    </div>

    <nav>
        <a href="index.php">Início</a>
        <a href="produtos.php">Plantas</a>
        <a href="sair.php">Sair</a>
    </nav>

</header>

<section class="destaques">

    <h2>Compra Finalizada</h2>
    <div class="formulario">

        <?php
        echo "<h3>Obrigada pela compra, ".$_SESSION['Nome']."!</h3>";
        ?>

        <br>
        <p>
            Seu pedido foi realizado com sucesso.
        </p>
        <br>

        <a href="produtos.php" class="botao">
            Continuar Comprando
        </a>

    </div>
</section>
</body>
</html>