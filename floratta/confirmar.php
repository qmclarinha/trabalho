<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
    header('Location: login.php');
    exit;
}

if(!isset($_SESSION['NumeroPedido'])){
    header('Location: produtos.php');
    exit;
}

$numero = $_SESSION['NumeroPedido'];
unset($_SESSION['NumeroPedido']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Compra realizada - Floratta</title>
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

    <h2>Compra realizada com sucesso!</h2>
    <div class="formulario">

        <?php
        echo "<h3>Obrigada pela compra, ".$_SESSION['Nome']."!</h3>";
        ?>

        <br>
        <p><b>Número do pedido:</b> <?php echo $numero; ?></p>
        <br>

        <a href="produtos.php" class="botao">Continuar Comprando</a>

    </div>

</section>
</body>
</html>
